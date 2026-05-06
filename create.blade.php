@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/store" method="POST" enctype="multipart/form-data">
    @csrf
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    CNIC: <input type="text" name="cnic"><br>
    Phone: <input type="text" name="telephone"><br>
    Comments: <textarea name="comments"></textarea><br>
    <label>File:</label>

<input type="file" name="photo" id="fileInput" style="display:none;">

<button type="button" onclick="document.getElementById('fileInput').click()">
    Choose File
</button><br>
    
    <button type="submit">Save</button>
</form>