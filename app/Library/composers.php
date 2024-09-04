<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

$local = false;
$x = strpos(URL::current(), "localhost");
$y = strpos(URL::current(), "127.0.0.1");
if ($x || $y) $local = true;

$setting = [];
$logo = asset('assets/admin/images/logo2.png').'?v=0.1';
if (Schema::hasTable('settings'))
    $setting = Setting::first();

View::share([
    'setting' => $setting,
    'local' => $local,
    'logo' => $logo,
]);
