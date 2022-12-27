<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get(env('JUSTFUN_QUERY'), [
            'firstTypeId' => $request->input('firstType', 'all'),
            'secondTypeId' => $request->input('secondType'),
            'type' => 1,
        ]);
        $response = $response->json('data');
        $navs = $this->get_navs('justfun_navs');
        foreach ( $navs as $key => $nav ) {
            if (
                $request->input('firstType', 'all') == $nav['firstTypeId'] &&
                $request->input('secondType', null) == $nav['secondTypeId']
            ) {
                $navs[$key]['isActive'] = true;
            } else {
                $navs[$key]['isActive'] = false;
            }
        }
        return view('dashboard')
            ->with('data', $response)
            ->with('navs', $navs);
    }

    public function download()
    {
        return view('download');
    }

    public function get_navs($key)
    {
        if ( Cache::has($key) ) {
            return Cache::get($key);
        }

        $response = Http::get(env('JUSTFUN_NAVS'))->json('data');

        if ( $response ) {
            foreach ( $response as $key => $type ) {
                switch ($type['firstTypeId']) {
                    case 'all':
                        $response[$key]['navigationLogo'] = Storage::url('navs_all.png');
                        break;
                    case 'important':
                        $response[$key]['navigationLogo'] = Storage::url('navs_hot.png');
                        break;
                    case 'finish':
                        $response[$key]['navigationLogo'] = Storage::url('navs_over.png');
                        break;
                    case 'football':
                        if ($type['secondTypeId'] == 1) {
                            $response[$key]['navigationLogo'] = Storage::url('worldcup.png');
                        } elseif ($type['secondTypeId'] == 82) {
                            $response[$key]['navigationLogo'] = Storage::url('euro.png');
                        } elseif ($type['secondTypeId'] == 108) {
                            $response[$key]['navigationLogo'] = Storage::url('seriea.png');
                        }
                        break;
                    case 'basketball':
                        if ($type['secondTypeId'] == 1) {
                            $response[$key]['navigationLogo'] = Storage::url('nba.png');
                        } elseif ($type['secondTypeId'] == 3) {
                            $response[$key]['navigationLogo'] = Storage::url('cba.png');
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        Cache::put($key, $response, now()->addHours(8));

        return $response;
    }
}
