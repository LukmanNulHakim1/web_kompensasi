<!-- resources/views/admin_labors/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Admin Labor</h1>
    <a href="{{ route('admin_labors.create') }}" class="btn btn-primary mb-3">Tambah Admin Labor</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Labor</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminLabors as $adminLabor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $adminLabor->name }}</td>
                <td>{{ $adminLabor->email }}</td>
                <td>{{ $adminLabor->labor->name ?? 'N/A' }}</td>
                <td>{{ $adminLabor->admin->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin_labors.edit', $adminLabor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin_labors.destroy', $adminLabor->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
