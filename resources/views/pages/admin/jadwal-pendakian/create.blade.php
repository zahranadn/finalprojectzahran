@extends('layouts.admin')

@section('DashboardAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Jadwal Pendakian</h1>
    </div>

    <!-- Content Row -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('jadwal-pendakian.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Destinasi Gunung</label>
                    <select name="destinasi_detail_id" required class="form-control">
                        <option value="">Pilih Gunung, untuk ditambahkan Jadwal Pendakian</option>
                        @foreach($destinasi_detail as $destinasi_detail)
                            <option value="{{ $destinasi_detail->id }}">
                                {{ $destinasi_detail->namagunung }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_pendakian">Tanggal Pendakian</label>
                    <input type="date" class="form-control" name="tanggal_pendakian" placeholder="Tanggal Pendakian" value="{{ old('tanggal_pendakian') }}">
                </div>
                <div class="form-group">
                    <label for="kuota_pendakian">Kuota Pendakian</label>
                    <input type="number" class="form-control" name="kuota_pendakian" placeholder="Kuota Pendakian" value="{{ old('kuota_pendakian') }}">
                </div>
                <div class="form-group">
                    <label for="terdaftar">Terdaftar</label>
                    <select name="terdaftar" required class="form-control">
                        <option value="KUOTA MASIH TERSEDIA">Kuota Masih Tersedia</option>
                        <option value="KUOTA SUDAH FULL">Kuota Sudah Full</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="biaya">Harga</label>
                    <input type="number" class="form-control" name="biaya" placeholder="biaya" value="{{old('biaya') }}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



@endsection