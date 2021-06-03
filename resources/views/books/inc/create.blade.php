
<form action="/books/create" method="POST">
    @csrf
    <label for="author">Book Author</label>
    <select name="author" id="author">
        @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->full_name }}</option>
        @endforeach
    </select>
    <label for="title">Title</label>
    <input id="title" name="title" type="text">
    <p><input type="submit" value="submit"></p>
</form>
