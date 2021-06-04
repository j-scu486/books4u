<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use XMLWriter;

class FileController extends Controller
{
    protected $all_data;
    protected $title_only;
    protected $author_only;

    public function __construct()
    {
        $this->all_data =       Book::withAuthorTable()
                                    ->select('title', 'full_name')
                                    ->get()
                                    ->toArray();
        $this->title_only =     Book::all('title')
                                    ->toArray();
        $this->author_only =    Book::withAuthorTable()
                                    ->select('full_name')
                                    ->groupBy('full_name')
                                    ->get()
                                    ->toArray();
    }

    protected function headers($file_type, $file_output)
    {
        return [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => $file_type
        ,   'Content-Disposition' => 'attachment; filename=' . $file_output
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
        ];
    }

    public function show()
    {
        return view('files.index');
    }

    public function downloadCSV($format_type)
    {
        array_unshift($this->$format_type, array_keys($this->$format_type[0]));

        $callback = function() use($format_type)
            {
                $FH = fopen('php://output', 'w');
                foreach ($this->$format_type as $row) {
                    fputcsv($FH, $row);
                }

                fclose($FH);
            };

        return response()->stream($callback, 200, $this->headers('text/csv', 'books.csv'));
    }

    public function downloadXML($format_type)
    {
        $callback = function() use($format_type)
        {
            $xml = new XMLWriter();
            $xml->openURI('php://output');
            $xml->setIndent(true);
            $xml->startDocument('1.0');
            switch($format_type)
            {
                case 'all_data':
                    $xml->startElement('books');
                    foreach ($this->all_data as $item) {
                        $xml->startElement('book');
                        $xml->writeElement('author', $item['full_name']);
                        $xml->writeElement('title', $item['title']);
                        $xml->endElement();
                    }
                    break;
                case 'title_only':
                    $xml->startElement('titles');
                    foreach ($this->all_data as $item) {
                        $xml->startElement('title');
                        $xml->writeElement('title', $item['title']);
                        $xml->endElement();
                    }
                    break;
                case 'author_only':
                    $xml->startElement('authors');
                    foreach ($this->author_only as $author) {
                        $xml->startElement('author');
                        $xml->writeElement('name', $author['full_name']);
                        $xml->endElement();
                    }
                    break;
                default:
                    abort(404);
            }
            $xml->endDocument();
        };

        return response()->stream($callback, 200, $this->headers('text/xml', 'books.xml'));
    }
}
