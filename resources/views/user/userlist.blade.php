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
                    <a href="{{ route('user.exportEcel') }}" class="btn btn-outline-success">
                        <i class="bi bi-download me-1"></i> to Excel
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('user.exportPdf') }}" class="btn btn-outline-danger">
                        <i class="bi bi-download me-1"></i> to PDF
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="listuser">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
