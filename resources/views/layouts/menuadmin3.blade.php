<div class="d-flex">
        <form action="{{ route('users.destroy', [$listuser->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
        </form>
</div>
