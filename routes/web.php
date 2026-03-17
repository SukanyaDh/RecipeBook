<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/recipes', function () {
    return view('pages.recipes');
})->name('recipes');

Route::get('/recipes/{slug}', function ($slug) {
    // In a real app, you'd fetch from DB by slug
    return view('pages.recipe-detail', ['slug' => $slug]);
})->name('recipe.show');

Route::get('/categories', function () {
    return view('pages.categories');
})->name('categories');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'first_name' => 'required|string|max:100',
        'email'      => 'required|email',
        'message'    => 'required|string|min:10',
    ]);
    // Handle sending email or storing in DB here
    return back()->with('success', 'Message sent! I\'ll reply within 48 hours.');
})->name('contact.submit');

Route::get('/newsletter', function () {
    return redirect('/')->with('show_newsletter', true);
});
