@extends('layouts.app')

@section('title', 'Golden Butter Chicken — Saffron & Sage')

@section('styles')
<style>
.recipe-hero {
    position: relative;
    height: 60vh;
    min-height: 400px;
    overflow: hidden;
}
.recipe-hero img {
    width: 100%; height: 100%;
    object-fit: cover;
}
.recipe-hero .overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(61,43,31,0.85) 0%, rgba(61,43,31,0.2) 60%, transparent 100%);
}
.recipe-hero .hero-content {
    position: absolute; bottom: 0; left: 0; right: 0;
    z-index: 2; padding: 3rem 0 2.5rem;
}

.recipe-meta-bar {
    background: var(--warm-white);
    border-bottom: 1px solid #EDE0D0;
    padding: 1.25rem 0;
}
.meta-pill {
    text-align: center;
    padding: 0 1.5rem;
    border-right: 1px solid #EDE0D0;
}
.meta-pill:last-child { border-right: none; }
.meta-pill .label { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase; color: var(--text-muted); display: block; }
.meta-pill .value { font-family: 'Playfair Display', serif; font-size: 1.1rem; color: var(--cocoa); display: block; margin-top: 2px; }

.recipe-body { background: var(--cream); padding: 4rem 0; }

.ingredients-box {
    background: var(--warm-white);
    border: 1px solid #EDE0D0;
    border-radius: 4px;
    padding: 1.75rem;
}
.ingredients-box h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    margin-bottom: 1.25rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--saffron);
    display: inline-block;
}
.ingredient-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.6rem 0;
    border-bottom: 1px dashed #EDE0D0;
    font-size: 0.9rem;
}
.ingredient-item:last-child { border-bottom: none; }
.ingredient-item .qty { color: var(--saffron); font-weight: 700; }

.step-block {
    display: flex;
    gap: 1.25rem;
    margin-bottom: 2rem;
}
.step-num {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--saffron);
    color: #fff;
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-top: 3px;
}
.step-content { flex: 1; }
.step-content p { font-size: 0.95rem; line-height: 1.8; color: var(--text-body); }

.tip-box {
    background: rgba(107,127,94,0.08);
    border-left: 4px solid var(--sage);
    border-radius: 0 4px 4px 0;
    padding: 1.25rem 1.5rem;
    margin: 2rem 0;
}
.tip-box strong { color: var(--sage-dark); font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; }
.tip-box p { font-size: 0.9rem; color: var(--text-muted); margin: 0.5rem 0 0; }

.sidebar-widget {
    background: var(--warm-white);
    border: 1px solid #EDE0D0;
    border-radius: 4px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}
.sidebar-widget h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 2px solid var(--saffron);
    display: inline-block;
}

.rating-stars { color: var(--gold); font-size: 1.1rem; }
.rating-bar {
    height: 8px; border-radius: 4px;
    background: #EDE0D0;
    overflow: hidden;
    flex: 1;
}
.rating-bar-fill {
    height: 100%;
    background: var(--saffron);
    border-radius: 4px;
}

.print-btn {
    background: none;
    border: 2px solid #EDE0D0;
    border-radius: 2px;
    padding: 0.45rem 1.2rem;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--text-muted);
    cursor: pointer;
    transition: all 0.2s;
}
.print-btn:hover { border-color: var(--sage); color: var(--sage); }
</style>
@endsection

@section('content')

