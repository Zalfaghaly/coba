<div class="d-flex">
    <a href="{{ route('databayar.edit',[$listpembayaran->id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-file-earmark-check-fill"></i></a>

    <div>
        <form action="{{ route('databayar.destroy', [$listpembayaran->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete" data-name="{{ $listpembayaran->nama_penerima.' '.$listpembayaran->jumlah }}"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
