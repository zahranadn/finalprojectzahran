<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.styleuser')
</head>
<body>
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <div class="navbar-nav ml-auto mr-auto mr-sm-auto mr-lg-0 mr-md-auto">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{url('frontend/images/gununglogo.png')}}" alt="" />
                </a>
            </div>
            <ul class="navbar-nav mr-auto d-none d-lg-block">
                <li>
                    <span class="text-muted">| &nbsp; Jelajahi Keindahan Gunung Indonesia</span>
                </li>
            </ul>
        </nav>
    </div>
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 text-black-800">Detail Transaksi {{ $printData->user->name}}</h1>
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
                        <td>{{ $printData->id }}</td>
                    </tr>
                    <tr>
                        <th>Destinasi Gunung</th>
                        <td>{{ $printData->destinasi_detail->namagunung }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pemesan Tiket</th>
                        <td>{{ $printData->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Total Transaksi</th>
                        <td>Rp {{ $printData->transaction_total }}</td>
                    </tr>
                    <tr>
                        <th>Status Transaksi</th>
                        <td>{{ $printData->transaction_status }}</td>
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
                                    <th>Foto Identitas</th>
                                </tr>
                                @foreach($printData->pendaki as $pendaki)
                                <tr>
                                    <td>{{ $pendaki->id }}</td>
                                    <td>{{ $pendaki->noidentitas }}</td>
                                    <td>{{ $pendaki->nama }}</td>
                                    <td>{{ $pendaki->tanggallahir }}</td>
                                    <td>{{ $pendaki->jeniskelamin ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <td>{{ $pendaki->asaldaerah}}</td>
                                    <td>{{ $pendaki->nohandphone}}</td>
                                    <td>
                                        <img src="{{ Storage::url($pendaki->foto_identitas) }}" alt="" style="width: 120px" class="img-thumbnail">
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>
