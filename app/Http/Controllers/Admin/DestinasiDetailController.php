<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DestinasiDetailRequest;
use App\Models\DestinasiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinasiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DestinasiDetail::all();

        return view('pages.admin.destinasi-detail.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.destinasi-detail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinasiDetailRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->namagunung);

        DestinasiDetail::create($data);
        return redirect()->route('destinasi-detail.index');
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
        $item = DestinasiDetail::findOrFail($id);

        return view('pages.admin.destinasi-detail.edit', [
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
    public function update(DestinasiDetailRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->namagunung);

        $item = DestinasiDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('destinasi-detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DestinasiDetail::findorFail($id);
        $item->delete();

        return redirect()->route('destinasi-detail.index');
    }
}
