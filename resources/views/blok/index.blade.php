@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                  @role('admin')
                    All Blok ( {{ $blok->count() }} )
                  @else
                    ( {{ $blok->count() }} ) Blok in {{ $user->company->name }}
                  
                  | <a href="{{ route('blok.create') }}" class="btn btn-sm btn-outline-info">Add Blok</a>
                  @endrole
                </div>

                <div class="card-body">

                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Company</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Name</th>
                        <th scope="col">Jumlah Pohon</th>
                        <th scope="col">Tahun Tanam</th>
                        @role('company')
                        <th scope="col">Opsi</th>
                        @endrole
                      </tr>
                    </thead>
                    <tbody>
                      @if($blok->count() == 0)
                        <tr><th>Tidak ada Company</th></tr>
                      @else
                      @foreach($blok as $no => $blk)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $blk->company->name }}</td>
                        <td>{{ $blk->divisi->name }}</td>
                        <td>{{ $blk->name }}</td>
                        <td>{{ $blk->jumlah_sawit }}</td>
                        <td>{{ $blk->tahun_tanam }}</td>
                        @role('company')
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="{{ route('blok.edit', $blk->id) }}">Edit</a>
                            |
                            <form action="{{ route('blok.destroy', $blk->id) }}" method="POST">
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