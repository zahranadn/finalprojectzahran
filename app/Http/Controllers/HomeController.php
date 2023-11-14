<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homee(Request $request)
    {
        $items = Transaction::with([
            'pendaki', 'destinasi_detail', 'jadwal_pendakian', 'user'
        ])->get();
        
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
