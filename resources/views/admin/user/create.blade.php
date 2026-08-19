@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah User / Admin</h2>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin">
            <label class="form-check-label" for="is_admin">Beri akses Admin</label>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