<!-- HERO -->
<div class="recipe-hero">
    <img src="https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=1400&q=80" alt="Golden Butter Chicken">
    <div class="overlay"></div>
    <div class="hero-content">
        <div class="container">
            <div style="font-size:0.75rem; color:rgba(255,255,255,0.6); margin-bottom:0.5rem;">
                <a href="{{ url('/') }}" style="color:rgba(255,255,255,0.6); text-decoration:none;">Home</a> &rsaquo;
                <a href="{{ url('/recipes') }}" style="color:rgba(255,255,255,0.6); text-decoration:none;">Recipes</a> &rsaquo;
                <span style="color:var(--saffron-light);">Golden Butter Chicken</span>
            </div>
            <h1 style="color:#fff; font-size:clamp(1.8rem,4vw,3rem); max-width:600px; margin-bottom:0.75rem;">Golden Butter Chicken</h1>
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="rating-stars">★★★★★</div>
                <span style="color:rgba(255,255,255,0.7); font-size:0.85rem;">4.9 · 128 reviews</span>
                <span class="tag-pill" style="background:rgba(232,135,26,0.7); color:#fff;">Dinner</span>
                <span class="tag-pill" style="background:rgba(232,135,26,0.7); color:#fff;">Indian</span>
            </div>
        </div>
    </div>
</div>

<!-- META BAR -->
<div class="recipe-meta-bar">
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="meta-pill">
                <span class="label"><i class="bi bi-clock me-1"></i>Prep Time</span>
                <span class="value">15 mins</span>
            </div>
            <div class="meta-pill">
                <span class="label"><i class="bi bi-fire me-1"></i>Cook Time</span>
                <span class="value">30 mins</span>
            </div>
            <div class="meta-pill">
                <span class="label"><i class="bi bi-clock-history me-1"></i>Total Time</span>
                <span class="value">45 mins</span>
            </div>
            <div class="meta-pill">
                <span class="label"><i class="bi bi-people me-1"></i>Servings</span>
                <span class="value">4 people</span>
            </div>
            <div class="meta-pill">
                <span class="label"><i class="bi bi-bar-chart me-1"></i>Difficulty</span>
                <span class="value">Medium</span>
            </div>
            <div class="meta-pill">
                <span class="label"><i class="bi bi-lightning me-1"></i>Calories</span>
                <span class="value">480 kcal</span>
            </div>
        </div>
    </div>
</div>

