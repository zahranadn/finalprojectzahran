@extends('layouts.admin')

@section('DashboardAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
    </div>

    

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <form action="/search" method="get">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="" class="form-label">Pencarian</label>
                        <input name="search" class="form-control" placeholder="Cari"
                            value="{{isset($search) ? $search : ''}}">
                    </div>
                    <div class="col-sm-3 mt-2">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
                    <div class="col mt-4 text-right">
                        <a href="{{ route('exportdatapendaki') }}" class="btn btn-info"> Export Seluruh Data Pendaki
                            <i class="fa fa-print"></i>
                        </a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tujuan Gunung</th>
                            <th>Tanggal Pendakian</th>
                            <th>User</th>
                            <th>Status Pendakian</th>
                            <th>Status Transaksi</th>
                            <th>Total</th>
                            <th>Setujui Transaksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->destinasi_detail->namagunung}}</td>
                            <td>{{ $item->jadwal_pendakian->tanggal_pendakian }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->status_pendakian}}</td>
                            <td>{{ $item->transaction_status}}</td>
                            <td>Rp{{ $item->transaction_total}}</td>
                            <td>
                                <a class="nav-link" href="" data-toggle="modal" data-target="#approvereject{{ $item->id }}">
                                    <button class="btn btn-primary">Approve ?</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('transaction.destroy', $item->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="8" class="text-center">
                            Data Kosong
                        </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@foreach ($items as $item)
{{--  untuk lihat history --}}
<div class="modal fade" id="approvereject{{ $item->id }}" tabindex="-1" aria-labelledby="approvereject"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Approve/Reject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('successnotification', $item->id)}}" method="get" class="d-inline">
                    @csrf
                    <button class="btn btn-info">
                        APPROVE
                    </button>
                </form>
                <form action="{{ route('transaction.destroy', $item->id) }}" method="post"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">
                        REJECT
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

