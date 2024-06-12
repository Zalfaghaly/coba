<div class="d-flex">
    <a href="route('databayar.edit',[$listpembayaran->id]) " class="btn btn-outline-dark btn-sm me-2"><i
            class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('databayar.destroy', [$listpembayaran->id]) }} " method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
        </form>
    </div>
</div>
