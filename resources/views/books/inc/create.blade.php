
<form class="form form--create" action="/books/create" method="POST">
    <h3 class="header header--title">Add a new book...!</h3>
    @csrf
    <div class="form-group">
        <label class="form-label" for="author">Book Author</label>
        <select class="form-control" name="author" id="author">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->full_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" id="title" name="title" type="text">
    </div>
    <div class="form-group form-group--submit">
        <input class="btn btn--form-submit" type="submit" value="add">
    </div>
</form>
