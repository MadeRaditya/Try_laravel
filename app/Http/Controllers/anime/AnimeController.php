<?php

namespace App\Http\Controllers\anime;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class AnimeController extends Controller
{
    public function index()
    {
        $randomPage = rand(1, 20);

        [$topAnimeResponse, $recommendedResponse, $newAnime] = Http::pool(fn($pool) => [
            $pool->get(env("JIKAN_API") . "/top/anime?limit=8"),
            $pool->get(env("JIKAN_API") . "/recommendations/anime?page={$randomPage}"),
            $pool->get(env("JIKAN_API") . "/seasons/now"),
        ]);

        $topAnime = $topAnimeResponse->successful() ? $topAnimeResponse->json()['data'] : [];

        $recommendedAnime = [];

        if ($recommendedResponse->successful()) {
            $rawRecommended = $recommendedResponse->json()['data'] ?? [];

            $allEntries = collect($rawRecommended)
                ->flatMap(fn($item) => $item['entry'])
                ->unique('mal_id')
                ->values();

            $recommendedAnime = $allEntries->count() <= 8
                ? $allEntries->all()
                : $allEntries->slice(rand(0, $allEntries->count() - 8), 8)->all();
        }

        $rawnewAnime = $newAnime->successful() ? $newAnime->json()['data'] : [];
        $uniqueNewAnime = [];
        if (count($rawnewAnime) > 0) {
            foreach($rawnewAnime as $anime) {
                if (isset($anime['mal_id'])) {
                    $uniqueNewAnime[$anime['mal_id']] = $anime;
                }
            }
        }

        $newAnime = array_values(array_slice($uniqueNewAnime, 0, 8));

        return view(
            "anime.index",
            compact("topAnime", "recommendedAnime", "newAnime")
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

            $existingCollection = Collection::where("user_email", Auth::user()->email)
                                            ->where("anime_mal_id", $data["mal_id"])
                                            ->exists();

            $anime_mal_id = $data["mal_id"];
            $comments = Comment::where('anime_mal_id', $anime_mal_id)
                            ->whereNull('parent_id')
                            ->with('replies')
                            ->latest()
                            ->get();
        

            return view("anime.detailAnime", compact("data", "existingCollection","comments"));
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

    public function newAnime(Request $request)
    {
        $page = $request->query("page", 1);

        $response = Http::get(env("JIKAN_API") . "/seasons/now", [
            'sfw'           => 'true',
            'page'          => $page,
        ]);



        if ($response->successful()) {
            $result = $response->json();
            $uniqueNewAnime = [];
            if(count($result['data']) > 0) {
                foreach($result['data'] as $anime) {
                    if (isset($anime['mal_id'])) {
                        $uniqueNewAnime[$anime['mal_id']] = $anime;
                    }
                }
            }
            $newAnime = array_values($uniqueNewAnime);
            $pagination = $result['pagination'];
            return view("anime.newAnime", compact("newAnime", "pagination", "page"));
        } else {
            return view("anime.newAnime", [
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
