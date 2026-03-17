@extends('layouts.app')

@section('title', 'Saffron & Sage — Seasonal Food Blog')
@section('description', 'Soul-warming recipes, kitchen stories, and seasonal cooking inspiration from our table to yours.')

@section('styles')
<style>
    /* HERO */
    .hero {
        position: relative;
        min-height: 92vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--cocoa);
    }
    .hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1600&q=80');
        background-size: cover;
        background-position: center;
        opacity: 0.45;
        transform: scale(1.04);
        animation: heroZoom 12s ease-in-out infinite alternate;
    }
    @keyframes heroZoom {
        from { transform: scale(1.04); }
        to   { transform: scale(1.0); }
    }
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(61,43,31,0.7) 0%, rgba(61,43,31,0.3) 60%, transparent 100%);
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-eyebrow {
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        font-size: 0.72rem;
        color: var(--saffron-light);
        margin-bottom: 1rem;
    }
    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.8rem, 7vw, 5rem);
        font-weight: 900;
        color: #fff;
        line-height: 1.08;
        margin-bottom: 1.5rem;
        text-shadow: 0 2px 20px rgba(0,0,0,0.3);
    }
    .hero-title em {
        font-style: italic;
        color: var(--saffron-light);
    }
    .hero-subtitle {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.85);
        font-weight: 300;
        line-height: 1.7;
        max-width: 500px;
        margin-bottom: 2rem;
    }
    .hero-scroll {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        color: rgba(255,255,255,0.5);
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        animation: bounce 2s infinite;
    }
    @keyframes bounce {
        0%,100% { transform: translateX(-50%) translateY(0); }
        50%      { transform: translateX(-50%) translateY(6px); }
    }

    /* FEATURED STRIP */
    .featured-strip {
        background: var(--warm-white);
        padding: 4.5rem 0;
    }

    /* HERO STATS */
    .hero-stats {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 0;
    }
    .stat-block {
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.12);
        padding: 1.4rem 1.8rem;
        text-align: center;
        min-width: 120px;
    }
    .stat-block strong {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--saffron-light);
        display: block;
    }
    .stat-block span {
        font-size: 0.68rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.6);
    }

    /* CATEGORY ROW */
    .cat-icon-card {
        text-align: center;
        padding: 2rem 1rem;
        border-radius: 4px;
        border: 1px solid #EDE0D0;
        background: var(--warm-white);
        cursor: pointer;
        transition: all 0.25s;
        text-decoration: none;
        color: var(--cocoa);
        display: block;
    }
    .cat-icon-card:hover {
        background: var(--saffron);
        border-color: var(--saffron);
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(232,135,26,0.2);
    }
    .cat-icon-card .icon { font-size: 2rem; margin-bottom: 0.5rem; display: block; }
    .cat-icon-card .label {
        font-family: 'Lato', sans-serif;
        font-weight: 700;
        font-size: 0.75rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    /* FEATURED RECIPE (Big Card) */
    .featured-big {
        position: relative;
        border-radius: 4px;
        overflow: hidden;
        min-height: 480px;
        display: flex;
        align-items: flex-end;
        text-decoration: none;
    }
    .featured-big img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .featured-big:hover img { transform: scale(1.04); }
    .featured-big .overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(61,43,31,0.9) 0%, rgba(61,43,31,0.3) 50%, transparent 100%);
    }
    .featured-big .content {
        position: relative;
        z-index: 2;
        padding: 2rem;
        width: 100%;
    }

    /* SECTION BG */
    .section-cream { background: var(--cream); padding: 5rem 0; }
    .section-white { background: var(--warm-white); padding: 5rem 0; }

    /* TRENDING */
    .trending-item {
        display: flex;
        gap: 1rem;
        align-items: flex-start;
        padding: 1rem 0;
        border-bottom: 1px solid #EDE0D0;
        text-decoration: none;
        color: var(--cocoa);
        transition: color 0.2s;
    }
    .trending-item:last-child { border-bottom: none; }
    .trending-item:hover { color: var(--saffron); }
    .trending-num {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 900;
        color: #EDE0D0;
        min-width: 2.5rem;
        line-height: 1;
    }
    .trending-item:hover .trending-num { color: var(--saffron-light); }
    .trending-info .title {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 0.2rem;
    }
    .trending-info .meta { font-size: 0.78rem; color: var(--text-muted); }

    /* QUOTE BAND */
    .quote-band {
        background: var(--sage);
        padding: 4rem 0;
        text-align: center;
    }
    .quote-band blockquote {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        font-size: clamp(1.4rem, 3vw, 2rem);
        color: #fff;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.5;
    }
    .quote-band cite {
        display: block;
        margin-top: 1rem;
        font-family: 'Lato', sans-serif;
        font-style: normal;
        font-size: 0.8rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.6);
    }

    /* NEWSLETTER SECTION */
    .newsletter-section {
        background: linear-gradient(135deg, var(--saffron) 0%, var(--terracotta) 100%);
        padding: 5rem 0;
    }
    .newsletter-section h2 { color: #fff; }
    .newsletter-section p { color: rgba(255,255,255,0.85); }
    .newsletter-input {
        border-radius: 2px;
        border: none;
        padding: 0.75rem 1.2rem;
        font-size: 0.9rem;
        outline: none;
    }
    .btn-white-outline {
        background: rgba(255,255,255,0.15);
        border: 2px solid rgba(255,255,255,0.7);
        color: #fff;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        font-size: 0.75rem;
        padding: 0.75rem 1.8rem;
        border-radius: 2px;
        transition: all 0.2s;
    }
    .btn-white-outline:hover { background: #fff; color: var(--saffron); }
</style>
@endsection

@section('content')

<!-- ═══ HERO ═══ -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content py-5">
        <div class="row">
            <div class="col-lg-7">
                <p class="hero-eyebrow fade-up">Welcome to the Kitchen</p>
                <h1 class="hero-title fade-up delay-1">
                    Cook with<br><em>Passion,</em><br>Eat with Joy
                </h1>
                <p class="hero-subtitle fade-up delay-2">
                    Seasonal recipes rooted in warmth and tradition. From slow-simmered Sunday sauces to five-minute weeknight wonders — food that brings people together.
                </p>
                <div class="d-flex gap-3 flex-wrap fade-up delay-3">
                    <a href="{{ url('/recipes') }}" class="btn btn-saffron">Explore Recipes</a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-sage" style="border-color:rgba(255,255,255,0.5); color:#fff;">Our Story</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Stats -->
    <div class="hero-stats d-none d-xl-flex">
        <div class="stat-block"><strong>280+</strong><span>Recipes</span></div>
        <div class="stat-block"><strong>50K</strong><span>Readers</span></div>
        <div class="stat-block"><strong>12</strong><span>Years</span></div>
    </div>
    <!-- Scroll hint -->
    <div class="hero-scroll">
        <span>Scroll</span>
        <i class="bi bi-chevron-down"></i>
    </div>
</section>

<!-- ═══ CATEGORIES ═══ -->
<section class="section-white">
    <div class="container">
        <div class="text-center mb-4">
            <p class="section-label">Browse By</p>
            <h2 class="mb-0" style="font-size:2.2rem;">What Are You Craving?</h2>
        </div>
        <div class="divider-ornament"><span>✦</span></div>
        <div class="row g-3 mt-2">
            @php
            $cats = [
                ['icon'=>'🥞','label'=>'Breakfast','href'=>'#'],
                ['icon'=>'🥗','label'=>'Salads','href'=>'#'],
                ['icon'=>'🍝','label'=>'Pasta','href'=>'#'],
                ['icon'=>'🍗','label'=>'Mains','href'=>'#'],
                ['icon'=>'🍰','label'=>'Desserts','href'=>'#'],
                ['icon'=>'🍹','label'=>'Drinks','href'=>'#'],
            ];
            @endphp
            @foreach($cats as $cat)
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="{{ $cat['href'] }}" class="cat-icon-card">
                    <span class="icon">{{ $cat['icon'] }}</span>
                    <span class="label">{{ $cat['label'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══ FEATURED RECIPES ═══ -->
<section class="section-cream" id="featured">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label">Editor's Pick</p>
            <h2 style="font-size:2.2rem;">Featured This Week</h2>
        </div>
        <div class="row g-4">
            <!-- BIG CARD -->
            <div class="col-lg-7">
                <a href="{{ url('/recipes/golden-butter-chicken') }}" class="featured-big">
                    <img src="https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=900&q=80" alt="Butter Chicken">
                    <div class="overlay"></div>
                    <div class="content">
                        <span class="tag-pill" style="color:#fff; background:rgba(232,135,26,0.8);">Dinner</span>
                        <h2 style="font-size:1.8rem; color:#fff; margin-top:0.5rem;">Golden Butter Chicken</h2>
                        <p style="color:rgba(255,255,255,0.8); font-size:0.9rem; margin-bottom:1rem;">Velvety tomato sauce, fragrant spices, and tender chicken slow-simmered to perfection. The ultimate comfort meal.</p>
                        <div class="recipe-meta">
                            <span style="color:rgba(255,255,255,0.7);"><i class="bi bi-clock"></i> 45 mins</span>
                            <span style="color:rgba(255,255,255,0.7);"><i class="bi bi-people"></i> Serves 4</span>
                            <span style="color:rgba(255,255,255,0.7);"><i class="bi bi-bar-chart"></i> Medium</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- SIDE CARDS -->
            <div class="col-lg-5">
                <div class="row g-4 h-100">
                    @php
                    $side = [
                        ['img'=>'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80','cat'=>'Dessert','title'=>'Cardamom Crème Brûlée','time'=>'35 min','serves'=>'4','diff'=>'Easy','slug'=>'cardamom-creme-brulee'],
                        ['img'=>'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80','cat'=>'Breakfast','title'=>'Turmeric Banana Pancakes','time'=>'20 min','serves'=>'2','diff'=>'Easy','slug'=>'turmeric-banana-pancakes'],
                    ];
                    @endphp
                    @foreach($side as $r)
                    <div class="col-12">
                        <a href="{{ url('/recipes/'.$r['slug']) }}" class="text-decoration-none">
                            <div class="recipe-card" style="flex-direction:row; display:flex; height:auto;">
                                <div style="width:160px; flex-shrink:0; overflow:hidden;">
                                    <img src="{{ $r['img'] }}" alt="{{ $r['title'] }}" style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;">
                                </div>
                                <div class="card-body" style="padding:1rem 1.2rem;">
                                    <span class="section-label">{{ $r['cat'] }}</span>
                                    <h4 class="card-title" style="font-size:1rem; margin-top:0.3rem;">{{ $r['title'] }}</h4>
                                    <div class="recipe-meta mt-2">
                                        <span><i class="bi bi-clock"></i> {{ $r['time'] }}</span>
                                        <span><i class="bi bi-people"></i> {{ $r['serves'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ LATEST RECIPES ═══ -->
<section class="section-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <p class="section-label">Fresh From The Kitchen</p>
                <h2 style="font-size:2.2rem; margin:0;">Latest Recipes</h2>
            </div>
            <a href="{{ url('/recipes') }}" class="btn btn-outline-sage d-none d-md-inline-block">View All</a>
        </div>
        <div class="row g-4">
            @php
            $recipes = [
                ['img'=>'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=600&q=80','cat'=>'Pasta','title'=>'Lemon Ricotta Gnocchi with Brown Butter','desc'=>'Cloud-light pillows of gnocchi cloaked in nutty brown butter, fresh herbs, and crispy capers.','time'=>'40 min','serves'=>'4','diff'=>'Medium','slug'=>'lemon-ricotta-gnocchi'],
                ['img'=>'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80','cat'=>'Salad','title'=>'Roasted Beet & Goat Cheese Salad','desc'=>'Jewel-toned roasted beets, creamy goat cheese, candied walnuts on a bed of arugula.','time'=>'50 min','serves'=>'2','diff'=>'Easy','slug'=>'roasted-beet-salad'],
                ['img'=>'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80','cat'=>'Street Food','title'=>'Smoky Chorizo Smash Burgers','desc'=>'Double-smashed patties with chorizo crumble, pickled jalapeños, and secret sauce.','time'=>'25 min','serves'=>'2','diff'=>'Easy','slug'=>'chorizo-smash-burgers'],
                ['img'=>'https://images.unsplash.com/photo-1551024506-0bccd828d307?w=600&q=80','cat'=>'Dessert','title'=>'Mango Saffron Panna Cotta','desc'=>'Silky Italian cream dessert perfumed with saffron and crowned with fresh mango coulis.','time'=>'15 min','serves'=>'6','diff'=>'Easy','slug'=>'mango-saffron-panna-cotta'],
                ['img'=>'https://images.unsplash.com/photo-1574484284002-952d92456975?w=600&q=80','cat'=>'Soup','title'=>'Spiced Carrot & Ginger Soup','desc'=>'Velvety blended soup with roasted carrots, fresh ginger, coconut milk, and toasted seeds.','time'=>'35 min','serves'=>'4','diff'=>'Easy','slug'=>'carrot-ginger-soup'],
                ['img'=>'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=600&q=80','cat'=>'Breakfast','title'=>'Masala French Toast with Chai Cream','desc'=>'A desi twist on French toast — spiced egg custard, crispy edges, chai-infused whipped cream.','time'=>'20 min','serves'=>'2','diff'=>'Easy','slug'=>'masala-french-toast'],
            ];
            @endphp
            @foreach($recipes as $r)
            <div class="col-md-6 col-lg-4">
                <div class="recipe-card h-100">
                    <div class="card-img-wrap">
                        <img src="{{ $r['img'] }}" alt="{{ $r['title'] }}" loading="lazy">
                        <span class="card-badge">{{ $r['cat'] }}</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $r['title'] }}</h3>
                        <p class="card-text">{{ $r['desc'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="recipe-meta">
                                <span><i class="bi bi-clock"></i> {{ $r['time'] }}</span>
                                <span><i class="bi bi-people"></i> {{ $r['serves'] }}</span>
                                <span><i class="bi bi-bar-chart"></i> {{ $r['diff'] }}</span>
                            </div>
                        </div>
                        <a href="{{ url('/recipes/'.$r['slug']) }}" class="btn btn-saffron btn-sm mt-3 w-100">View Recipe</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5 d-md-none">
            <a href="{{ url('/recipes') }}" class="btn btn-outline-sage">View All Recipes</a>
        </div>
    </div>
</section>

<!-- ═══ QUOTE BAND ═══ -->
<div class="quote-band">
    <div class="container">
        <blockquote>
            "Cooking is not about convenience and it's not about shortcuts. Our hunger for the twenty-minute gourmet meal has had some unfortunate results."
            <cite>— Alice Waters</cite>
        </blockquote>
    </div>
</div>

<!-- ═══ TRENDING + ABOUT SIDEBAR ═══ -->
<section class="section-cream">
    <div class="container">
        <div class="row g-5">
            <!-- Trending -->
            <div class="col-lg-7">
                <p class="section-label">Most Loved</p>
                <h2 class="mb-4" style="font-size:2rem;">Trending This Month</h2>
                @php
                $trending = [
                    ['title'=>'One-Pan Saffron Rice with Crispy Chicken Thighs','time'=>'50 min','cat'=>'Dinner','slug'=>'saffron-rice-chicken'],
                    ['title'=>'Coconut Lemongrass Prawn Curry','time'=>'30 min','cat'=>'Seafood','slug'=>'coconut-lemongrass-prawn'],
                    ['title'=>'Classic Beef Bourguignon','time'=>'3 hrs','cat'=>'French','slug'=>'beef-bourguignon'],
                    ['title'=>'Tahini Chocolate Chip Cookies','time'=>'25 min','cat'=>'Baking','slug'=>'tahini-choc-chip-cookies'],
                    ['title'=>'Smoky Baba Ganoush with Za\'atar Flatbread','time'=>'45 min','cat'=>'Mezze','slug'=>'baba-ganoush'],
                ];
                @endphp
                @foreach($trending as $i => $t)
                <a href="{{ url('/recipes/'.$t['slug']) }}" class="trending-item">
                    <span class="trending-num">0{{ $i+1 }}</span>
                    <div class="trending-info">
                        <div class="title">{{ $t['title'] }}</div>
                        <div class="meta"><i class="bi bi-clock me-1"></i>{{ $t['time'] }} &nbsp;·&nbsp; {{ $t['cat'] }}</div>
                    </div>
                </a>
                @endforeach
            </div>

            <!-- About Sidebar -->
            <div class="col-lg-5">
                <div style="background:var(--warm-white); border:1px solid #EDE0D0; border-radius:4px; overflow:hidden;">
                    <img src="https://images.unsplash.com/photo-1556909211-36987daf7b4d?w=800&q=80" alt="Kitchen" style="width:100%; height:200px; object-fit:cover;">
                    <div style="padding:1.75rem;">
                        <p class="section-label">About The Blog</p>
                        <h3 style="font-family:'Playfair Display',serif; font-size:1.5rem;">Hello, I'm Priya 👋</h3>
                        <p style="font-size:0.9rem; color:var(--text-muted); line-height:1.7;">A food writer, home cook, and obsessive recipe developer based in Mumbai. Saffron & Sage is where I document everything I love cooking — from slow weekend feasts to quick weeknight wins.</p>
                        <a href="{{ url('/about') }}" class="btn btn-outline-sage w-100 mt-2">Read My Story</a>
                    </div>
                </div>
                <!-- Tags -->
                <div style="background:var(--warm-white); border:1px solid #EDE0D0; border-radius:4px; padding:1.5rem; margin-top:1.5rem;">
                    <p class="section-label mb-3">Browse Tags</p>
                    @php $tags = ['Quick','Vegetarian','Spicy','Comfort Food','Indian','Italian','One-Pan','Gluten-Free','Desserts','Soups','Salads','Breakfast']; @endphp
                    @foreach($tags as $tag)
                    <a href="#" class="tag-pill">{{ $tag }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ NEWSLETTER ═══ -->
<section class="newsletter-section">
    <div class="container text-center">
        <p class="section-label" style="color:rgba(255,255,255,0.7);">Stay Connected</p>
        <h2 style="font-size:2.4rem; margin-bottom:1rem;">Never Miss a Recipe</h2>
        <p class="mx-auto" style="max-width:500px; margin-bottom:2rem;">Join 50,000+ food lovers and get fresh recipes, seasonal tips, and kitchen secrets delivered to your inbox every Sunday.</p>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="d-flex gap-2">
                    <input type="email" class="newsletter-input flex-grow-1" placeholder="Enter your email address">
                    <button class="btn-white-outline">Subscribe</button>
                </div>
                <p style="font-size:0.75rem; color:rgba(255,255,255,0.55); margin-top:0.75rem;">No spam, ever. Unsubscribe anytime.</p>
            </div>
        </div>
    </div>
</section>

@endsection
