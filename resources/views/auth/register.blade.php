@extends('layouts.layoutuser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggallahiruser" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal
                                Lahir ') }}</label>

                            <div class="col-md-6">

                                <label class="sr-only" for="tanggallahiruser">Tanggal Lahir</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control datepicker" id="tanggallahiruser"
                                        @error('tanggallahiruser') is-invalid @enderror" name="tanggallahiruser"
                                        value="{{ old('tanggallahiruser') }}" required autocomplete="name" autofocus
                                        required placeholder="Tanggal Lahir" />
                                </div>

                                @error('tanggallahiruser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jeniskelaminuser" class="col-md-4 col-form-label text-md-end">{{ __('Jenis
                                Kelamin ') }}</label>

                            <div class="col-md-6">

                                <label class="sr-only" for="jeniskelaminuser">Jenis Kelamin</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelectPref" required
                                        id="jeniskelaminuser" @error('jeniskelaminuser') is-invalid @enderror" name="jeniskelaminuser"
                                        value="{{ old('jeniskelaminuser') }}" required autocomplete="name" autofocus
                                        required placeholder="Jenis Kelamin">
                                        <option selected value="">Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                @error('jeniskelaminuser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="asaldaerahuser" class="col-md-4 col-form-label text-md-end">{{ __('Asal Daerah')
                                }}</label>

                            <div class="col-md-6">
                                <input id="asaldaerahuser" type="text"
                                    class="form-control @error('asaldaerahuser') is-invalid @enderror"
                                    name="asaldaerahuser" value="{{ old('asaldaerahuser') }}" required
                                    autocomplete="asaldaerahuser" autofocus>

                                @error('asaldaerahuser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamatuser" class="col-md-4 col-form-label text-md-end">{{ __('Alamat')
                                }}</label>

                            <div class="col-md-6">
                                <input id="alamatuser" type="text"
                                    class="form-control @error('alamatuser') is-invalid @enderror" name="alamatuser"
                                    value="{{ old('alamatuser') }}" required autocomplete="alamatuser" autofocus>

                                @error('alamatuser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nohandphoneuser" class="col-md-4 col-form-label text-md-end">{{ __('No
                                Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="nohandphoneuser" type="text"
                                    class="form-control @error('nohandphoneuser') is-invalid @enderror"
                                    name="nohandphoneuser" value="{{ old('nohandphoneuser') }}" required
                                    autocomplete="nohandphoneuser" autofocus>

                                @error('nohandphoneuser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="noidentitasuser" class="col-md-4 col-form-label text-md-end">{{ __('No
                                Identitas/ no KTP') }}</label>

                            <div class="col-md-6">
                                <input id="noidentitasuser" type="text"
                                    class="form-control @error('noidentitasuser') is-invalid @enderror"
                                    name="noidentitasuser" value="{{ old('noidentitasuser') }}" required
                                    autocomplete="noidentitasuser" autofocus>

                                @error('noidentitasuser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fotoidentitasuser" class="col-md-4 col-form-label text-md-end">{{ __('Foto Identitas/KTP')
                                }}</label>

                            <div class="col-md-6">
                                <input id="fotoidentitasuser" type="file"
                                    class="form-control @error('fotoidentitasuser') is-invalid @enderror" name="fotoidentitasuser"
                                    value="{{ old('fotoidentitasuser') }}" required autocomplete="fotoidentitasuser" autofocus>

                                @error('fotoidentitasuser')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection