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

    public function downloadCSV()
    {
        array_unshift($this->all_data, array_keys($this->all_data[0]));
        array_unshift($this->title_only, array_keys($this->title_only[0]));
        array_unshift($this->author_only, array_keys($this->author_only[0]));

        $callback = function()
            {
                $FH = fopen('php://output', 'w');
                foreach ($this->all_data as $row) {
                    fputcsv($FH, $row);
                }
                foreach ($this->title_only as $row) {
                    fputcsv($FH, $row);
                }
                foreach ($this->author_only as $row) {
                    fputcsv($FH, $row);
                }
                fclose($FH);
            };

        return response()->stream($callback, 200, $this->headers('text/csv', 'books.csv'));
    }

    public function downloadXML()
    {
        $callback = function()
        {
            $xml = new XMLWriter();
            $xml->openURI('php://output');
            $xml->setIndent(true);
            $xml->startDocument('1.0');
            $xml->startElement('books');
            foreach ($this->all_data as $item) {
                $xml->startElement('book');
                $xml->writeElement('author', $item['full_name']);
                $xml->writeElement('title', $item['title']);
                $xml->endElement();
            }
            $xml->endElement();
            $xml->startElement('titles');
            foreach ($this->all_data as $item) {
                $xml->startElement('title');
                $xml->writeElement('title', $item['title']);
                $xml->endElement();
            }
            $xml->endElement();
            $xml->startElement('authors');
            foreach ($this->author_only as $author) {
                $xml->startElement('author');
                $xml->writeElement('name', $author['full_name']);
                $xml->endElement();
            }

            $xml->endElement();
            $xml->endDocument();
        };

        return response()->stream($callback, 200, $this->headers('text/xml', 'books.xml'));
    }
}
