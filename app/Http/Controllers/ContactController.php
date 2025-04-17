<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // Assuming you have a Contact model

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // Fetch all contact messages
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create'); // Show the form for creating a new contact message
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all()); // Store the contact message

        return redirect()->route('contact.index')->with('success', 'Message sent successfully!');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id); // Fetch a specific contact message
        return view('contact.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id); // Fetch a specific contact message for editing
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all()); // Update the contact message

        return redirect()->route('contact.index')->with('success', 'Message updated successfully!');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete(); // Delete the contact message

        return redirect()->route('contact.index')->with('success', 'Message deleted successfully!');
    }
}
