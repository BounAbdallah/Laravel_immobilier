<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();
        return view('posts.index', ['biens' => $biens]);
    }
}
