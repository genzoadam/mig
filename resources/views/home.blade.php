@extends('layouts.app')

@section('content')
<div class="container">
    @role('company')
    <div class="text-center mb-3">COMPANY : {{ $company->name }}</div>
    @else
    <div class="text-center mb-3">DASHBOARD</div>
    @endrole
    <div class="row justify-content-center">

        @role('admin')
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">COMPANY</div>

                <div class="card-body">
                    {{ $company->count() }}
                </div>
            </div>

        </div>
        @endrole
        <div class="col-md-4 mb-3">

            <div class="card">
                <div class="card-header">KEBUN</div>

                <div class="card-body">
                    {{ $kebun->count() }}
                </div>
            </div>

        </div>
        <div class="col-md-4 mb-3">

            <div class="card">
                <div class="card-header">DIVISI</div>

                <div class="card-body">
                    {{ $divisi->count() }}
                </div>
            </div>

        </div>
        <div class="col-md-4 mb-3">

            <div class="card">
                <div class="card-header">BLOK</div>

                <div class="card-body">
                    {{ $blok->count() }}
                </div>
            </div>

        </div>
        @role('admin')
        <div class="col-md-4 mb-3">

            <div class="card">
                <div class="card-header">LAPORAN</div>

                <div class="card-body">
                    {{ $report->count() }}
                </div>
            </div>

        </div>
        @endrole

    </div>
</div>
@endsection
