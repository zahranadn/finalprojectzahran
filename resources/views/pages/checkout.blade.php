@extends('layouts.layoutusercheckout')
@section('title')
Checkout Online Ticket Booking Gunung
@endsection

@section('content')
<!-- CHECKOUT -->

<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">
                                Ticket Booking
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Details
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pl-lg-0">
                    <div class="card card-details">
                        <div class="col-lg-12 pl-lg-0">
                            <div class="card card-details">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <h1>Tujuan ke {{$item->destinasi_detail->namagunung}}</h1>
                                <p>
                                    {{$item->destinasi_detail->location}}
                                </p>
                                <div class="list-peserta">
                                    <table class="table table-responsive-sm text-center">
                                        <thead>
                                            <tr>
                                                <td scope="col">Nama</td>
                                                <td scope="col">Tanggal Lahir</td>
                                                <td scope="col">Jenis Kelamin</td>
                                                <td scope="col">Asal Daerah</td>
                                                <td scope="col">Alamat</td>
                                                <td scope="col">No Handphone</td>
                                                <td scope="col">No Identitas</td>
                                                <td scope="col">Foto Identitas</td>
                                                <td scope="col">Keterangan Pendaki</td>
                                                <td scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($item->pendaki as $pendaki)
                                            <tr>
                                                <td class="align-middle">{{$pendaki->nama}}</td>
                                                <td class="align-middle">{{$pendaki->tanggallahir}}</td>
                                                <td class="align-middle">{{$pendaki->jeniskelamin}}</td>
                                                <td class="align-middle">{{$pendaki->asaldaerah}}</td>
                                                <td class="align-middle">{{$pendaki->alamat}}</td>
                                                <td class="align-middle">{{$pendaki->nohandphone}}</td>
                                                <td class="align-middle">{{$pendaki->noidentitas}}</td>
                                                <td>
                                                    <img src="{{ Storage::url($pendaki->foto_identitas) }}" alt=""
                                                        style="width: 120px" class="img-thumbnail">
                                                </td>
                                                <td class="align-middle">{{$pendaki->keterangan_pendaki}}</td>
                                                <td class="align-middle">
                                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editpendaki{{ $pendaki->id }}">
                                                        <i class="fa fa-pencil-alt"> Edit</i>
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{route('checkout-remove', $pendaki->id)}}">
                                                        <img src="/frontend/images/remove.png" alt="" />
                                                    </a>
                                                </td>
                                            </tr>

                                            @empty
                                            <tr>
                                                <td colspan="12" class="text-center">
                                                    Data Kosong
                                                </td>
                                            </tr>

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div class="member mt-1">
                                    <h2>Tambah Peserta</h2>
                                    <form class=" pt-4" method="post" enctype="multipart/form-data"
                                        action="{{ route('checkout-create', $item->id) }}">
                                        @csrf
                                        <label class="sr-only" for="Nama">Nama</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="Nama" required
                                            name="nama" placeholder="Nama" />

                                        <label class="sr-only" for="tanggallahir">Tanggal Lahir</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control datepicker" id="tanggallahir"
                                                name="tanggallahir" required placeholder="Tanggal Lahir" />
                                        </div>

                                        <label class="sr-only" class="mr-2"
                                            for="inlineFormCustomSelectPref">Preference</label>
                                        <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelectPref"
                                            required name="jeniskelamin">
                                            <option selected value="">Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>

                                        <label class="sr-only" for="Asal Daerah">Asal Daerah</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="Asal Daerah"
                                            name="asaldaerah" required placeholder="Asal Daerah" />

                                        <label class="sr-only" for="Alamat">Alamat</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="Alamat" required
                                            name="alamat" placeholder="Alamat" />

                                        <label class="sr-only" for="No Hp">NO HP</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="No Hp" required
                                            name="nohandphone" placeholder="NO HP" />

                                        <label class="sr-only" for="No Identitas">NO HP</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="No Identitas" required
                                            name="noidentitas" placeholder="NO Identitas" />

                                        <label for="foto_identitas">Foto Identitas</label>
                                        <input type="file" class="form-control" name="foto_identitas"
                                            placeholder="Foto Identitas">

                                        <label class="sr-only" class="mr-2"
                                            for="inlineFormCustomSelectPref">Preference</label>
                                        <select class="custom-select mb-2 mr-sm-2 mt-3" id="inlineFormCustomSelectPref"
                                            required name="keterangan_pendaki">
                                            <option selected value="">Keterangan Pendaki</option>
                                            <option value="Ketua Kelompok">Ketua Kelompok</option>
                                            <option value="Anggota Kelompok">Anggota Kelompok</option>
                                        </select>

                                        <button type="submit" class="btn btn-add-now mb-2 px-4 mt-4">
                                            Tambah Peserta
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pl-lg-0 pt-4">
                            <div class="card card-details pt-0">
                                <h2>Checkout Information</h2>
                                <table class="trip-informations">
                                    <tr>
                                        <th width="50%">Jumlah Pendaki</th>
                                        <td width="50%" class="text-right">{{$item->pendaki->count()}}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Harga Pembayaran</th>
                                        <td width="50%" class="text-right">Rp {{$item->jadwal_pendakian->biaya}} /
                                            Orang</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Total Pembayaran</th>
                                        <td width="50%" class="text-right">
                                            <span class="text-blue">Rp {{ $item->transaction_total }}</span>
                                        </td>
                                    </tr>
                                </table>
                                <hr />
                                <h2>Instructions</h2>
                                <p class="payment-instructions pt-0">
                                    Silahkan Selesaikan Transaksi
                                    <br />
                                    - Setelah Anda menyelesaikan transaksi, System akan mengirimkan bukti bahwa anda
                                    <br />
                                    telah terdaftar untuk melakukan pendakian pada gunung yang anda tuju
                                    <br />
                                    - Tunjukan bukti tersebut kepada penjaga Basecamp sebagai langkah awal pendakian,
                                    dan juga "PEMBAYARAN"
                                    <br />
                                    - Calon Pendaki "DIWAJIBKAN" untuk membawa fotocopy KTP sebagai data yang harus
                                    diberikan kepada petugas
                                </p>
                            </div>
                            <div class="pesan-container">
                                <a href="{{route('checkout-success', $item->id)}}"
                                    class="btn btn-block btn-pesan-tiket mt-4 py-2">Lakukan
                                    Transaksi</a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{route('Details', $item->destinasi_detail->slug)}}" class="text-muted"
                                    style="font-weight: bold;">Cancel Booking</a>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</main>

