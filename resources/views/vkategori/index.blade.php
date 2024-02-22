@extends('layouts.adm-main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
            </div>
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success mb-3">TAMBAH KATEGORI</a>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KATEGORI</th>
                            <th>JENIS</th>
                            <th>KETERANGAN</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rsetKategori as $rowkat)
                            <tr>
                                <td>{{ $rowkat->id  }}</td>
                                <td>{{ $rowkat->kategori  }}</td>
                                <td>{{ $rowkat->jenis  }}</td>
                                <td>{{ $rowkat->ketKategori  }}</td>

                                <td class="text-center"> 
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy', $rowkat->id) }}" method="POST">
                                        <a href="{{ route('kategori.show', $rowkat->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('kategori.edit', $rowkat->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                        @empty
                            <div class="alert">
                                Data Siswa belum tersedia
                            </div>
                        @endforelse
                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
@endsection