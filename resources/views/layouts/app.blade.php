<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Saffron & Sage — Food Blog')</title>
    <meta name="description" content="@yield('description', 'Discover soul-warming recipes, culinary stories, and seasonal cooking inspiration.')">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Lato:wght@300;400;700&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --cream: #FAF6F0;
            --warm-white: #FFFDF9;
            --saffron: #E8871A;
            --saffron-light: #F5A441;
            --sage: #6B7F5E;
            --sage-dark: #4A5940;
            --terracotta: #C4654A;
            --cocoa: #3D2B1F;
            --cocoa-light: #6B4C3B;
            --gold: #C9A84C;
            --text-body: #3D2B1F;
            --text-muted: #7A6358;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Lato', sans-serif;
            background-color: var(--cream);
            color: var(--text-body);
            font-weight: 300;
        }

        /* ── NAVBAR ── */
        .navbar-brand-script {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: var(--saffron) !important;
            letter-spacing: 0.02em;
        }
        .navbar {
            background: var(--warm-white);
            border-bottom: 2px solid #EDE0D0;
            padding: 0.75rem 0;
        }
        .navbar-nav .nav-link {
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: var(--cocoa) !important;
            padding: 0.5rem 1rem;
            transition: color 0.2s;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--saffron) !important;
        }
        .navbar-toggler { border-color: var(--saffron); }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23E8871A' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .nav-search-btn {
            background: none;
            border: none;
            color: var(--cocoa);
            font-size: 1.1rem;
            cursor: pointer;
            transition: color 0.2s;
        }
        .nav-search-btn:hover { color: var(--saffron); }

        /* ── TYPOGRAPHY ── */
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        .section-label {
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-size: 0.7rem;
            color: var(--saffron);
        }
        .divider-ornament {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .divider-ornament::before, .divider-ornament::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, #D4BC9A, transparent);
        }
        .divider-ornament span {
            color: var(--gold);
            font-size: 1rem;
        }

        /* ── BUTTONS ── */
        .btn-saffron {
            background: var(--saffron);
            color: #fff;
            border: none;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-size: 0.75rem;
            padding: 0.65rem 1.8rem;
            border-radius: 2px;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-saffron:hover {
            background: var(--terracotta);
            color: #fff;
            transform: translateY(-1px);
        }
        .btn-outline-sage {
            border: 2px solid var(--sage);
            color: var(--sage);
            background: transparent;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-size: 0.75rem;
            padding: 0.6rem 1.6rem;
            border-radius: 2px;
            transition: all 0.2s;
        }
        .btn-outline-sage:hover {
            background: var(--sage);
            color: #fff;
        }

        /* ── CARDS ── */
        .recipe-card {
            background: var(--warm-white);
            border: 1px solid #EDE0D0;
            border-radius: 4px;
            overflow: hidden;
            transition: box-shadow 0.25s, transform 0.25s;
            height: 100%;
        }
        .recipe-card:hover {
            box-shadow: 0 12px 40px rgba(61,43,31,0.12);
            transform: translateY(-4px);
        }
        .recipe-card .card-img-wrap {
            position: relative;
            overflow: hidden;
            height: 220px;
        }
        .recipe-card .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .recipe-card:hover .card-img-wrap img {
            transform: scale(1.06);
        }
        .recipe-card .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--saffron);
            color: #fff;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 2px;
        }
        .recipe-card .card-body {
            padding: 1.25rem 1.4rem 1.4rem;
        }
        .recipe-card .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.4;
            color: var(--cocoa);
            margin-bottom: 0.5rem;
        }
        .recipe-card .card-text {
            font-size: 0.875rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        .recipe-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 400;
        }
        .recipe-meta span { display: flex; align-items: center; gap: 4px; }
        .recipe-meta i { color: var(--saffron); }

        /* ── FOOTER ── */
        footer {
            background: var(--cocoa);
            color: #C8B8AE;
            padding: 3.5rem 0 1.5rem;
        }
        footer h5 {
            font-family: 'Playfair Display', serif;
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        footer a {
            color: #C8B8AE;
            text-decoration: none;
            font-size: 0.875rem;
            display: block;
            margin-bottom: 0.4rem;
            transition: color 0.2s;
        }
        footer a:hover { color: var(--saffron-light); }
        .footer-brand {
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            color: var(--saffron-light) !important;
        }
        .footer-divider {
            border-color: rgba(255,255,255,0.1);
            margin: 2rem 0 1.2rem;
        }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.2);
            color: #C8B8AE;
            font-size: 0.9rem;
            margin-right: 0.5rem;
            transition: all 0.2s;
        }
        .footer-social a:hover {
            background: var(--saffron);
            border-color: var(--saffron);
            color: #fff;
        }

        /* ── MISC ── */
        .tag-pill {
            display: inline-block;
            background: rgba(107,127,94,0.1);
            color: var(--sage-dark);
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
            margin: 0 4px 4px 0;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .tag-pill:hover {
            background: var(--sage);
            color: #fff;
        }
        a { color: var(--saffron); }
        a:hover { color: var(--terracotta); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.6s ease both; }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        @media (max-width: 768px) {
            .navbar-brand-script { font-size: 1.5rem; }
        }
    </style>

    @yield('styles')
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand navbar-brand-script" href="{{ url('/') }}">Saffron &amp; Sage</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('recipes') ? 'active' : '' }}" href="{{ url('/recipes') }}">Recipes</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('categories') ? 'active' : '' }}" href="{{ url('/categories') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a></li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <button class="nav-search-btn"><i class="bi bi-search"></i></button>
                <a href="{{ url('/newsletter') }}" class="btn btn-saffron d-none d-lg-inline-block">Subscribe</a>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <a class="footer-brand d-block mb-2" href="{{ url('/') }}">Saffron &amp; Sage</a>
                <p style="font-size:0.875rem; line-height:1.7;">A little corner of the internet dedicated to honest, seasonal, and deeply satisfying home cooking. Pull up a chair.</p>
                <div class="footer-social mt-3">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-pinterest"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <h5>Explore</h5>
                <a href="{{ url('/recipes') }}">All Recipes</a>
                <a href="{{ url('/categories') }}">Categories</a>
                <a href="{{ url('/') }}#featured">Featured</a>
                <a href="{{ url('/about') }}">About</a>
            </div>
            <div class="col-6 col-lg-2">
                <h5>Categories</h5>
                <a href="#">Breakfast</a>
                <a href="#">Lunch</a>
                <a href="#">Dinner</a>
                <a href="#">Desserts</a>
                <a href="#">Drinks</a>
            </div>
            <div class="col-lg-4">
                <h5>Newsletter</h5>
                <p style="font-size:0.875rem;">New recipes in your inbox, every Sunday morning.</p>
                <div class="input-group mt-2">
                    <input type="email" class="form-control form-control-sm" placeholder="your@email.com" style="background:#4A3729; border-color:#6B4C3B; color:#fff;">
                    <button class="btn btn-saffron btn-sm">Join</button>
                </div>
            </div>
        </div>
        <hr class="footer-divider">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center" style="font-size:0.8rem; color:#7A6358;">
            <span>&copy; {{ date('Y') }} Saffron &amp; Sage. All rights reserved.</span>
            <span class="mt-2 mt-md-0">Made with <i class="bi bi-heart-fill" style="color:var(--terracotta);"></i> &amp; lots of butter</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>
