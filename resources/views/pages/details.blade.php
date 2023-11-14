@extends('layouts.layoutuser')
@section('title')
Pemesanan Tiket Online Gunung
@endsection

@section('content')
<!-- DETAIL DESTINASI -->

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
                            <li class="breadcrumb-item active" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{$items->namagunung}}</h1>
                        <p>
                            {{$items->location}}
                        </p>

                        @if($items->galleries->count())
                        <div class="gallery">
                            <div class="foto-container text-center">
                                <img class="foto" id="foto-default"
                                    src="{{ Storage::url($items->galleries->first()->image) }}" />
                                <div>
                                    @foreach($items->galleries as $gallery)
                                    <a href="frontend/images/header1.jpg"><img class="klik-foto" width="128"
                                            src="{{ Storage::url($gallery->image) }}" /></a>
                                    @endforeach

                                </div>
                            </div>
                            @endif
                            <h2>Tentang Gunung</h2>
                            <p>
                                {!!$items->tentang_gunung!!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 pl-lg-0 pt-4">
                    <div class="card card-details pt-0">
                        <h2>Beli dan Pilih Waktu Booking</h2>
                        <table class="table table-responsive-sm text-center mt-4">
                            <thead>
                                <tr>
                                    <td scope="col">Tanggal Pendakian</td>
                                    <td scope="col">Kuota Pendakian</td>
                                    <td scope="col">Terdaftar</td>
                                    <td scope="col">Biaya</td>
                                    <td scope="col">Booking</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items->jadwalpendakian as $jadwalpendakian)
                                <tr>
                                    <td class="align-middle">{{$jadwalpendakian->tanggal_pendakian}}</td>
                                    <td class="align-middle">
                                        <div class="color-table">
                                            {{$jadwalpendakian->kuota_pendakian}}
                                        </div>
                                    </td>
                                    <td class="align-middle">{{$jadwalpendakian->terdaftar}}</td>
                                    {{--  <td class="align-middle">{{$terdaftar}}</td>  --}}
                                    <td class="align-middle">Rp {{$jadwalpendakian->biaya}}/Orang</td>
                                    <td>
                                        @if($jadwalpendakian->terdaftar == 'KUOTA MASIH TERSEDIA')
                                        <form action="{{ route('checkout_process', $jadwalpendakian->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-block btn-pesan-tiket mt-4 py-2" type="submit">
                                                Pesan Tiket
                                            </button>
                                        </form>
                                        @else
                                        <form action="#" method="get">
                                            <button class="btn btn-block btn-danger mt-4 py-2" type="submit">
                                                Pesan Tiket
                                            </button>
                                        </form>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p>
                            *Pilih Jadwal Pendakian Kuota yang Masih Tersedia
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection