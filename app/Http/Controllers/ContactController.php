<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('contact.index', compact('categories', 'tags'));

    }
    public function confirm(ContactRequest $request)
    {
        $validated = $request->validated();
        $category = Category::findOrFail($validated['category_id']);
        $tags = Tag::whereIn('id', $validated['tag_ids'] ?? [])->get();
        return view('contact.confirm', compact('validated', 'category', 'tags'));
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        $contact = Contact::create($validated);

        if (!empty($validated['tags'])) {
            $contact->tags()->attach($validated['tags']);
        }

        return redirect()->route('contacts.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }


}