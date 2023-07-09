<form action="{{ route('admin.destroy', ['id' => $model->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <a href="{{ route('admin.edit', $model->id) }}" class="btn btn-info">Edit</a>
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
