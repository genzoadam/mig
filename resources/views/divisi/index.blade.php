@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                  @role('admin')
                    All Divisi ( {{ $divisi->count() }} )
                  @else
                    ( {{ $divisi->count() }} ) Divisi in {{ $user->company->name }}
                  
                  | <a href="{{ route('divisi.create') }}" class="btn btn-sm btn-outline-info">Add Divisi</a>
                  @endrole
                </div>

                <div class="card-body">

                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Company</th>
                        <th scope="col">Kebun</th>
                        <th scope="col">Name</th>
                        <th scope="col">Blok</th>
                        @role('company')
                        <th scope="col">Opsi</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                      @if($divisi->count() == 0)
                        <tr><th>Tidak ada Company</th></tr>
                      @else
                      @foreach($divisi as $no => $dvs)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $dvs->company->name }}</td>
                        <td>{{ $dvs->kebun->name }}</td>
                        <td>{{ $dvs->name }}</td>
                        <td>{{ $dvs->blok_id }}</td>
                        @role('company')
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="{{ route('divisi.edit', $dvs->id) }}">Edit</a>
                            |
                            <form action="{{ route('divisi.destroy', $dvs->id) }}" method="POST">
                               @method('DELETE')
                               @csrf
                               <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                        @endrole
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                </table>
            </div> <!-- table end -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection