<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DestinasiDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardManagementController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.management.dashboardmanagement',[
            'destinasi_detail' => DestinasiDetail::count(),
            'transactions' => Transaction::count(),
            'transactions_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transactions_success' => Transaction::where('transaction_status', 'SUCCESS')->count()
        ]);

    }
}
