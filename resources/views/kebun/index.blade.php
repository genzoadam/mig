@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                  @role('admin')
                    All Kebun ( {{ $kebun->count() }} )
                  @else
                    ( {{ $kebun->count() }} ) Kebun in {{ $user->company->name }}
                  
                  | <a href="{{ route('kebun.create') }}" class="btn btn-sm btn-outline-info">Add Kebun</a>
                  @endrole
                </div>
                

                <div class="card-body">

                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Company</th>
                        <th scope="col">Name</th>
                        <th scope="col">Division</th>
                        @role('company')
                        <th scope="col">Opsi</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                      @if($kebun->count() == 0)
                        <tr><th>Tidak ada Kebun</th></tr>
                      @else
                      @foreach($kebun as $no => $kbn)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $kbn->company->name }}</td>
                        <td>{{ $kbn->name }}</td>
                        <td>{{ $kbn->divisi_id }}</td>
                        @role('company')
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="{{ route('kebun.edit', $kbn->id) }}">Edit</a>
                            |
                            <form action="{{ route('kebun.destroy', $kbn->id) }}" method="POST">
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