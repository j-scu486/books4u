<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function edit($id)
    {
        return view('authors.index')->with(['author' => Author::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'required'
        ]);

        $author = Author::find($id);
        $author->full_name = $request->input('full_name');
        $author->save();

        return redirect('/')->with('success', 'Author name changed!');
    }
}

