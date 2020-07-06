@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    All Company ( {{ $company->count() }} )
                    | <a href="{{ route('company.create') }}" class="btn btn-sm btn-outline-info">Add Comp</a>
                </div>

                <div class="card-body">

                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Kebun</th>
                        <th scope="col">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($company->count() == 0)
                        <tr><th>Tidak ada Company</th></tr>
                      @else
                      @foreach($company as $no => $comp)
                      <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $comp->name }}</td>
                        <td>{{ $comp->user->name }}</td>
                        <td>{{ $comp->kebun_id }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-warning" href="{{ route('company.edit', $comp->id) }}">Edit</a>
                            |
                            <form action="{{ route('company.destroy', $comp->id) }}" method="POST">
                               @method('DELETE')
                               @csrf
                               <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
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