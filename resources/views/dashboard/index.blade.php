@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Jumlah Barang</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-box2"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{$countBarang ?? '0'}}</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
