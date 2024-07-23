@extends('layouts.admin')

@section('title', 'Edit Klaim')

@section('content')
{{-- breadcrumb --}}
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Klaim</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.klaim.index') }}">Klaim</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Klaim
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
            <form class="form form-vertical" action="{{ route('dashboard.klaim.update', $data->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Nasabah</label>
                                <input type="text" class="form-control" name="client" placeholder="Nama Nasabah"
                                    value="{{ old('client') ?? $data->client }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>LOB</label>
                                <select class="form-select" name="type">
                                    <option>Pilih LOB</option>
                                    <option value="KBG dan Suretyship" class="form" {{
                                        (old('type')=='KBG dan Suretyship' || $data->type == 'KBG dan Suretyship') ?
                                        'selected' : '' }}>KBG dan Suretyship
                                    </option>
                                    <option value="Konsumtif" {{ (old('type')=='Konsumtif' || $data->type ==
                                        'Konsumtif') ? 'selected' : '' }}>Konsumtif</option>
                                    <option value="KUR" {{ (old('type')=='KUR' || $data->type == 'KUR') ?
                                        'selected' : '' }}>KUR</option>
                                    <option value="PEN" {{ (old('type')=='PEN' || $data->type == 'PEN') ?
                                        'selected' : '' }}>PEN</option>
                                    <option value="Produktif" {{ (old('type')=='Produktif' || $data->type ==
                                        'Produktif') ?
                                        'selected' : '' }}>Produktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Penyebab Klaim</label>
                                <select class="form-select" name="reason">
                                    <option>Pilih LOB</option>
                                    <option value="Macet" {{ (old('reason')=='Macet' || $data->reason == 'Macet') ?
                                        'selected' : '' }}>Macet</option>
                                    <option value="Kebakaran" {{ (old('reason')=='Kebakaran' || $data->reason ==
                                        'Kebakaran') ?
                                        'selected' : '' }}>Kebakaran</option>
                                    <option value="Meninggal" {{ (old('reason')=='Meninggal' || $data->reason ==
                                        'Meninggal') ?
                                        'selected' : '' }}>Meninggal</option>
                                    <option value="PHK" {{ (old('reason')=='PHK' || $data->reason == 'PHK') ?
                                        'selected' : '' }}>PHK</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Beban Klaim</label>
                                <input type="number" class="form-control" name="burden" placeholder="Beban Klaim"
                                    value="{{ old('burden') ?? $data->burden }}">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
