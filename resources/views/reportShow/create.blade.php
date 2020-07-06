@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Report</div>

                <div class="card-body">

                    <form action="{{ route('reportShow.store') }}" method="post">
                    {{ csrf_field() }}

                      <input type="hidden" name="report_list_id" value="{{ $report->report_list_id }}">
                      <input type="hidden" name="company_id" value="{{ $report->company_id }}">
                      <input type="hidden" name="kebun_id" value="{{ $report->kebun_id }}">
                      <input type="hidden" name="periode" value="{{ $report->periode }}">

                      <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="periode">Periode:</label>
                        <input value="{{ $report->periode }}" name="periode" type="month" class="form-control" id="periode" disabled>
                      </div>

                    </div>
                      
                      <div class="form-row">

                       <div class="form-group col-md-5 ml-5">
                        <label for="company_id">Company:</label>
                        <input value="{{ $report->company->name }}" name="company_id" type="text" class="form-control" id="company_id" disabled>
                      </div>

                      <div class="form-group col-md-5 ml-5">
                        <label for="kebun_id">Kebun:</label>
                        <input value="{{ $report->kebun->name }}" name="kebun_id" type="text" class="form-control" id="kebun_id" disabled>
                      </div>

                    </div>

                    <div class="form-row">

                       <div class="form-group col-md-5 ml-5">
                        <label for="divisi_id">Divisi:</label>
                        <select name="divisi_id" class="form-control" placeholder="Masukkan Divisi" id="divisi_id" required>
                          <option value="" selected disabled>--Pilih Divisi--</option>
                          @if($divisi->count() == 0)
                          <option>Tidak ada divisi</option>
                          @else
                          @foreach($divisi as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                          @endif
                          
                        </select>
                      </div> 

                      <div class="form-group col-md-5 ml-5">
                        <label for="blok_id">Blok:</label>
                        <select name="blok_id" class="form-control" placeholder="Masukkan Blok" id="blok_id" required>
                          <option value="" selected disabled>--Pilih Blok--</option>
                                                    
                        </select>
                      </div> 

                    </div>

                    <div class="form-row">     

                      <div class="form-group col-md-5 ml-5">
                        <label for="realisasi_luastm">Realisasi Luas TM:</label>
                        <input name="realisasi_luastm" type="text" class="form-control" id="realisasi_luastm">
                      </div>

                      <div class="form-group col-md-5 ml-5">
                        <label for="anggaran_luastm">Anggaran Luas TM:</label>
                        <input name="anggaran_luastm" type="text" class="form-control" id="anggaran_luastm">
                      </div>

                    </div>
                    <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="realisasi_bi_produksi">Realisasi Produksi Bulan Ini:</label>
                        <input name="realisasi_bi_produksi" type="text" class="form-control" id="realisasi_bi_produksi">
                      </div>

                      <div class="form-group col-md-5 ml-5">
                        <label for="anggaran_bi_produksi">Anggaran Produksi Bln Ini:</label>
                        <input name="anggaran_bi_produksi" type="text" class="form-control" id="anggaran_bi_produksi">
                      </div>

                    </div>
                    <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="realisasi_sdbi_produksi">Realisasi Produksi Sd Bln Ini:</label>
                        <input name="realisasi_sdbi_produksi" type="text" class="form-control" id="realisasi_sdbi_produksi">
                      </div>

                      <div class="form-group col-md-5 ml-5">
                        <label for="anggaran_sdbi_produksi">Anggaran Produksi sd bln Ini:</label>
                        <input name="anggaran_sdbi_produksi" type="text" class="form-control" id="anggaran_sdbi_produksi">
                      </div>

                    </div>
                    <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="anggaran_th_produksi">Anggaran Produksi Tahunan:</label>
                        <input name="anggaran_th_produksi" type="text" class="form-control" id="anggaran_th_produksi">
                      </div>

                      <div class="form-group col-md-5 ml-5">
                        <label for="kgha_bi">kg/ha bln Ini:</label>
                        <input name="kgha_bi" type="text" class="form-control" id="kgha_bi">
                      </div>

                    </div>
                    <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="kgha_sdbi">kg/ha sd bln Ini:</label>
                        <input name="kgha_sdbi" type="text" class="form-control" id="kgha_sdbi">
                      </div>

                      <div class="form-group col-md-5 ml-5">
                        <label for="anggaran_th_kgha">anggaran tahunan kg/ha:</label>
                        <input name="anggaran_th_kgha" type="text" class="form-control" id="anggaran_th_kgha">
                      </div>

                    </div>
                    
                    <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                      </div>
                    </div>
                   
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function () {
    $('#divisi_id').on('change', function () {
        axios.post('{{ route('getBlok') }}', {id: $(this).val()})
            .then(function (response) {
                $('#blok_id').empty();

                $.each(response.data, function (id, name) {
                    $('#blok_id').append(new Option(name, id))
                })
            });
    });
});
</script>

@endsection



    