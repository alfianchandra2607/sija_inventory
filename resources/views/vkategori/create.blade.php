@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="POST">                    
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">KATEGORI</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" placeholder="Masukkan Nama Kategori">
                            
                                <!-- error message untuk kategori -->
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold" for="jenis">JENIS</label>
                                <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis" aria-label="Default select example">
                                    <option value="blank" selected disabled>Pilih Jenis</option>
                                    <option value="M">M</option>
                                    <option value="A">Alat</option>
                                    <option value="BHP">Barang Habis Pakai</option>
                                    <option value="BTHP">Barang Tidak Habis Pakai</option>
                                </select>

                                <!-- error message untuk jenis -->
                                @error('jenis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-md btn-warning">BATAL</a>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
