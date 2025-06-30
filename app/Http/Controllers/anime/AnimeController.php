<?php

namespace App\Http\Controllers\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\search;

class AnimeController extends Controller
{
    public function index()
    {
        $topAnime = Http::get(env("JIKAN_API") . "/top/anime?limit=8")->json(
            "data"
        );
        $recommendationResponse = Http::get(
            env("JIKAN_API") . "/recommendations/anime"
        );

        $recommendedAnime = [];

        if ($recommendationResponse->successful()) {
            $recommendationData = $recommendationResponse->json("data");

            foreach ($recommendationData as $item) {
                foreach ($item["entry"] as $anime) {
                    $recommendedAnime[$anime["mal_id"]] = $anime;
                }
            }

            $recommendedAnime = array_slice(
                array_values($recommendedAnime),
                0,
                8
            );
        }

        $recommendedAnime = array_slice(array_values($recommendedAnime), 0, 8);
        $randomAnime = [];
        for ($i = 0; $i < 8; $i++) {
            $random = Http::get(env("JIKAN_API") . "/random/anime");
            if ($random->successful()) {
                $randomAnime[] = $random->json("data");
            }
        }

        return view(
            "anime.index",
            compact("topAnime", "recommendedAnime", "randomAnime")
        );
    }

    // public function index(Request $request)
    // {
    //     $search = $request->query("search", "");

    //     $apiQuery = $search ? ["q" => $search] : [];

    //     $page = $request->query("page", 1);
    //     $apiUrl = env("JIKAN_API");

    //     $response = Http::get(
    //         $apiUrl . "/anime",
    //         array_merge($apiQuery, [
    //             "page" => $page,
    //         ])
    //     );

    //     if ($response->successful()) {
    //         $data = $response->json();

    //         $animeData = $data["data"];
    //         $pagination = $data["pagination"];

    //         return view(
    //             "anime.index",
    //             compact("animeData", "pagination", "search")
    //         );
    //     } else {
    //         return view("anime.index", ["error" => "Error fetching data"]);
    //     }
    // }
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
}
