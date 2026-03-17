@extends('layouts.app')

@section('title', 'Recipe Categories — Saffron & Sage')

@section('styles')
<style>
.page-hero {
    background: var(--cocoa);
    padding: 5rem 0 3rem;
    position: relative;
    overflow: hidden;
}
.page-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('https://images.unsplash.com/photo-1466637574441-749b8f19452f?w=1400&q=70');
    background-size: cover;
    background-position: center;
    opacity: 0.2;
}
.page-hero .container { position: relative; z-index: 2; }
.page-hero h1 { color: #fff; font-size: clamp(2rem, 5vw, 3.5rem); }
.page-hero p { color: rgba(255,255,255,0.75); }

.category-card {
    height: 100%;
    border: none;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: var(--warm-white);
}
.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.category-card .card-img-wrap {
    height: 200px;
    position: relative;
    overflow: hidden;
}
.category-card .card-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.category-card:hover .card-img-wrap img {
    transform: scale(1.05);
}
.category-card .card-body {
    padding: 1.5rem;
    text-align: center;
}
.category-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--cocoa);
    margin-bottom: 0.5rem;
}
.category-card .card-text {
    color: var(--text-muted);
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}
.category-card .recipe-count {
    display: inline-block;
    background: var(--saffron-light);
    color: var(--cocoa);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    margin-bottom: 1rem;
}
</style>
@endsection

@section('content')

<div class="page-hero">
    <div class="container text-center">
        <p class="section-label" style="color:var(--saffron-light);">Explore by Category</p>
        <h1>Recipe Categories</h1>
        <p>Discover recipes organized by cuisine type, meal course, and cooking style. Find exactly what you're craving.</p>
    </div>
</div>

<!-- CATEGORIES GRID -->
<section style="background:var(--cream); padding: 4rem 0;">
    <div class="container">
        <div class="row g-4">
            @php
            $categories = [
                [
                    'name' => 'Dinner',
                    'slug' => 'dinner',
                    'img' => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=600&q=80',
                    'desc' => 'Hearty main courses and satisfying dinner recipes for every night of the week.',
                    'count' => '45 recipes'
                ],
                [
                    'name' => 'Pasta',
                    'slug' => 'pasta',
                    'img' => 'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=600&q=80',
                    'desc' => 'From classic Italian dishes to creative twists, explore our pasta collection.',
                    'count' => '28 recipes'
                ],
                [
                    'name' => 'Salads',
                    'slug' => 'salads',
                    'img' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80',
                    'desc' => 'Fresh, vibrant salads perfect for light meals or hearty sides.',
                    'count' => '22 recipes'
                ],
                [
                    'name' => 'Desserts',
                    'slug' => 'desserts',
                    'img' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80',
                    'desc' => 'Sweet endings to any meal, from cakes to puddings and everything in between.',
                    'count' => '36 recipes'
                ],
                [
                    'name' => 'Breakfast',
                    'slug' => 'breakfast',
                    'img' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80',
                    'desc' => 'Start your day right with these delicious breakfast and brunch recipes.',
                    'count' => '31 recipes'
                ],
                [
                    'name' => 'Indian',
                    'slug' => 'indian',
                    'img' => 'https://images.unsplash.com/photo-1559847844-5315695dadae?w=600&q=80',
                    'desc' => 'Authentic Indian flavors and regional specialties from across the subcontinent.',
                    'count' => '19 recipes'
                ],
                [
                    'name' => 'Baking',
                    'slug' => 'baking',
                    'img' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=600&q=80',
                    'desc' => 'Bread, cookies, cakes, and more — master the art of baking.',
                    'count' => '24 recipes'
                ],
                [
                    'name' => 'Soups',
                    'slug' => 'soups',
                    'img' => 'https://images.unsplash.com/photo-1574484284002-952d92456975?w=600&q=80',
                    'desc' => 'Comforting soups and stews for cozy meals and healthy eating.',
                    'count' => '18 recipes'
                ]
            ];
            @endphp

            @foreach($categories as $category)
            <div class="col-md-6 col-lg-3">
                <div class="category-card">
                    <div class="card-img-wrap">
                        <img src="{{ $category['img'] }}" alt="{{ $category['name'] }} Recipes" loading="lazy">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $category['name'] }}</h3>
                        <p class="card-text">{{ $category['desc'] }}</p>
                        <div class="recipe-count">{{ $category['count'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- FEATURED CATEGORY -->
        <div class="text-center mt-5">
            <div style="background: var(--warm-white); padding: 3rem; border-radius: 8px; max-width: 600px; margin: 0 auto;">
                <h3 style="color: var(--cocoa); font-family: 'Playfair Display', serif; margin-bottom: 1rem;">Can't Decide?</h3>
                <p style="color: var(--text-muted); margin-bottom: 2rem;">Browse all our recipes or search for specific ingredients and cuisines.</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ url('/recipes') }}" class="btn" style="background: var(--sage); border: none; color: white; padding: 0.75rem 1.5rem;">All Recipes</a>
                    <a href="{{ url('/recipes') }}" class="btn" style="background: var(--terracotta); border: none; color: white; padding: 0.75rem 1.5rem;">Search Recipes</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection