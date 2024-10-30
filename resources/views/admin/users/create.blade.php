@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Tambah User</h3>
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
