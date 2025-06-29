<?php

namespace App\Http\Controllers\anime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\search;

class AnimeController extends Controller
{
public function index(Request $request)
{
    $search =$request->query('search','');

    $apiQuery = $search ?['q'=>$search]:[];

    $page = $request->query('page',1);
    $apiUrl = env('JIKAN_API'); 

    $response = Http::get($apiUrl . 'anime',array_merge($apiQuery,[
        'page'=>$page
    ])); 

    
    if ($response->successful()) {
        $data = $response->json();
        
        
        $animeData = $data['data'];
        $pagination = $data['pagination'];

        return view('anime.index', compact('animeData','pagination','search'));
    } else {
        
        return view('anime.index', ['error' => 'Error fetching data']);
    }
}
public function show($id)
    {
        //
        $apiUrl = env("JIKAN_API");

        $response = Http::get($apiUrl.'anime/'.$id ."/full");

        if($response->successful()){
            $result = $response->json();
            $data = $result['data'];
            return view('anime.detailAnime', compact('data'));
        }else{
            return view('anime.detailAnime',['error'=>'Error featching anime Detail']);
        }

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
