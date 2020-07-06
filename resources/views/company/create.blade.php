@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Company</div>

                <div class="card-body">

                    <form action="{{ route('company.store') }}" method="post">
                    {{ csrf_field() }}

                      <div class="form-group">
                        <label for="user">Owner:</label>
                        <select name="user_id" class="form-control" placeholder="Masukkan Owner" id="user" required>
                          <option value="" selected disabled>--Pilih User--</option>
                          @if($user->count() == 0)
                          <option>Tidak ada user</option>
                          @else
                          @foreach($user as $p)
                          <option value="{{ $p->id }}">{{ $p->name }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>

                      *Jika tidak ada user, buat user baru dengan cara logout, kemudian daftar di halaman register
                      

                      <div class="form-group">
                        <label for="judul">Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukkan Nama Company" id="judul">
                      </div>
                  
                      <button type="submit" class="btn btn-sm btn-primary">Add</button>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection