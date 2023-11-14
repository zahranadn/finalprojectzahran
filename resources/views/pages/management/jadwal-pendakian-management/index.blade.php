@extends('layouts.management')

@section('DashboardManagement')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-0 text-gray-800">Jadwal Pendakian</h1>
    <div class="d-flex flex-row-reverse">
        {{--  <a href="" class="ml-3 d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal"
            data-target="#importjadwalpendakian">
            Import Data Jadwal Pendakian
        </a>  --}}
        <a href="{{ route('jadwal-pendakian-management.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jadwal Pendakian
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Destinasi Gunung</th>
                            <th>Tanggal Pendakian</th>
                            <th>Kuota Pendakian</th>
                            <th>Terdaftar</th>
                            <th>Harga Tiket Simaksi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->destinasi_detail->namagunung}}</td>
                            <td>{{ $item->tanggal_pendakian }}</td>
                            <td>{{ $item->kuota_pendakian }}</td>
                            <td>{{ $item->terdaftar}}</td>
                            <td>Rp {{ $item->biaya}}/Orang</td>
                            <td>
                                <a href="{{ route('jadwal-pendakian-management.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('jadwal-pendakian-management.destroy', $item->id) }}" method="post"
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
                        <td colspan="7" class="text-center">
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

<!-- Modal -->
<div class="modal fade" id="importjadwalpendakian" tabindex="-1" role="dialog" aria-labelledby="importjadwalpendakian"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('jadwalpendakianimport')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
        </div>
        </form>
    </div>
</div>


@endsection