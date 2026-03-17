@extends('layouts.app')

@section('title', 'About — Saffron & Sage')

@section('styles')
<style>
.about-hero {
    background: var(--cream);
    padding: 5rem 0;
}
.about-img-wrap {
    position: relative;
}
.about-img-wrap img {
    border-radius: 4px;
    width: 100%;
}
.about-img-wrap::before {
    content: '';
    position: absolute;
    top: -16px; left: -16px;
    right: 16px; bottom: 16px;
    border: 3px solid var(--saffron);
    border-radius: 4px;
    z-index: 0;
}
.about-img-wrap img { position: relative; z-index: 1; }
.value-card {
    text-align: center;
    padding: 2.5rem 1.5rem;
    background: var(--warm-white);
    border: 1px solid #EDE0D0;
    border-radius: 4px;
    transition: box-shadow 0.2s, transform 0.2s;
}
.value-card:hover {
    box-shadow: 0 8px 30px rgba(61,43,31,0.1);
    transform: translateY(-3px);
}
.value-card .icon { font-size: 2.2rem; margin-bottom: 1rem; display: block; }
.timeline-item { display:flex; gap:1.5rem; margin-bottom:2.5rem; }
.timeline-dot { width:16px; height:16px; background:var(--saffron); border-radius:50%; margin-top:5px; flex-shrink:0; position:relative; }
.timeline-dot::after { content:''; position:absolute; top:14px; left:50%; transform:translateX(-50%); width:2px; height:calc(100% + 20px); background:#EDE0D0; }
.timeline-item:last-child .timeline-dot::after { display:none; }
</style>
@endsection

@section('content')

<!-- ABOUT HERO -->
<section class="about-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <p class="section-label">The Story</p>
                <h1 style="font-size:clamp(2rem,5vw,3.5rem); margin-bottom:1.5rem;">Hello, I'm Priya 👋<br><em style="font-style:italic; color:var(--saffron);">Lover of butter, spices & slow Sundays</em></h1>
                <p style="font-size:1.05rem; color:var(--text-muted); line-height:1.85; margin-bottom:1.5rem;">
                    I'm a food writer, recipe developer, and home cook based in Mumbai. Saffron & Sage started in 2012 as a place to document the recipes I was cooking through heartbreak, homesickness, and pure joy — and somehow, it grew into something much bigger.
                </p>
                <p style="font-size:1rem; color:var(--text-muted); line-height:1.85; margin-bottom:2rem;">
                    My cooking draws from my South Indian roots, years living abroad (London, 2014–2018), and an insatiable curiosity about the food of every culture I encounter. Here you'll find Indian classics alongside French braises, pasta, and everything in between — all cooked with real ingredients and honest technique.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ url('/recipes') }}" class="btn btn-saffron">Explore My Recipes</a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-sage">Get in Touch</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-img-wrap ps-3">
                    <img src="https://images.unsplash.com/photo-1556909211-36987daf7b4d?w=800&q=80" alt="Priya in her kitchen">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VALUES -->
<section style="background:var(--warm-white); padding:5rem 0;">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-label">What I Believe</p>
            <h2 style="font-size:2.2rem;">The Saffron &amp; Sage Philosophy</h2>
        </div>
        <div class="row g-4">
            @php
            $values = [
                ['icon'=>'🌿','title'=>'Seasonal First','body'=>'Cooking with what\'s in season isn\'t a trend — it\'s the original way to cook. The best ingredient is always the ripest, most seasonal one.'],
                ['icon'=>'🧂','title'=>'Season Generously','body'=>'Salt is not the enemy. Under-seasoning is. I\'ll teach you to taste as you go, trust your palate, and cook with confidence.'],
                ['icon'=>'📖','title'=>'Honest Recipes','body'=>'Every recipe on this site has been made in my home kitchen — no food stylists, no team. Just me, my pans, and a camera on a tripod.'],
                ['icon'=>'⏱️','title'=>'Time Is Flavour','body'=>'Some of the best dishes take hours. I celebrate slow cooking alongside the quick weeknight meal — because both have their place.'],
            ];
            @endphp
            @foreach($values as $v)
            <div class="col-sm-6 col-lg-3">
                <div class="value-card">
                    <span class="icon">{{ $v['icon'] }}</span>
                    <h4 style="font-family:'Playfair Display',serif; font-size:1.2rem; margin-bottom:0.75rem;">{{ $v['title'] }}</h4>
                    <p style="font-size:0.875rem; color:var(--text-muted); line-height:1.7; margin:0;">{{ $v['body'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section style="background:var(--cream); padding:5rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-5">
                    <p class="section-label">The Journey</p>
                    <h2 style="font-size:2.2rem;">How We Got Here</h2>
                </div>
                @php
                $timeline = [
                    ['year'=>'2012','event'=>'Launched Saffron & Sage','detail'=>'Started as a personal recipe diary during my first apartment in Bangalore. Barely 20 readers (mostly family).'],
                    ['year'=>'2014','event'=>'Moved to London','detail'=>'Discovered French cooking, sourdough obsession, and Borough Market. The blog transformed with me.'],
                    ['year'=>'2017','event'=>'First Book Deal','detail'=>'Published "Spice Routes" — a 120-recipe collection blending Indian and European cooking traditions.'],
                    ['year'=>'2018','event'=>'Returned to Mumbai','detail'=>'Came home, built a proper kitchen, and launched the newsletter. Grew to 10,000 subscribers in 6 months.'],
                    ['year'=>'2023','event'=>'YouTube & 50K Readers','detail'=>'Launched the cooking video series. The community now spans 50,000 weekly readers and 25K YouTube subscribers.'],
                ];
                @endphp
                @foreach($timeline as $t)
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div>
                        <span class="section-label">{{ $t['year'] }}</span>
                        <h4 style="font-family:'Playfair Display',serif; font-size:1.2rem; margin:0.25rem 0 0.5rem;">{{ $t['event'] }}</h4>
                        <p style="font-size:0.9rem; color:var(--text-muted); line-height:1.7; margin:0;">{{ $t['detail'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- AS SEEN IN -->
<section style="background:var(--warm-white); padding:3.5rem 0; border-top:1px solid #EDE0D0;">
    <div class="container">
        <p class="text-center section-label mb-3">As Seen In</p>
        <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap" style="opacity:0.45;">
            @foreach(['Bon Appétit','The Times of India','Food52','Condé Nast Traveller','Saveur'] as $pub)
            <span style="font-family:'Playfair Display',serif; font-weight:700; font-size:1.1rem; color:var(--cocoa); white-space:nowrap;">{{ $pub }}</span>
            @endforeach
        </div>
    </div>
</section>

@endsection
