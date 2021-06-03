<form action="/search" method="GET">
    <label for="search">Search</label>
    <input type="text" name="search" id="search">
    <label for="search_type">Search by</label>
    <select name="search_type" id="search_type">
        @foreach ($search_params as $value => $param)
            <option value="{{ $value }}">{{ $param }}</option>
        @endforeach
    </select>
    <input type="submit" value="submit">
</form>
