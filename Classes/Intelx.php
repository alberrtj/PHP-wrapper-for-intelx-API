<?php

namespace Classes;

use Illuminate\Support\Facades\Config;

class Intelx
{
    private $API_KEY;
    private $API_URL;

    public function __construct()
    {
        $this->API_KEY = Config::get('INTELX.API_KEY');
        $this->API_URL = Config::get('options.API_URL');
    }

    public function call($link, $post = null)
    {
        $url = $this->API_URL . $link;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        $headers = ["x-key: " . $this->API_KEY];

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        $headers[] = "Content-type: application/json";

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec($ch);
        $status = curl_getinfo($ch);
        curl_close($ch);

        switch ($status["http_code"]) {
            case 200:
                $data = json_decode($server_output, true);
                return [
                    'status' => $status["http_code"],
                    'data' => json_last_error() == JSON_ERROR_NONE ? $data['data'] : $server_output
                ];
                break;
            case 400:
                return [
                    'status' => $status["http_code"],
                    'data' => 'invalid request'
                ];
                break;
            case 401:
                return [
                    'status' => $status["http_code"],
                    'data' => 'Authenticate: Access not authorized'
                ];
                break;
            case 402:
                return [
                    'status' => $status["http_code"],
                    'data' => 'Payment Required'
                ];
                break;
            case 403:
                return [
                    'status' => $status["http_code"],
                    'data' => 'Forbidden'
                ];
                break;
            case 404:
                return [
                    'status' => $status["http_code"],
                    'data' => 'invalid request'
                ];
                break;
            case 500:
                return [
                    'status' => $status["http_code"],
                    'data' => 'service error'
                ];
                break;
            case 0:
                return [
                    'status' => $status["http_code"],
                    'data' => 'host not found'
                ];
                break;
        }

        return false;
    }

    public function searchResult($search, $request = [], $offset = 1)
    {
        $start = "";
        if (isset($request['start'])) $start = $request['start'] . ' 00:00:00';
        $end = "";
        if (isset($request['end'])) $end = $request['end'] . " 23:59:59";

        $post = [
            "term" => $search,
            "buckets" => isset($request['targetservice']) ? $request['targetservice'] : [],
            "maxresults" => 1000,
            "timeout" => 0,
            "datefrom" => $start,
            "dateto" => $end,
            "sort" => 2,
            "media" => intval(isset($request['mediaFilter']) ? $request['mediaFilter'] : '0'),
            "terminate" => [],
            "offset" => $offset,
        ];

        return $this->call('search', $post);

    }

    public function read($storageid, $systemid, $bucket)
    {
        $query = [
            'type' => 1,
            'storageid' => $storageid,
            'systemid' => $systemid,
            'bucket' => $bucket,
        ];

        return $this->call('read', $query);
    }

}
