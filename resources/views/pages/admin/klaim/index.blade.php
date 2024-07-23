@extends('layouts.admin')

@section('title', 'Klaim')

@section('content')
{{-- breadcrumb --}}
<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Klaim</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Klaim
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('dashboard.klaim.create') }}" class="btn icon icon-left btn-primary"><i
                    data-feather="plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            @if ($data->isEmpty())
            <p class="text-center">Data Tidak Ditemukan</p>
            @else
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Nasabah</th>
                            <th>LOB</th>
                            <th>Penyebab Klaim</th>
                            <th>Beban Klaim</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->client }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->reason }}</td>
                            <td>{{ rupiah($item->burden) }}</td>
                            <td>{{ Carbon\Carbon::parse($item['date'])->isoFormat('dddd, D MMMM Y') }}</td>
                            <td>
                                <div class="d-flex column-gap-3">
                                    <a href="{{ route('dashboard.klaim.edit', $item->id) }}"
                                        class="btn btn-primary shadow btn-xs sharp" data-toggle="tooltip" title='Edit'>
                                        <i data-feather="edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('dashboard.klaim.destroy', $item->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp show_confirm"
                                            data-toggle="tooltip" title='Hapus'>
                                            <i data-feather="trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

        </div>
    </div>

</section>

{{-- Delete --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    var $ = jQuery;
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>

@endsection

@push('style')
<link rel="stylesheet"
    href="{{ asset('assets/admin/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable-jquery.css') }}">
@endpush

@push('script')
<script src="{{ asset('assets/admin/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/admin/static/js/pages/datatables.js') }}"></script>
@endpush
