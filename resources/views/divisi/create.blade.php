@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Divisi</div>

                <div class="card-body">

                    <form action="{{ route('divisi.store') }}" method="post">
                    {{ csrf_field() }}

                      <input type="hidden" name="company_id" value="{{ $companyId }}">

                      <div class="form-group">
                        <label for="user">Kebun:</label>
                        <select name="kebun_id" class="form-control" placeholder="Masukkan Kebun" id="user" required>
                          <option value="" selected disabled>--Pilih Kebun--</option>
                          @if($kebun->count() == 0)
                          <option>Tidak ada kebun</option>
                          @else
                          @foreach($kebun as $p)
                          <option value="{{ $p->id }}">{{ $p->name }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>             

                      <div class="form-group">
                        <label for="judul">Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukkan Nama Divisi" id="judul">
                      </div>
                  
                      <button type="submit" class="btn btn-sm btn-primary">Add</button>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection