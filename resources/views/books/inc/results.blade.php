@if (count($books) > 0)

    <table class="table table--results">
        <tr class="table__row">
            <th class="table__header">
                Title
                @include('books.inc.sort', ['orderby' => 'title', 'direction' => 'asc'])
                @include('books.inc.sort', ['orderby' => 'title', 'direction' => 'desc'])
            </th>
            <th class="table__header">
                Author
                @include('books.inc.sort', ['orderby' => 'author', 'direction' => 'asc'])
                @include('books.inc.sort', ['orderby' => 'author', 'direction' => 'desc'])
            </th>
            <th class="table__header">Options</th>
        </tr>
        @foreach ($books as $book)
        <tr class="table__row">
            <td class="table__item">{{ $book->title }}</td>
            <td class="table__item">{{ $book->author->full_name }}</td>
            <td class="table__item">
                <div class="table__options">
                    <button class="btn btn--edit">
                        <a href="/author/{{ $book->author->id }}">
                            edit <i class="fas fa-pencil-alt"></i>
                        </a>
                    </button>
                    <form action="/books/delete/{{ $book->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn--delete">
                            <input type="submit" value="delete"><i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <h4 class="header header--no-results">Sorry, we couldn't find anything. Try another search!</h4>
    @endif

    @if (method_exists($books, 'links'))
    {{ $books->links() }}
@endif
