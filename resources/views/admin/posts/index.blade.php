@extends('admin.layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Success message after update or delete -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">+ Post</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $index => $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->kategori ? $post->kategori->kategori_name : 'Tidak ada kategori' }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @if (Str::lower($post->status) == 'publish')
                                    <span class="badge bg-success text-white">{{ Str::ucfirst($post->status)  }}</span>
                                @else
                                    <span class="badge bg-warning text-white">{{ Str::ucfirst($post->status) }}</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d M Y') }}</td>
                            <td class="d-flex">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning me-2">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
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
@endsection
