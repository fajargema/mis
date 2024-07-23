@extends('layouts.admin')

@section('title', 'Tambah Klaim')

@section('content')
{{-- breadcrumb --}}
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Klaim</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.klaim.index') }}">Klaim</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Klaim
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Form</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('dashboard.klaim.store') }}" method="POST">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" name="client" placeholder="Nama Nasabah">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="type">LOB</label>
                                <select class="form-select" name="type">
                                    <option value="KBG dan Suretyship">KBG dan Suretyship</option>
                                    <option value="Konsumtif">Konsumtif</option>
                                    <option value="KUR">KUR</option>
                                    <option value="PEN">PEN</option>
                                    <option value="Produktif">Produktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="type">Penyebab Klaim</label>
                                <select class="form-select" name="reason">
                                    <option value="Macet">Macet</option>
                                    <option value="Kebakaran">Kebakaran</option>
                                    <option value="Meninggal">Meninggal</option>
                                    <option value="PHK">PHK</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Beban Klaim</label>
                                <input type="number" class="form-control" name="burden" placeholder="Beban Klaim">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tanggal Klaim</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
