<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['book', 'member'])->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Display the frontend listing of transactions.
     */
    public function front()
    {
        $transactions = Transaction::with(['book', 'member'])->latest()->paginate(10);
        return view('transactions.front', compact('transactions'));
    }

    public function member()
    {
        $transactions = Transaction::with(['book', 'member'])->latest()->paginate(10);
        return view('transactions.member', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::whereDoesntHave('transactions', function($query) {
            $query->whereNull('return_date');
        })->get();

        $members = Member::all();
        return view('transactions.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'transaction_date' => 'required|date',
        ]);

        // Check if book is already checked out
        $book = Book::findOrFail($request->book_id);
        if ($book->isCheckedOut()) {
            return back()->with('error', 'This book is already checked out.');
        }

        Transaction::create($validated);

        return redirect()->route('transactions.index')
            ->with('success', 'Book checked out successfully.');
    }

    /**
     * Mark a book as returned.
     */
    public function return(Transaction $transaction)
    {
        if ($transaction->return_date) {
            return back()->with('error', 'This book has already been returned.');
        }

        $transaction->update([
            'return_date' => Carbon::now()
        ]);

        return back()->with('success', 'Book returned successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $books = Book::all();
        $members = Member::all();
        return view('transactions.edit', compact('transaction', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}
