@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- Route 'posts.update' butuh ID post yang sedang di-edit -->
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Mengganti metode menjadi PUT untuk update -->

                    <div class="form-group mb-3">
                        <label for="title">Judul</label>
                        <!-- Gunakan old() untuk menjaga input saat ada error validasi -->
                        <input type="text" name="title" class="form-control" id="title" required value="{{ old('title', $post->title) }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="category_id">Kategori</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->kategori_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="publish" {{ old('status', $post->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                            <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="content">Isi</label>
                        <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
