@extends('layouts.layoutusercheckout')
@section('title')
Pemesanan Tiket Online Gunung
@endsection

@section('content')
<!-- SUCCES -->
<main>
    <div class="section-succes d-flex align-items-center">
        <div class="col text-center">
            <h1>Transaksi Telah Terkirim ke ADMIN!</h1>
            <img src="{{url('frontend/images/Checklist.png')}}" alt="" class="img-succes pt-2 pb-2" />
            <p style='color:black; font-size:22px'>
                Silahkan Tunggu beberapa saat 
                <br />
                Sampai Anda Mendapatkan Bukti Transaksi sebagai tanda TRANSAKSI BERHASIL !!
            </p>
            <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>

@endsection