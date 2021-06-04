<form class="form form--search" action="/search" method="GET">
    <div class="form-group">
        <label class="form-label" for="search">Search</label>
        <input class="form-control" type="text" name="search" id="search">
    </div>
    <div class="form-group">
        <label class="form-label" for="search_type">Search by</label>
        <select class="form-control" name="search_type" id="search_type">
            @foreach ($search_params as $value => $param)
                <option value="{{ $value }}">{{ $param }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group form-group--submit">
        <input class="btn btn--form-submit" type="submit" value="search">
    </div>
</form>
