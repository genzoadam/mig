@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Blok</div>

                <div class="card-body">

                    <form action="{{ route('blok.update', $blok->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                      <div class="form-group">
                        <label for="user">Divisi:</label>
                        <select name="divisi_id" class="form-control" placeholder="Masukkan Divisi" id="user" required>
                          <option value="{{ $blok->divisi_id }}" selected>{{ $blok->divisi->name }}</option>
                          @if($divisi->count() == 0)
                          <option>Tidak ada divisi</option>
                          @else
                          @foreach($divisi as $p)
                          <option value="{{ $p->id }}">{{ $p->name }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div> 
                
                      <div class="form-group">
                        <label for="judul">Name:</label>
                        <input name="name" value="{{ $blok->name }}" type="text" class="form-control" placeholder="Masukkan Nama" id="judul">
                      </div>

                      <div class="form-group">
                        <label for="js">Jumlah Sawit:</label>
                        <input name="jumlah_sawit" value="{{ $blok->jumlah_sawit }}" type="text" class="form-control" placeholder="Masukkan Jumlah Sawit" id="js">
                      </div>

                      <div class="form-group">
                        <label for="tt">Tahun Tanam:</label>
                        <input name="tahun_tanam" value="{{ $blok->tahun_tanam }}" type="text" class="form-control" placeholder="Masukkan Tahun Tanam" id="tt">
                      </div>
                  
                       <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection