<?php

namespace App\Http\Controllers;
use App\Models\DestinasiDetail;
use Illuminate\Http\Request;

class TicketbookingController extends Controller
{
    public function pesantiket(Request $request)
    {
        $items = DestinasiDetail::with(['galleries'])->get();
        return view('pages.pesantiket',[
            'items' =>$items
        ]);
    }
}
