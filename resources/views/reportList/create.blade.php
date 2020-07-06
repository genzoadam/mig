@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add Report</div>

                <div class="card-body">

                    <form action="{{ route('reportList.store') }}" method="post">
                    {{ csrf_field() }}

                      <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="periode">Periode:</label>
                        <input name="periode" type="month" class="form-control" id="periode">
                      </div>

                    </div>
                      
                      <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <label for="company_id">Company:</label>
                        <select name="company_id" class="form-control" placeholder="Masukkan Company" id="company_id" required>
                          <option value="" selected disabled>--Pilih Company--</option>
                          @if($company->count() == 0)
                          <option>Tidak ada company</option>
                          @else
                          @foreach($company as $key => $value)
                          <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                          @endif
                          
                        </select>
                      </div>  

                      <div class="form-group col-md-5 ml-5">
                        <label for="kebun_id">Kebun:</label>
                        <select name="kebun_id" class="form-control" placeholder="Masukkan Kebun" id="kebun_id" required>
                          <option value="" selected disabled>--Pilih Kebun--</option>
                                                    
                        </select>
                      </div> 

                    </div>
                    
                    <div class="form-row">

                      <div class="form-group col-md-5 ml-5">
                        <button type="submit" class="btn btn-sm btn-primary">Lanjut</button>
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
    $('#company_id').on('change', function () {
        axios.post('{{ route('getKebun') }}', {id: $(this).val()})
            .then(function (response) {
                $('#kebun_id').empty();

                $.each(response.data, function (id, name) {
                    $('#kebun_id').append(new Option(name, id))
                })
            });
    });
});
</script>
@endsection



    