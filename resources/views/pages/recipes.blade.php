@extends('layouts.app')

@section('title', 'All Recipes — Saffron & Sage')

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

.filter-bar {
    background: var(--warm-white);
    border-bottom: 1px solid #EDE0D0;
    padding: 1rem 0;
    position: sticky;
    top: 65px;
    z-index: 100;
}
.filter-btn {
    background: none;
    border: 2px solid #EDE0D0;
    border-radius: 2px;
    padding: 0.4rem 1rem;
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--text-muted);
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
}
.filter-btn:hover, .filter-btn.active {
    background: var(--saffron);
    border-color: var(--saffron);
    color: #fff;
}
.filter-scroll {
    display: flex;
    gap: 0.5rem;
    overflow-x: auto;
    padding-bottom: 2px;
    scrollbar-width: none;
}
.filter-scroll::-webkit-scrollbar { display: none; }

.recipe-card { height: 100%; }
.recipe-card .card-img-wrap { height: 220px; }

.search-box {
    position: relative;
}
.search-box input {
    border: 2px solid #EDE0D0;
    border-radius: 2px;
    padding: 0.45rem 2.5rem 0.45rem 1rem;
    font-size: 0.85rem;
    color: var(--cocoa);
    background: var(--warm-white);
    width: 200px;
    transition: border-color 0.2s;
}
.search-box input:focus { outline: none; border-color: var(--saffron); }
.search-box i {
    position: absolute;
    right: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 0.9rem;
}
</style>
@endsection

@section('content')

<div class="page-hero">
    <div class="container text-center">
        <p class="section-label" style="color:var(--saffron-light);">The Collection</p>
        <h1>All Recipes</h1>
        <p>{{ count($recipes ?? []) ?: '280+' }} recipes and counting — search, filter, and find your next favourite meal.</p>
    </div>
</div>

<!-- FILTER BAR -->
<div class="filter-bar">
    <div class="container">
        <div class="d-flex align-items-center gap-3">
            <div class="filter-scroll flex-grow-1">
                @php
                $filters = ['All','Breakfast','Lunch','Dinner','Desserts','Soups','Salads','Pasta','Vegetarian','Quick','Indian','Baking'];
                @endphp
                @foreach($filters as $f)
                <button class="filter-btn {{ $loop->first ? 'active' : '' }}" onclick="filterBy(this,'{{ $f }}')">{{ $f }}</button>
                @endforeach
            </div>
            <div class="search-box d-none d-md-block">
                <input type="text" placeholder="Search recipes..." id="recipeSearch">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </div>
</div>

