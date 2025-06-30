<?php

namespace App\Http\Controllers\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AnimeController extends Controller
{
    public function index()
    {
        $randomPage = rand(1, 20);

        [$topAnimeResponse, $recommendedResponse] = Http::pool(fn($pool) => [
            $pool->get(env("JIKAN_API") . "/top/anime?limit=8"),
            $pool->get(env("JIKAN_API") . "/recommendations/anime?page={$randomPage}"),
        ]);

        $topAnime = $topAnimeResponse->successful() ? $topAnimeResponse->json()['data'] : [];

        $recommendedAnime = [];

        if ($recommendedResponse->successful()) {
            $rawRecommended = $recommendedResponse->json()['data']??[];
            
            $allEntries = collect($rawRecommended)
            ->flatMap(fn($item) => $item['entry'])
            ->unique('mal_id')
            ->values();

            $recommendedAnime = $allEntries->count()<= 8
            ? $allEntries->all()
            : $allEntries->slice(rand(0, $allEntries->count() - 8), 8)->all();
        }


        return view(
            "anime.index",
            compact("topAnime", "recommendedAnime",)
        );
    }

    public function show($id)
    {
        //
        $apiUrl = env("JIKAN_API");

        $response = Http::get($apiUrl . "/anime/" . $id . "/full");

        if ($response->successful()) {
            $result = $response->json();
            $data = $result["data"];
            return view("anime.detailAnime", compact("data"));
        } else {
            return view("anime.detailAnime", [
                "error" => "Error featching anime Detail",
            ]);
        }
    }

    public function topAnime(Request $request)
    {
        $page = $request->query("page", 1);

        $response = Http::get(env("JIKAN_API") . "/top/anime", [
            'page' => $page,
        ]);

        if ($response->successful()) {
            $result = $response->json();
            $topAnime = $result['data'];
            $pagination = $result['pagination'];
            return view("anime.topAnime", compact("topAnime", "pagination", "page"));
        } else {
            return view("anime.topAnime", [
                "error" => "Error fetching top anime data",
            ]);
        }
    }

    public function search(Request $request)
    {
        $search = $request->query("search", "");

        $apiQuery = $search ? ["q" => $search] : [];

        $page = $request->query("page", 1);
        $apiUrl = env("JIKAN_API");

        $response = Http::get(
            $apiUrl . "/anime",
            array_merge($apiQuery, [
                "page" => $page,
            ])
        );

        if ($response->successful()) {
            $data = $response->json();

            $animeData = $data["data"];
            $pagination = $data["pagination"];

            return view(
                "anime.searchAnime",
                compact("animeData", "pagination", "search", "page")
            );
        } else {
            return view("anime.searchAnime", ["error" => "Error fetching data"]);
        }
    }
}
