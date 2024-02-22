@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Barang</h5>
                        <hr>

                        <div class="mb-3">
                            <strong>ID:</strong> {{ $barang->id }}
                        </div>

                        <div class="mb-3">
                            <strong>Merk:</strong> {{ $barang->merk }}
                        </div>

                        <div class="mb-3">
                            <strong>Seri:</strong> {{ $barang->seri }}
                        </div>

                        <div class="mb-3">
                            <strong>Spesifikasi:</strong> {{ $barang->spesifikasi ?? '-' }}
                        </div>

                        <div class="mb-3">
                            <strong>Stok:</strong> {{ $barang->stok }}
                        </div>

                        <div class="mb-3">
                            <strong>Kategori:</strong> {{ $barang->kategori->kategori }}
                        </div>

                        <a href="{{ route('barang.index') }}" class="btn btn-md btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
