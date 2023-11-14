<?php

namespace App\Http\Controllers;

use App\Models\DataPendaki;
use App\Models\DestinasiDetail;
use App\Models\JadwalPendakian;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function details(Request $request, $slug)
    {
        $items = DestinasiDetail::with(['galleries','jadwalpendakian'])->where('slug', $slug)->firstOrFail();
        return view('pages.details',[
            'items' =>$items,
        ]);
    }
}
