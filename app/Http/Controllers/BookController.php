<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Display the frontend listing of books.
     */
    public function front()
    {
        $books = Book::with('author')->paginate(10);
        return view('books.front', compact('books'));
    }

    public function member()
    {
        $books = Book::with('author')->paginate(10);
        return view('books.member', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required|string|unique:books|max:20',
            'published_date' => 'required|date',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'isbn' => 'required|string|max:20|unique:books,isbn,'.$book->id,
            'published_date' => 'required|date',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
