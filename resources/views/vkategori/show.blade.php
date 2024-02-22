@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Kategori</h5>
                        <hr>

                        <div class="mb-3">
                            <strong>ID:</strong> {{ $kategori->id }}
                        </div>

                        <div class="mb-3">
                            <strong>Kategori:</strong> {{ $kategori->kategori }}
                        </div>

                        <div class="mb-3">
                            <strong>Jenis:</strong> {{ $kategori->jenis }}
                        </div>

                        <a href="{{ route('kategori.index') }}" class="btn btn-md btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
