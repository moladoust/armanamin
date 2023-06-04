<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');

        $result = Cache::remember('MovieController_search__' . $query, 60 * 60, function () use ($query) {

            // we will get just page 1.
            $response = Http::get("http://moviesapi.ir/api/v1/movies?q={$query}&page=1");
            if ($response['data']) {
                return $response['data'];
            }
            return [];
        });

        return response()->json($result);
    }
}
