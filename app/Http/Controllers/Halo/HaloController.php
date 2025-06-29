<?php

namespace App\Http\Controllers\Halo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HaloController extends Controller
{
    //
    public function index(){
        $nama = "Joko";
        $npm = 2211010082;
        $data=['nama' => $nama,
                'npm' => $npm];
        return view('coba.halo',$data);
    }
}
