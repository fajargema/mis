@extends('layouts.admin')

@section('title', 'LOB Klaim')

@section('content')
{{-- breadcrumb --}}
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>LOB Klaim</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data LOB Klaim
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>LOB</th>
                            <th>Penyebab Klaim</th>
                            <th>Jumlah Nasabah</th>
                            <th>Beban Klaim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        @foreach ($item['reason'] as $sub)
                        <tr>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $sub['title'] }}</td>
                            <td>{{ $sub['count'] }}</td>
                            <td>{{ rupiah($sub['beban']) }}</td>
                        </tr>
                        @endforeach
                        <tr style="font-weight: bold; background: #c0f1f8">
                            <td colspan="2">Subtotal {{ $item['title'] }}</td>
                            <td>{{ $item['subtotal_nasabah'] }}</td>
                            <td>{{ rupiah($item['subtotal_beban']) }}</td>
                        </tr>
                        @endforeach
                        <tr style="font-weight: bold; background: #eddafc;">
                            <td colspan="2">Total {{ $item['title'] }}</td>
                            <td>{{ $total_nasabah }}</td>
                            <td>{{ rupiah($total_beban) }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</section>


@endsection
