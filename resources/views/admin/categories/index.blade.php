@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Daftar Kategori</h3>

                <!-- Display Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Tambah Kategori</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index => $kategori)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Displaying the row number -->
                                <td>{{ $kategori->kategori_name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('categories.edit', $kategori->id) }}" class="btn btn-warning me-2">Edit</a>
                                    <form action="{{ route('categories.destroy', $kategori->id) }}" method="post">
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