<!-- RECIPES GRID -->
<section style="background:var(--cream); padding: 4rem 0;">
    <div class="container">
        <div class="row g-4" id="recipesGrid">
            @php
            $allRecipes = [
                ['img'=>'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=600&q=80','cat'=>'Dinner','title'=>'Golden Butter Chicken','desc'=>'Velvety tomato sauce, fragrant spices, and tender chicken slow-simmered to perfection.','time'=>'45 min','serves'=>'4','diff'=>'Medium','slug'=>'golden-butter-chicken'],
                ['img'=>'https://images.unsplash.com/photo-1473093295043-cdd812d0e601?w=600&q=80','cat'=>'Pasta','title'=>'Lemon Ricotta Gnocchi with Brown Butter','desc'=>'Cloud-light pillows of gnocchi in nutty brown butter with fresh herbs and capers.','time'=>'40 min','serves'=>'4','diff'=>'Medium','slug'=>'lemon-ricotta-gnocchi'],
                ['img'=>'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&q=80','cat'=>'Salads','title'=>'Roasted Beet & Goat Cheese Salad','desc'=>'Jewel-toned beets, creamy goat cheese, candied walnuts on peppery arugula.','time'=>'50 min','serves'=>'2','diff'=>'Easy','slug'=>'roasted-beet-salad'],
                ['img'=>'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80','cat'=>'Desserts','title'=>'Cardamom Crème Brûlée','desc'=>'French classic elevated with green cardamom and a shard of golden caramel.','time'=>'35 min','serves'=>'4','diff'=>'Easy','slug'=>'cardamom-creme-brulee'],
                ['img'=>'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=600&q=80','cat'=>'Breakfast','title'=>'Turmeric Banana Pancakes','desc'=>'Fluffy golden pancakes with turmeric warmth, banana sweetness, and a drizzle of honey.','time'=>'20 min','serves'=>'2','diff'=>'Easy','slug'=>'turmeric-banana-pancakes'],
                ['img'=>'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600&q=80','cat'=>'Dinner','title'=>'Smoky Chorizo Smash Burgers','desc'=>'Double-smashed patties with chorizo crumble, pickled jalapeños, and secret sauce.','time'=>'25 min','serves'=>'2','diff'=>'Easy','slug'=>'chorizo-smash-burgers'],
                ['img'=>'https://images.unsplash.com/photo-1574484284002-952d92456975?w=600&q=80','cat'=>'Soups','title'=>'Spiced Carrot & Ginger Soup','desc'=>'Velvety blended soup with roasted carrots, fresh ginger, and coconut milk.','time'=>'35 min','serves'=>'4','diff'=>'Easy','slug'=>'carrot-ginger-soup'],
                ['img'=>'https://images.unsplash.com/photo-1551024506-0bccd828d307?w=600&q=80','cat'=>'Desserts','title'=>'Mango Saffron Panna Cotta','desc'=>'Silky Italian cream dessert perfumed with saffron, crowned with fresh mango coulis.','time'=>'15 min','serves'=>'6','diff'=>'Easy','slug'=>'mango-saffron-panna-cotta'],
                ['img'=>'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=600&q=80','cat'=>'Breakfast','title'=>'Masala French Toast with Chai Cream','desc'=>'A desi twist — spiced egg custard, crispy edges, chai-infused whipped cream.','time'=>'20 min','serves'=>'2','diff'=>'Easy','slug'=>'masala-french-toast'],
                ['img'=>'https://images.unsplash.com/photo-1559847844-5315695dadae?w=600&q=80','cat'=>'Indian','title'=>'Dal Makhani with Charred Naan','desc'=>'Black lentils slow-cooked overnight, finished with butter and cream. Deeply satisfying.','time'=>'8 hrs','serves'=>'6','diff'=>'Medium','slug'=>'dal-makhani'],
                ['img'=>'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=600&q=80','cat'=>'Baking','title'=>'Tahini Chocolate Chip Cookies','desc'=>'Chewy, golden-edged cookies with nutty tahini depth and pools of dark chocolate.','time'=>'25 min','serves'=>'24','diff'=>'Easy','slug'=>'tahini-choc-chip-cookies'],
                ['img'=>'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=600&q=80','cat'=>'Pasta','title'=>'Nduja Rigatoni all\'Arrabbiata','desc'=>'Spicy Calabrian spreadable salami melted into a fiery tomato sauce with rigatoni.','time'=>'30 min','serves'=>'4','diff'=>'Easy','slug'=>'nduja-rigatoni'],
            ];
            @endphp

            @foreach($allRecipes as $r)
            <div class="col-md-6 col-lg-4 recipe-item" data-cat="{{ $r['cat'] }}" data-title="{{ strtolower($r['title']) }}">
                <div class="recipe-card">
                    <div class="card-img-wrap">
                        <img src="{{ $r['img'] }}" alt="{{ $r['title'] }}" loading="lazy">
                        <span class="card-badge">{{ $r['cat'] }}</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $r['title'] }}</h3>
                        <p class="card-text">{{ $r['desc'] }}</p>
                        <div class="recipe-meta mb-3">
                            <span><i class="bi bi-clock"></i> {{ $r['time'] }}</span>
                            <span><i class="bi bi-people"></i> {{ $r['serves'] }}</span>
                            <span><i class="bi bi-bar-chart"></i> {{ $r['diff'] }}</span>
                        </div>
                        <a href="{{ url('/recipes/'.$r['slug']) }}" class="btn btn-saffron btn-sm w-100">View Recipe</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-sage px-5 py-2">Load More Recipes</button>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
function filterBy(btn, cat) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.recipe-item').forEach(item => {
        if (cat === 'All' || item.dataset.cat === cat) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}
document.getElementById('recipeSearch').addEventListener('input', function() {
    const q = this.value.toLowerCase();
    document.querySelectorAll('.recipe-item').forEach(item => {
        item.style.display = item.dataset.title.includes(q) ? '' : 'none';
    });
});
</script>
@endsection
