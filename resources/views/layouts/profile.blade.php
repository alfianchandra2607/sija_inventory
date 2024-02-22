@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Profil Pengguna</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Profil</h5>
                        <p class="card-text">Nama: {{ $user->name }}</p>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
                    </div>
                </div>
                <a href="{{ route('dashboard.index') }}" class="btn btn-md btn-warning">KELUAR</a>
            </div>
        </div>
    </div>
@endsection
