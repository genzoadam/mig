@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                
                <div class="card-header">
                    LAPORAN PRODUKSI
                    @role('admin')
                    | <a href="{{ route('reportShow.create', $ket->report_list_id) }}" class="btn btn-sm btn-outline-info">Add Report</a>
                    @endrole
                </div>
                

                <div class="card-body">

                    <div>
                        <p>Company : {{ $ket->company->name }}</p>
                        <p>Kebun   : {{ $ket->kebun->name }}</p>
                        <p>Periode : {{ $ket->periode }}</p>
                    </div>

                    <table class="table table-responsive table-bordered text-center">
                      <thead>
                        <tr>
                          <th rowspan="3" class="align-middle">Tahun Tanam</th>
                          <th rowspan="3" class="align-middle">Perusahaan</th>
                          <th rowspan="3" class="align-middle">Divisi</th>
                          <th rowspan="2" colspan="2" class="align-middle">LUAS TM(Ha)</th>
                          <th colspan="5" class="align-middle">TOTAL PRODUKSI(KG)</th>
                          <th colspan="3" class="align-middle">KG/HA</th>
                        </tr>
                        <tr>
                          <th colspan="2" class="align-middle">Bulan Ini</th>
                          <th colspan="2" class="align-middle">S.d. Bulan Ini</th>
                          <th rowspan="2" class="align-middle">Anggaran Tahunan</th>
                          <th class="align-middle">Bulan Ini</th>
                          <th class="align-middle">S.d. Bulan Ini</th>
                          <th rowspan="2" class="align-middle">Anggaran Tahunan Kg/Ha</th>
                        </tr>
                        <tr>
                          <th class="align-middle">Realisasi</th>
                          <th class="align-middle">Anggaran</th>
                          <th class="align-middle">Realisasi</th>
                          <th class="align-middle">Anggaran</th>
                          <th class="align-middle">Realisasi</th>
                          <th class="align-middle">Anggaran</th>
                          <th class="align-middle">KG/HA</th>
                          <th class="align-middle">KG/HA</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($reportShow->count() == 0)
                          <tr>
                            <td colspan="13">Tidak ada data</td>
                          </tr>
                        @else
                        @foreach($reportShow as $rpt)
                        <tr>
                          <td>{{ $rpt->tahun_tanam }}</td>
                          <td>{{ $rpt->company->name }}</td>
                          <td>{{ $rpt->divisi->name }}</td>
                          <td>{{ $rpt->realisasi_luastm }}</td>
                          <td>{{ $rpt->anggaran_luastm }}</td>
                          <td>{{ $rpt->realisasi_bi_produksi }}</td>
                          <td>{{ $rpt->anggaran_bi_produksi }}</td>
                          <td>{{ $rpt->realisasi_sdbi_produksi }}</td>
                          <td>{{ $rpt->anggaran_sdbi_produksi }}</td>
                          <td>{{ $rpt->anggaran_th_produksi }}</td>
                          <td>{{ $rpt->kgha_bi }}</td>
                          <td>{{ $rpt->kgha_sdbi }}</td>
                          <td>{{ $rpt->anggaran_th_kgha }}</td>
                        </tr>
                        
                        <tr>
                          <th colspan="3" class="align-middle">Sub Total</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('realisasi_luastm') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('anggaran_luastm') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('realisasi_bi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('anggaran_bi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('realisasi_sdbi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('anggaran_sdbi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('anggaran_th_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('kgha_bi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('kgha_sdbi') }}</th>
                          <th class="align-middle">{{ $reportShow->where('tahun_tanam', $rpt->tahun_tanam)->sum('anggaran_th_kgha') }}</th>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                      
                      <thead>
                        <tr>
                          <th colspan="3" class="align-middle">Grand Total</th>
                          <th class="align-middle">{{ $reportShow->sum('realisasi_luastm') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('anggaran_luastm') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('realisasi_bi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('anggaran_bi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('realisasi_sdbi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('anggaran_sdbi_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('anggaran_th_produksi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('kgha_bi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('kgha_sdbi') }}</th>
                          <th class="align-middle">{{ $reportShow->sum('anggaran_th_kgha') }}</th>
                        </tr>
                      </thead>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection