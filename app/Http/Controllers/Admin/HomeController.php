<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Classes\Intelx;

class HomeController extends Controller
{
    public function getIndex(Request $request)
    {
        $data = [];
        $buckets = Config::get('options.Buckets');
        $PublicWeb = Config::get('options.PublicWeb');

        if ($request->get('search')) {
            $intel = new Intelx();
            $res = $intel->searchResult($request->get('search'), $request->all(), $request->get('page'));

            if ($res['status'] == 200) {
                $data = $res['data'];
            } else return Redirect::route('admin.dashboard')->with('error', $res['data']);
        }

        return view('admin.index')
            ->with('buckets', $buckets)
            ->with('PublicWeb', $PublicWeb)
            ->with('data', $data);
    }

    public function getRead($storageid, $systemid, $name, $bucket)
    {
        $intel = new Intelx();
        $res = $intel->read($storageid, $systemid, $bucket);
        if ($res['status'] == 200) {
            $data = $res['data'];
        } else return Redirect::back()->with('error', $res['data']);
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $name),
        ];
        return Response::make($data, 200, $headers);
    }

}
