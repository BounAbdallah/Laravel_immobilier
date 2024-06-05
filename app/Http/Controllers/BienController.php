<?php
namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();
        return view('biens.index', compact('biens'));
    }

    public function show(Bien $bien)
    {
        return view('biens.show', compact('bien'));
    }
}
