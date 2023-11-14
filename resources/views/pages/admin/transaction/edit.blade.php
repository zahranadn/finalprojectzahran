@extends('layouts.admin')

@section('DashboardAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Transaksi Pendaki {{ $item->namagunung}}</h1>
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
            <form action="{{ route('transaction.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Status Transaksi</label>
                    <select name="transaction_status" required class="form-control">
                        <option value="{{ $item->transaction_status }}"> Status Saat Ini ({{ $item->transaction_status }})</option>
                        <option value="PENDING">Pending</option>
                        <option value="SUCCESS">Success</option>
                        <option value="CANCEL">Cancel</option>
                        <option value="FAILED">Failed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Status Pendakian</label>
                    <select name="status_pendakian" required class="form-control">
                        <option value="{{ $item->status_pendakian }}"> Status Pendakian Saat Ini ({{ $item->status_pendakian }})</option>
                        <option value="BELUM MENDAKI">Belum Mendaki</option>
                        <option value="DALAM PENDAKIAN">Dalam Pendakian</option>
                        <option value="SUDAH TURUN">Sudah Turun</option>
                    </select>
                </div>
                {{--  <div class="form-group">
                    <label for="title">Status Pendakian</label>
                    <select name="approve_transaction" required class="form-control">
                        <option value="{{ $item->approve_transaction }}"> Status Pendakian Saat Ini ({{ $item->approve_transaction }})</option>
                        <option value="APPROVE">APPROVE</option>
                        <option value="REJECT">REJECT</option>
                    </select>
                </div>  --}}
                <button type="submit" class="btn btn-primary btn-block">
                    Edit
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



@endsection