<!-- RECIPE BODY -->
<section class="recipe-body">
    <div class="container">
        <div class="row g-5">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">
                <!-- Intro -->
                <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=80&q=80" alt="Priya" style="width:44px; height:44px; border-radius:50%; object-fit:cover;">
                        <div>
                            <div style="font-weight:700; font-size:0.9rem; color:var(--cocoa);">Priya Sharma</div>
                            <div style="font-size:0.75rem; color:var(--text-muted);">Published March 12, 2025</div>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="print-btn"><i class="bi bi-printer me-1"></i>Print</button>
                        <button class="print-btn"><i class="bi bi-bookmark me-1"></i>Save</button>
                        <button class="print-btn"><i class="bi bi-share me-1"></i>Share</button>
                    </div>
                </div>

                <p style="font-size:1rem; line-height:1.85; color:var(--text-muted);">
                    This is my <strong style="color:var(--cocoa);">definitive butter chicken</strong> — the one I make when I need comfort, when guests are coming, when I want to fill the house with the smell of warming spices. The marinade is everything: thick yoghurt, bright lemon, and a careful hand with the garam masala. Then comes the sauce — silky, velvety, the colour of a winter sunset.
                </p>

                <div class="tip-box">
                    <strong>🌟 Priya's Tip</strong>
                    <p>For the most authentic flavour, use whole milk yoghurt for the marinade and let the chicken rest overnight. The longer the marinade, the deeper the flavour.</p>
                </div>

                <!-- INGREDIENTS -->
                <div class="ingredients-box mb-4">
                    <h3>Ingredients</h3>
                    <p class="section-label mb-3">For The Marinade</p>
                    @php
                    $marinade = [
                        ['qty'=>'700g','name'=>'Chicken thighs, boneless, cut into large pieces'],
                        ['qty'=>'200g','name'=>'Full-fat Greek yoghurt'],
                        ['qty'=>'2 tbsp','name'=>'Lemon juice'],
                        ['qty'=>'1 tsp','name'=>'Kashmiri chilli powder'],
                        ['qty'=>'1 tsp','name'=>'Garam masala'],
                        ['qty'=>'½ tsp','name'=>'Turmeric powder'],
                        ['qty'=>'1 tbsp','name'=>'Ginger-garlic paste'],
                    ];
                    $sauce = [
                        ['qty'=>'3 tbsp','name'=>'Unsalted butter'],
                        ['qty'=>'1 tbsp','name'=>'Neutral oil'],
                        ['qty'=>'2','name'=>'Medium onions, finely diced'],
                        ['qty'=>'400g','name'=>'Crushed tomatoes (or 4 fresh, grated)'],
                        ['qty'=>'½ cup','name'=>'Heavy cream'],
                        ['qty'=>'1 tbsp','name'=>'Kasuri methi (dried fenugreek)'],
                        ['qty'=>'1 tsp','name'=>'Honey'],
                        ['qty'=>'to taste','name'=>'Salt'],
                    ];
                    @endphp
                    @foreach($marinade as $ing)
                    <div class="ingredient-item">
                        <span>{{ $ing['name'] }}</span>
                        <span class="qty">{{ $ing['qty'] }}</span>
                    </div>
                    @endforeach
                    <p class="section-label mt-4 mb-3">For The Sauce</p>
                    @foreach($sauce as $ing)
                    <div class="ingredient-item">
                        <span>{{ $ing['name'] }}</span>
                        <span class="qty">{{ $ing['qty'] }}</span>
                    </div>
                    @endforeach
                </div>

                <!-- INSTRUCTIONS -->
                <h3 style="font-family:'Playfair Display',serif; font-size:1.75rem; margin-bottom:2rem; border-bottom: 2px solid var(--saffron); padding-bottom:0.75rem; display:inline-block;">Method</h3>
                @php
                $steps = [
                    ['title'=>'Marinate the Chicken','body'=>'Combine all marinade ingredients in a large bowl. Add the chicken pieces and coat thoroughly. Cover and refrigerate for at least 2 hours, ideally overnight. The acid and spices will tenderise and flavour the meat deeply.'],
                    ['title'=>'Char the Chicken','body'=>'Heat a heavy-bottomed pan or griddle over high heat until very hot. Cook the chicken in batches, giving each piece space, until charred and cooked through — about 5–6 minutes per side. Set aside. This char is crucial for authentic smokiness.'],
                    ['title'=>'Build the Sauce Base','body'=>'In the same pan, reduce heat to medium. Add butter and oil. Once foamy, add the diced onions with a good pinch of salt. Cook, stirring occasionally, for 12–15 minutes until deeply golden and caramelised. Do not rush this step.'],
                    ['title'=>'Add Tomatoes & Spices','body'=>'Add the crushed tomatoes, remaining Kashmiri chilli, and garam masala to the onions. Cook on medium heat, stirring frequently, until the sauce darkens and the fat separates — about 10 minutes. The mixture should look thick and glossy.'],
                    ['title'=>'Blend & Finish','body'=>'Allow the sauce to cool slightly, then blend until completely smooth. Return to the pan over gentle heat. Add the charred chicken, heavy cream, honey, and crushed kasuri methi. Simmer for 5 minutes. Adjust salt and serve.'],
                ];
                @endphp
                @foreach($steps as $i => $step)
                <div class="step-block">
                    <div class="step-num">{{ $i+1 }}</div>
                    <div class="step-content">
                        <h5 style="font-family:'Playfair Display',serif; font-size:1.1rem; margin-bottom:0.5rem;">{{ $step['title'] }}</h5>
                        <p>{{ $step['body'] }}</p>
                    </div>
                </div>
                @endforeach

                <!-- NOTES -->
                <div class="tip-box" style="border-color:var(--saffron); background:rgba(232,135,26,0.05);">
                    <strong style="color:var(--saffron);">📝 Storage & Serving Notes</strong>
                    <p>Serve with basmati rice, garlic naan, or both (always both). Butter chicken keeps well in the fridge for 3 days and improves overnight. Freeze for up to 2 months. Do not add cream before freezing — stir it in when reheating.</p>
                </div>

                <!-- TAGS -->
                <div class="mt-4">
                    <p class="section-label mb-2">Tags</p>
                    @foreach(['Indian','Chicken','Dinner','Comfort Food','Spiced','Curry','Gluten-Free'] as $tag)
                    <a href="#" class="tag-pill">{{ $tag }}</a>
                    @endforeach
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <!-- Nutrition -->
                <div class="sidebar-widget">
                    <h4>Nutrition (per serving)</h4>
                    @php
                    $nutrition = [
                        ['label'=>'Calories','val'=>'480 kcal'],
                        ['label'=>'Protein','val'=>'38g'],
                        ['label'=>'Carbohydrates','val'=>'14g'],
                        ['label'=>'Fat','val'=>'30g'],
                        ['label'=>'Saturated Fat','val'=>'14g'],
                        ['label'=>'Fibre','val'=>'2g'],
                        ['label'=>'Sodium','val'=>'620mg'],
                    ];
                    @endphp
                    @foreach($nutrition as $n)
                    <div class="d-flex justify-content-between py-2 border-bottom" style="border-color:#EDE0D0!important; font-size:0.85rem;">
                        <span style="color:var(--text-muted);">{{ $n['label'] }}</span>
                        <strong style="color:var(--cocoa);">{{ $n['val'] }}</strong>
                    </div>
                    @endforeach
                </div>

                <!-- Rating -->
                <div class="sidebar-widget">
                    <h4>Community Rating</h4>
                    <div class="d-flex align-items-baseline gap-2 mb-3">
                        <span style="font-family:'Playfair Display',serif; font-size:3rem; color:var(--cocoa); line-height:1;">4.9</span>
                        <div>
                            <div class="rating-stars">★★★★★</div>
                            <span style="font-size:0.8rem; color:var(--text-muted);">128 reviews</span>
                        </div>
                    </div>
                    @foreach([['5 stars',92],['4 stars',6],['3 stars',2],['2 stars',0],['1 star',0]] as $r)
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span style="font-size:0.75rem; min-width:50px; color:var(--text-muted);">{{ $r[0] }}</span>
                        <div class="rating-bar"><div class="rating-bar-fill" style="width:{{ $r[1] }}%;"></div></div>
                        <span style="font-size:0.75rem; min-width:30px; color:var(--text-muted);">{{ $r[1] }}%</span>
                    </div>
                    @endforeach
                </div>

                <!-- You might also like -->
                <div class="sidebar-widget">
                    <h4>You Might Also Like</h4>
                    @php
                    $related = [
                        ['img'=>'https://images.unsplash.com/photo-1574484284002-952d92456975?w=200&q=70','title'=>'Dal Makhani with Charred Naan','time'=>'8 hrs','slug'=>'dal-makhani'],
                        ['img'=>'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=200&q=70','title'=>'Coconut Lemongrass Prawn Curry','time'=>'30 min','slug'=>'coconut-lemongrass-prawn'],
                        ['img'=>'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200&q=70','title'=>'Masala French Toast with Chai Cream','time'=>'20 min','slug'=>'masala-french-toast'],
                    ];
                    @endphp
                    @foreach($related as $r)
                    <a href="{{ url('/recipes/'.$r['slug']) }}" class="d-flex gap-3 mb-3 text-decoration-none" style="color:var(--cocoa);">
                        <img src="{{ $r['img'] }}" alt="{{ $r['title'] }}" style="width:64px; height:64px; object-fit:cover; border-radius:4px; flex-shrink:0;">
                        <div>
                            <div style="font-family:'Playfair Display',serif; font-size:0.9rem; font-weight:700; line-height:1.3; margin-bottom:0.2rem;">{{ $r['title'] }}</div>
                            <div style="font-size:0.75rem; color:var(--text-muted);"><i class="bi bi-clock me-1"></i>{{ $r['time'] }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
