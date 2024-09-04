<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Setting::where('id', 1)->exists()) {
            $input = [
                'title' => 'intelx system',
            ];
            Setting::create($input);

        }
    }
}
