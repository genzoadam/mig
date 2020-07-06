@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Kebun</div>

                <div class="card-body">

                    <form action="{{ route('kebun.update', $kebun->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                
                      <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input name="name" value="{{ $kebun->name }}" type="text" class="form-control" placeholder="Masukkan Nama" id="judul">
                      </div>
                  
                       <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection