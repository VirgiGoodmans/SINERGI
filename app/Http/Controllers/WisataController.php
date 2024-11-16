<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function showSiblarak()
    {
        $spots = Spot::all();
        return view('wisata.siblarak', compact('spots'));
    }

    public function showKemanten()
    {
        $spots = Spot::all();
        return view('wisata.kemanten', compact('spots'));
    }
    public function showKampungDolanan()
    {
        $spots = Spot::all();
        return view('wisata.kampung_dolanan', compact('spots'));
    }

    public function showUmkmLokal()
    {
        return view('wisata.umkm_lokal');
    }
}
