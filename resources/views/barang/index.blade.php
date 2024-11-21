@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data {{ $title }}</h5>

                    <form id="filterForm">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="start_date">Tanggal Mulai:</label>
                                <input type="date" id="start_date" name="start_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="end_date">Tanggal Akhir:</label>
                                <input type="date" id="end_date" name="end_date" class="form-control">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" id="applyFilter" class="btn btn-primary">Terapkan Filter</button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-sm datatable">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Unit</th>
                                    <th>Harga Awal</th>
                                    <th>Harga Terbaru</th>
                                    <th>Perbandingan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->hargaOldest->first()->price }}</td>
                                        <td>{{ $item->hargaLatest->first()->price }}</td>
                                        <td>
                                            @php
                                                $hargaAwal = $item->hargaOldest->first()->price;
                                                $hargaTerbaru = $item->hargaLatest->first()->price;
                                                $selisih = $hargaTerbaru - $hargaAwal;
                                                $persentase = ($selisih / $hargaAwal) * 100;
                                                $persentase = number_format($persentase, 2);
                                                if ($selisih > 0) {
                                                    echo "<span class='text-success'>+" . $persentase . '%</span>';
                                                } elseif ($selisih < 0) {
                                                    echo "<span class='text-danger'>" . $persentase . '%</span>';
                                                } else {
                                                    echo '<span>0%</span>';
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#applyFilter').on('click', function() {
                let startDate = $('#start_date').val();
                let endDate = $('#end_date').val();

                $.ajax({
                    url: "{{ route('barang.filter') }}",
                    type: "GET",
                    data: {
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        let tbody = '';
                        response.forEach(item => {
                            let hargaAwal = item.harga[0]?.price || 'N/A';
                            let hargaTerbaru = item.harga[item.harga.length - 1]
                                ?.price || 'N/A';
                            let selisih = hargaTerbaru - hargaAwal;
                            let persentase = hargaAwal > 0 ? ((selisih / hargaAwal) *
                                100).toFixed(2) : 0;
                            let warna = selisih > 0 ? 'text-success' : selisih < 0 ?
                                'text-danger' : '';

                            tbody += `
                            <tr>
                                <td>${item.name}</td>
                                <td>${item.unit}</td>
                                <td>${hargaAwal}</td>
                                <td>${hargaTerbaru}</td>
                                <td><span class="${warna}">${persentase}%</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                            </tr>
                        `;
                        });

                        $('table.datatable tbody').html(tbody);
                    },
                    error: function(error) {
                        console.log("Error:", error);
                    }
                });
            });
        });
    </script>
@endpush
