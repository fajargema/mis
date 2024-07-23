@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
    {{-- breadcrumb --}}
    <div class="page-title mb-5">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</div>

@endsection
