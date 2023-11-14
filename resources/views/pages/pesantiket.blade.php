@extends('layouts.layoutuser')
@section('title')
Pemesanan Tiket Online Gunung
@endsection

@section('content')
<!-- LIST DESTINASI -->
<section class="list-destinasi" id="destinasi">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>
                    Silahkan Pilih Destinasi Gunung
                </h2>
                <p>Yang ingin anda Tuju</p>
            </div>
        </div>
        <div class="content-destinasi row justify-content-center">
            @foreach ($items as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card-destinasi text-center d-flex flex-column"
                style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                    <div class="nama-destinasi">{{$item->namagunung}}</div>
                    <div class="lokasi-destinasi">{{$item->location}}</div>
                    <div class="button-destinasi mt-auto">
                        <a href="{{url('/details', $item->slug)}}" class="btn btn-destinasi-detail px-4">
                            Pilih
                        </a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

@endsection