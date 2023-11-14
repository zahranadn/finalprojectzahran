<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DatapendakiforexportExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TransactionRequest;
use App\Mail\TransactionFailed;
use App\Mail\TransactionSuccess;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Transaction::with([
            'pendaki', 'destinasi_detail', 'jadwal_pendakian', 'user'
        ])->get();

        return view('pages.admin.transaction.index',[
            'items' => $items
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $items= Transaction::where(function($query) use ($search){

            $query-> where('status_pendakian', 'like', "%$search%")
            ->orWhere('transaction_status', 'like', "%$search%");
            })
            ->orWhereHas('user', function($query) use ($search){
                $query->where('name', 'like', "%$search%");
            })
            ->orWhereHas('destinasi_detail', function($query) use ($search){
                $query->where('namagunung', 'like', "%$search%");
            })
            ->get();
            
            return view('pages.admin.transaction.index', compact('items','search'));
            
    }

    public function Datapendakiexport(){
        return Excel::download(new DatapendakiforexportExport, 'datapendaki.xlsx');
    }
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with ([
            'pendaki', 'destinasi_detail', 'jadwal_pendakian', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail',[
            'item' => $item
        ]);

    }

    public function printData($id)
    {
        $printData = Transaction::with ([
            'pendaki', 'destinasi_detail', 'jadwal_pendakian', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction.print',[
            'printData' => $printData
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findorFail($id);
        $item->delete();

        Mail::to($item->user)->send(
            new TransactionFailed($item)
        );

        return redirect()->route('transaction.index');
    }

    public function successnotification($id)
    {
        $transaction = Transaction::with(['pendaki', 'destinasi_detail.galleries','jadwal_pendakian', 'user'])
        ->findOrFail($id);

        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );

        return redirect()->route('transaction.index');
    }

}
