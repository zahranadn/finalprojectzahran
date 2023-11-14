@extends('layouts.admin')

@section('DashboardAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User {{ $item->id}}</h1>
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
            <form action="{{ route('manage-user.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label class="mt-3" for="title">Roles</label>
                    <select name="roles" required class="form-control">
                        <option value="{{ $item->roles }}"> Roles saat ini : ({{
                            $item->roles }})</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                        <option value="MANAGEMENT">MANAGEMENT</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Edit
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



@endsection