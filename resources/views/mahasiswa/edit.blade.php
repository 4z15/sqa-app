@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Mahasiswa</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" value="{{ $mahasiswa->nim }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required>{{ $mahasiswa->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tempat_tinggal" class="form-label">Tempat Tinggal</label>
            <input type="text" name="tempat_tinggal" value="{{ $mahasiswa->tempat_tinggal }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <input type="text" name="no_telp" value="{{ $mahasiswa->no_telp }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $mahasiswa->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poto" class="form-label">Poto</label>
            @if($mahasiswa->poto)
                <img src="{{ Storage::url($mahasiswa->poto) }}" alt="Poto" width="100" class="d-block mb-2">
            @endif
            <input type="file" name="poto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
