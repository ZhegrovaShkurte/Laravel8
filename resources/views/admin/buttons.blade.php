<div class="btn-group">
    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
    <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-sm">Delete</a>
</div>