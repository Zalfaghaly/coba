@extends('layouts.admin_app')
@section('admin_content')
<div class="container-md d-flex justify-content-center mt-5">
    <div class="border border-4 border-black p-5 rounded shadow">
        <div class="d-flex justify-content-center ">
            <img class="img-fluid me-4"
                src="{{ Vite::asset('public/storage/files/bukti/'.$bayar->encrypted_buktiimage) }}" alt=""
                style="max-width: 500px; max-height: 500px;">
            <div class="mt-4">
                <form action="{{ route('databayar.update', [$bayar->id] ) }}" method="POST">
                    @csrf
                    @method('put')
                    <p class="h2 fw-bold text-center mb-5">Verifikasi {{$bayar->product->code_product}}</p>
                    <div class="justify-content-center d-flex">
                        <div class="me-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" id="alamat" aria-describedby="emailHelp"
                                    required name="alamat" value="{{$bayar->jumlah}}" disabled>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Metode</label>
                                <input type="text" class="form-control" id="no" required name="no"
                                    value="{{$bayar->metode->metod}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="nama_penerima" value="{{$bayar->user->name}}" required name="nama_penerima" disabled>
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" id="nama_penerima"
                                    value="{{$bayar->nama_penerima}}" required name="nama_penerima" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jumlah Pembayaran</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required
                                    value="Rp.{{$bayar->biaya}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Harga Product</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required value="Rp.{{$bayar->product->harga}}" disabled>
                            </div>
                        </div>
                    </div>
                    <select class="form-select mb-0" aria-label="Default select example" name="status" id="status"
                        required>
                        @php
                        $selected = "";
                        if ($errors->any())
                        $selected = old('status');
                        else
                        $selected = $bayar->statuse_id;
                        @endphp
                        @foreach ($status as $statuse)
                        <option value="{{ $statuse->id }}" {{ old('status')==$statuse-> id ? 'selected' : '' }}>{{
                            $statuse->proses }}</option>
                        @endforeach
                    </select>
                    @error('metode')
                    <div class="text-danger"><small>{{ $message }}</small></div>
                    @enderror
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-primary px-5">Verifikasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
