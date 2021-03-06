<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public static function scopeWithAuthorTable(object $query)
    {
        return $query->join('authors', 'authors.id', '=', 'books.author_id');
    }

    public static function scopeWhereQueryIsLike(object $query, string $search_type, string $search_query)
    {
        return $query->where($search_type, 'like', '%' . $search_query . '%');
    }

    public static function searchQuery(array $url_query)
    {
        return $url_query['search_type'] == 'author'
            ? Book::withAuthorTable()->whereQueryIsLike('full_name', $url_query['search'])
            : Book::whereQueryIsLike($url_query['search_type'], $url_query['search']);
    }

    public static function orderQuery(array $url_query)
    {
        return $url_query['orderby'] == 'author'
            ? Book::withAuthorTable()->orderBy('full_name', $url_query['direction'])
            : Book::orderBy($url_query['orderby'], $url_query['direction']);
    }
}
