<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function edit($id)
    {
        $author = Author::find($id);

        return view('author')->with('author', $author);
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

