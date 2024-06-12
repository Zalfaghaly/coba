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
                    <a href="{{ route('databayar.exindex') }}" class="btn btn-primary">
                        <i class="bi bi-check"></i> Cek Expired Trasaksi
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('databayar.seindex') }}" class="btn btn-primary">
                        <i class="bi bi-check"></i> Cek Sukses Trasaksi
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="listpembayaranTable">
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
                    <th>Verifikasi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

