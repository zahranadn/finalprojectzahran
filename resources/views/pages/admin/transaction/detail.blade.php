@extends('layouts.admin')

@section('DashboardAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name}}</h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $item->id }}</td>
                </tr>
                <tr>
                    <th>Destinasi Gunung</th>
                    <td>{{ $item->destinasi_detail->namagunung }}</td>
                </tr>
                <tr>
                    <th>Nama Pemesan Tiket</th>
                    <td>{{ $item->user->name }}</td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>Rp {{ $item->transaction_total }}</td>
                </tr>
                <tr>
                    <th>Status Transaksi</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>
                <tr>
                    <th>Anggota Pendakian</th>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nomor Identitas</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Asal Daerah</th>
                                <th>Nomor Handphone</th>
                                <th>Keterangan Pendaki</th>
                                <th>Foto Identitas</th>
                            </tr>
                            @foreach($item->pendaki as $pendaki)
                            <tr>
                                <td>{{ $pendaki->id }}</td>
                                <td>{{ $pendaki->noidentitas }}</td>
                                <td>{{ $pendaki->nama }}</td>
                                <td>{{ $pendaki->tanggallahir }}</td>
                                <td>{{ $pendaki->jeniskelamin ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td>{{ $pendaki->asaldaerah}}</td>
                                <td>{{ $pendaki->nohandphone}}</td>
                                <td>{{ $pendaki->keterangan_pendaki}}</td>
                                <td>
                                    <img src="{{ Storage::url($pendaki->foto_identitas) }}" alt="" style="width: 120px" class="img-thumbnail" target="_blank">
                                    <a href="{{ Storage::url($pendaki->foto_identitas) }}" target="_blank" rel="noopener noreferrer" class="text-md-center">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <a href="{{ route('print', $item->id) }}" class="btn btn-info"> Print Data Detail Transaksi dan Pendaki
            <i class="fa fa-print"></i>
        </a>
    </div>
   
</div>
<!-- /.container-fluid -->



@endsection