<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\DataPendakiRequest;
use App\Models\DataPendaki;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionSuccess;
use App\Models\DestinasiDetail;
use App\Models\JadwalPendakian;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['pendaki','destinasi_detail','jadwal_pendakian','user'])->findOrFail($id);

        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {

        $destinasijadwal = JadwalPendakian::with(['destinasi_detail'])->findOrFail($id);

        $transaction = Transaction::create([
            'destinasi_detail_id' => $destinasijadwal->destinasi_detail_id,
            'jadwal_pendakian_id' => $destinasijadwal->id,
            'users_id' => Auth::user()->id,
            'transaction_total' => $destinasijadwal->biaya,
            'transaction_status' => ' ',
            'status_pendakian' => ' ',
        ]);

        DataPendaki::create([
            'transactions_id' =>$transaction->id,
            'nama' => Auth::user()->name,
            'tanggallahir' => Auth::user()->tanggallahiruser,
            'jeniskelamin' => Auth::user()->jeniskelaminuser,
            'asaldaerah' => Auth::user()->asaldaerahuser,
            'alamat' => Auth::user()->alamatuser,
            'nohandphone' => Auth::user()->nohandphoneuser,
            'noidentitas' => Auth::user()->noidentitasuser,
            'foto_identitas' => Auth::user()->fotoidentitasuser,
            'keterangan_pendaki' => 'Ketua Kelompok',

        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $datapendaki_id)
    {
        $item = DataPendaki::findorFail($datapendaki_id);

        $transaction = Transaction::with(['pendaki','destinasi_detail','jadwal_pendakian'])
            ->findOrFail($item->transactions_id);


        $transaction->transaction_total -= $transaction->jadwal_pendakian->biaya;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|string',
            'asaldaerah' => 'required|string',
            'alamat' => 'required|string',
            'nohandphone' => 'required|string',
            'noidentitas' => 'required|string',
            'foto_identitas' => 'required|image'
        ]);

        $data = $request->all();
        $data['foto_identitas'] = $request->file('foto_identitas')->store(
            'assets/fotoidentitas', 'public'
        );

        $data['transactions_id'] = $id;

        DataPendaki::create($data);

        $transaction = Transaction::with(['destinasi_detail','jadwal_pendakian'])->find($id);

        $transaction->transaction_total += $transaction->jadwal_pendakian->biaya;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function store(Request $request)
    {

    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['pendaki', 'destinasi_detail.galleries','jadwal_pendakian', 'user'])
        ->findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->status_pendakian = 'BELUM MENDAKI';

        $transaction->save();
    
        // kirim email ke user

        return view('pages.success');
    }

    public function update(Request $request, $datapendaki_id)
    {
        $data = $request->all();
        $item = DataPendaki::findorFail($datapendaki_id);

    
        $item->update($data);

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function edit($id)
    {
        $item = DataPendaki::findOrFail($id);

        return view('editdatapendaki',[
            'item' => $item
        ]);
    }


}
