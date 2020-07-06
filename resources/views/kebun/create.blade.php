@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Kebun</div>

                <div class="card-body">

                    <form action="{{ route('kebun.store') }}" method="post">
                    {{ csrf_field() }}

                      <input type="hidden" name="company_id" value="{{ $companyId }}">               

                      <div class="form-group">
                        <label for="judul">Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukkan Nama Kebun" id="judul" required>
                      </div>
                  
                      <button type="submit" class="btn btn-sm btn-primary">Add</button>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection