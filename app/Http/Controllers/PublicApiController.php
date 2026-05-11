<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PublicApiController extends Controller
{
    public function posts()
    {
        try {
            $posts = Cache::remember('public_api_posts', now()->addMinutes(10), function () {
                $response = Http::timeout(5)->get('https://jsonplaceholder.typicode.com/posts');

                if ($response->failed()) {
                    return [];
                }

                return array_slice($response->json(), 0, 10);
            });

            return view('posts', [
                'posts' => $posts,
                'error' => count($posts) === 0 ? 'Unable to fetch public API data.' : null,
            ]);

        } catch (\Exception $e) {
            return view('posts', [
                'posts' => [],
                'error' => 'Public API is currently unavailable.',
            ]);
        }
    }
}
