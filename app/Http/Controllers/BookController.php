<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'content' => 'required|min:10',
            'file' => 'required|max:3000000|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $image_path = null;

        if($request->file('file')){
            $image_path = $request->file('file')->store('/public/images');
        }

        Book::query()->create([
                'img' => $image_path, 'author_id' => Auth::user()->getAuthIdentifier()
            ] + $validator->validated());

        return redirect()->route('home');
    }

    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'content' => 'required|min:10',
            'file' => 'required|max:3000000|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $validated = $validator->validated();

        if($request->file('file')) {

            $request->validate(['file' => 'mimes:jpg,jpeg,png']);

            $path = $request->file('file')->store('public/images');

            $validated['image_path'] = $path;
        }

        $book->update($validated);

        return redirect()->route('book', $book);
    }


    public function show($id)
    {
        $book = Book::query()->find($id);

        if($book === null){
            return redirect()->route('home');
        }

        return view('book', ['book' => $book]);
    }

    public function delete($id)
    {
       Book::destroy($id);

       return redirect()->route('home');
    }
}
