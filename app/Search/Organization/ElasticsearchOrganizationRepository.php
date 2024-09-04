<?php

namespace App\Search\Organization;

use App\Models\Organization;
use App\Models\Setting;
use Elastic\Elasticsearch\Client;
use Illuminate\Database\Eloquent\Collection;

class ElasticsearchOrganizationRepository implements OrganizationRepository
{
    private $search;

    public function __construct(Client $client)
    {
        $this->search = $client;
    }

    public function search(string $query = ""): Collection
    {
        $items = $this->searchOnElasticsearch($query);

        return $this->buildCollection($items);
    }

    private function searchOnElasticsearch(string $query): array
    {
        $instance = new Organization;

        $setting = Setting::first();

        $items = $this->search->search([
            'index' => $setting->last_index_q,
            'type' => $instance->getSearchType(),
            'body' => [
                "from" => 0,
                "size" => 300,
                'query' => [
                    'multi_match' => [
                        'fields' => ['title'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);

        return $items;
    }

    private function buildCollection(array $items): Collection
    {
        /**
         * The data comes in a structure like this:
         * [
         *      'hits' => [
         *          'hits' => [
         *              [ '_source' => 1 ],
         *              [ '_source' => 2 ],
         *          ]
         *      ]
         * ]
         *
         * And we only care about the _source of the documents.
         */
        $hits = array_pluck($items['hits']['hits'], '_source') ?: [];

        $sources = array_map(function ($source) {
            //   $source['tags'] = json_encode($source['tags']);
            return $source;
        }, $hits);

        // We have to convert the results array into Eloquent Models.
        return Organization::hydrate($sources);
    }
}
