@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Kategori</h3>
                <form action="{{ route('categories.store') }}" method="post"> <!-- Updated action route -->
                    @csrf
                    <div class="form-group mb-3">
                        <label for="kategori_name">Nama Kategori</label> <!-- Updated label -->
                        <input type="text" name="kategori_name" class="form-control" id="kategori_name" required> <!-- Updated input name -->
                    </div>

                    <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
