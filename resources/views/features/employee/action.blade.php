<form action="{{ route('employee.destroy', ['id' => $model->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <a href="{{ route('employee.edit', $model->id) }}" class="btn btn-info">Edit</a>
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
