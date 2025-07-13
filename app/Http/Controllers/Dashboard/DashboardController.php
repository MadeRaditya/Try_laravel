<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
         $collections = Collection::where('user_email', Auth::user()->email)->get();
         //$userComments = Comment::where('user_id', auth()->id())->get();

        return view('dashboard', compact('collections'));
    }

    public function storeCollection(Request $request)
    {
        $validated = $request->validate([
             'anime_mal_id' => 'required|string',
            'anime_title' => 'required|string',
            'anime_image' => 'required|url',
            'user_email' => 'required|email'
        ]);

        Collection::create($validated);

        return back()->with('success', 'Collection added successfully');
    }

    
}
