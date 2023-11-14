<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JadwalPendakianRequest;
use App\Models\JadwalPendakian;
use App\Models\DestinasiDetail;
use App\Imports\JadwalPendakianImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JadwalPendakianManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = JadwalPendakian::with(['destinasi_detail'])->get();

        return view('pages.management.jadwal-pendakian-management.index',[
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function jadwalpendakianimport(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('JadwalPendakian', $namaFile);

        Excel::import(new JadwalPendakianImport, public_path('/JadwalPendakian/'.$namaFile));
        return redirect()->route('jadwal-pendakian-management.index');

    }
    public function create()
    {
        $destinasi_detail = DestinasiDetail::all();
        return view('pages.management.jadwal-pendakian-management.create',[
            'destinasi_detail' => $destinasi_detail
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalPendakianRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);

        JadwalPendakian::create($data);
        return redirect()->route('jadwal-pendakian-management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destinasi_detail = DestinasiDetail::all();
        $item = JadwalPendakian::findOrFail($id);

        return view('pages.management.jadwal-pendakian-management.edit',[
            'item' => $item,
            'destinasi_detail' => $destinasi_detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalPendakianRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->id);

        $item = JadwalPendakian::findOrFail($id);

        $item->update($data);

        return redirect()->route('jadwal-pendakian-management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = JadwalPendakian::findorFail($id);
        $item->delete();

        return redirect()->route('jadwal-pendakian-management.index');
    }
}
