@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header">
                    
                    All Report ( {{ $reportList->count() }} )
                    @role('admin')
                    | <a href="{{ route('reportList.create') }}" class="btn btn-sm btn-outline-info">Add Report</a>
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
                                    <th scope="col">Periode</th>
                                    <th>Aksi</th>
                                    @role('admin')
                                    <th scope="col">Opsi</th>
                                    @endrole
                                    
                                    </tr>
                              </thead>
                              <tbody>
                              @if($reportList->count() == 0)
                                <tr><th>Tidak ada reportList</th></tr>
                              @else
                              @foreach($reportList as $no => $rpt)
                                <tr>
                                  <th scope="row">{{ ++$no }}</th>
                                    <td>{{ $rpt->company->name }}</td>
                                    <td>{{ $rpt->kebun->name }}</td>
                                    <td>{{ $rpt->periode }}</td>
                                    <td>
                                      <a class="btn btn-sm btn-outline-success" href="{{ route('reportShow.index',$rpt->id) }}" target="_blank">Lihat</a>
                                    </td>
                                    @role('admin')
                                    <td>
                                      <a class="btn btn-sm btn-outline-danger" href="{{ route('reportList.destroy',$rpt->id) }}">Hapus</a>
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
    </div>
</div>
@endsection