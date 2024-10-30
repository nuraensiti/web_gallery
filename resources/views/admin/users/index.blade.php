@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Daftar Users</h3>
                <!-- Tombol untuk menambah pengguna baru -->
                <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Tambah User</a>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">Edit</a>
                                    <form action="{{ route('users.hapus', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