<!-- Update Pendaki-->
@foreach ($item->pendaki as $pendaki)

<div class="modal fade" id="editpendaki{{ $pendaki->id }}" tabindex="-1" aria-labelledby="editpendaki"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data Pendaki</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('checkout-update', $pendaki->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama"
                            value="{{ $pendaki->nama }}">
                        <label class="mt-3" for="title">Asal Daerah</label>
                        <input type="text" class="form-control" name="asaldaerah" placeholder="Asal Daerah"
                            value="{{ $pendaki->asaldaerah }}">
                        <label class="mt-3" for="title">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                            value="{{ $pendaki->alamat }}">
                        <label class="mt-3" for="title">No Handphone</label>
                        <input type="text" class="form-control" name="nohandphone" placeholder="No Handphone"
                            value="{{ $pendaki->nohandphone }}">
                        <label class="mt-3" for="title">Keterangan Pendaki</label>
                        <select name="keterangan_pendaki" required class="form-control">
                            <option value="{{ $pendaki->keterangan_pendaki }}"> Keterangan Pendaki saat ini : ({{
                                $pendaki->keterangan_pendaki }})</option>
                            <option value="Ketua Kelompok">Ketua Kelompok</option>
                            <option value="Anggota Kelompok">Anggota Kelompok</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection