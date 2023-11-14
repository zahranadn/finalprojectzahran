@extends('layouts.admin')

@section('DashboardAdmin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Destinasi Gunung {{ $item->namagunung}}</h1>
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
            <form action="{{ route('destinasi-detail.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Nama Gunung</label>
                    <input type="text" class="form-control" name="namagunung" placeholder="Nama Gunung" value="{{ $item->namagunung }}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Location" value="{{ $item->location }}">
                </div>
                <div class="form-group">
                    <label for="tentang_gunung">Tentang Gunung</label>
                    <textarea name="tentang_gunung" rows="10" class="d-block w-100 form-control">{{ $item->tentang_gunung }}</textarea>
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