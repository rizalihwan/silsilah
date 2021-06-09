@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Buat Data Anak Baru
                    </div>
                    <div class="card-body">
                        <form action="{{ route('child.store') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="name">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control custom-select">
                                        <option disabled selected>-- Pilih Jenis Kelamin Anda --</option>
                                        <option value="0">Pria</option>
                                        <option value="1">Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-12 my-3">
                                    <a href="{{ route('home') }}" class="btn btn-danger btn-sm">KEMBALI</a>
                                    <button type="submit" class="btn btn-primary btn-sm">TAMBAH</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
