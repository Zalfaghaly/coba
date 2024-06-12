@extends('layouts.admin_app')
@section('admin_content')
<div class="container mt-4">
    <div class="row mb-0">
        <div class="col-lg-9 col-xl-6">
            <h4 class="mb-3">{{ $pageTitle }}</h4>
        </div>
        <div class="col-lg-3 col-xl-6">
            <ul class="list-inline mb-0 float-end">
                <li class="list-inline-item">
                    <a href="{{ route('databayar.exportEcel') }}" class="btn btn-outline-success">
                        <i class="bi bi-download me-1"></i> to Excel
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('databayar.exportPdf') }}" class="btn btn-outline-danger">
                        <i class="bi bi-download me-1"></i> to PDF
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="selist">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No.</th>
                    <th>Nama penerima</th>
                    <th>Alamat</th>
                    <th>No_hp</th>
                    <th>Jumlah</th>
                    <th>Biaya</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Code</th>
                    <th>Nama Pemesan</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script type="module">
    $(document).ready(function() {
            $("#selist").DataTable({
                serverSide: true,
                processing: true,
                ajax: "/getpembayaranse",
                columns: [
                    { data: "id", name: "id", visible: false },
                    { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                    { data: "nama_penerima", name: "nama_penerima" },
                    { data: "alamat", name: "alamat" },
                    { data: "no_hp", name: "no_hp" },
                    { data: "jumlah", name: "jumlah" },
                    { data: "biaya", name: "biaya" },
                    { data: "metode.metod", name: "metode.metod" },
                    { data: "statuse.proses", name: "statuse.proses" },
                    { data: "product.kodeproduk", name: "product.kodeproduk" },
                    { data: "user.name", name: "user.name" },
                    { data: "menuadmin4", name: "menuadmin4", orderable: false, searchable: false },
                ],
                order: [[0, "desc"]],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
                ],
            });
        });
</script>
@endpush
