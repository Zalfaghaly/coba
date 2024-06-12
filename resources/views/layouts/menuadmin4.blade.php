<div class="d-flex">
    <div>
        <form action="{{ route('databayar.exdestroy', [$listpembayaran->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
