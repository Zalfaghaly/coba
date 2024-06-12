<div class="d-flex">
    <a href="{{ route('product.edit', [$listproduct->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i
            class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('product.destroy', [$listproduct->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete" data-name="{{ $listproduct->namaproduk.' '.$listproduct->kodeproduk }}"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
