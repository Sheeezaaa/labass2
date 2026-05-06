<form action="/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name" value="{{ $user->name }}"><br>
    Email: <input type="email" name="email" value="{{ $user->email }}"><br>
    CNIC: <input type="text" name="cnic" value="{{ $user->cnic }}"><br>
    Phone: <input type="text" name="telephone" value="{{ $user->telephone }}"><br>
    Comments: <textarea name="comments">{{ $user->comments }}</textarea><br>
    Photo: <input type="file" name="file"><br>
    <button type="submit">Update</button>
</form>