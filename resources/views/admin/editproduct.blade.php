@extends('layouts.admin_app')
@section('admin_content')
<div class="container-md d-flex justify-content-center mt-3">
    <div class="border border-4 border-black p-4 rounded shadow">
        <div class="d-flex justify-content-center ">
            <div class="me-4 d-flex align-items-center" style="min-width: 500px; min-height: 400px;">
                <img id="frame" src="{{ Vite::asset('public/storage/files/img/'.$Products->encrypted_imagename) }}" class="img-fluid rounded" style="max-width: 500px; max-height: 500px;" />
            </div>
            <div class="mt-4">
                <form action="{{ route('product.update',[$Products->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <p class="h2 fw-bold text-center mb-3">Edit Product</p>
                    <div class="justify-content-center d-flex">
                        <div class="me-4">
                            <div class="mb-3">
                                <label for="Nama_Product" class="form-label">Nama Product</label>
                                <input type="text" class="form-control" id="Nama_Product" name="Nama_Product"
                                    value="{{$Products->namaproduk}}">
                                @error('Nama_Product')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="Harga" name="Harga"
                                    value="{{$Products->harga}}">
                                @error('Harga')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="Code" class="form-label">Kode Product</label>
                                <input type="text" class="form-control" id="Code" name="Code" value="{{$Products->kodeproduk}}">
                                @error('Code')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="Stock" name="Stock"
                                    value="{{$Products->stock}}">
                                @error('Stock')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control fw-medium text-decoration-none bg-white "
                            id="exampleFormControlTextarea1" rows="4" style="width:450px;
                            resize:none;" id="Deskripsi" name="Deskripsi">{{$Products->deskripsi}}</textarea>
                        @error('Deskripsi')
                        <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <label for="Image" class="form-label">{{$Products->original_imagename}}</label>
                    <input class="form-control" type="file" id="formFile" onchange="preview()" name="imgproduct">
                    <div class="d-flex justify-content-center mb-3 mt-4">
                        <button type="submit" class="btn btn-primary px-5">Edit data Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
</script>
@endsection
