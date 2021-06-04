<form class="sort-form" action="/search" method="GET">
    <button class="sort-asc" type="submit" value="test">
        <input type="hidden" name="orderby" value="{{ $orderby }}" />
        <input type="hidden" name="direction" value="{{ $direction }}" />
        @if ($direction == 'asc')
            <i class="fas fa-caret-up"></i>
        @else
            <i class="fas fa-caret-down"></i>
        @endif
    </button>
</form>
