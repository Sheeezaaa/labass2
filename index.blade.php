@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif
<a href="/create">Add User</a>

<form action="/search" method="GET">
    <input type="text" name="search" placeholder="Search by Email">
    <button type="submit">Search</button>
</form>

<table border="1">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>CNIC</th>
    <th>Phone</th>
    <th>Comments</th>
    <th>file</th>
    <th>Actions</th>
</tr>

@foreach($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->cnic }}</td>
<td>{{ $user->telephone }}</td>
<td>{{ $user->comments }}</td>
<td>
    @if($user->file)
        <img src="uploads/{{ $user->file }}" width="50">
    @endif
</td>
<td>
    <a href="/edit/{{ $user->id }}">Edit</a>
    <a href="/delete/{{ $user->id }}" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
@endforeach
</table>