@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Blok</div>

                <div class="card-body">

                    <form action="{{ route('blok.store') }}" method="post">
                    {{ csrf_field() }}

                      <input type="hidden" name="company_id" value="{{ $companyId }}">

                      <div class="form-group">
                        <label for="user">Divisi:</label>
                        <select name="divisi_id" class="form-control" placeholder="Masukkan Divisi" id="user" required>
                          <option value="" selected disabled>--Pilih Divisi--</option>
                          @if($divisi->count() == 0)
                          <option>Tidak ada Divisi</option>
                          @else
                          @foreach($divisi as $p)
                          <option value="{{ $p->id }}">{{ $p->name }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>             

                      <div class="form-group">
                        <label for="judul">Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukkan Nama Blok" id="judul">
                      </div>

                      <div class="form-group">
                        <label for="sawit">Jumlah Sawit:</label>
                        <input name="jumlah_sawit" type="text" class="form-control" placeholder="Masukkan Jumlah Sawit" id="sawit">
                      </div>

                      <div class="form-group">
                        <label for="tahun">Tahun Tanam:</label>
                        <input name="tahun_tanam" type="text" class="form-control" placeholder="Masukkan Tahun Tanam" id="tahun">
                      </div>
                  
                      <button type="submit" class="btn btn-sm btn-primary">Add</button>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection