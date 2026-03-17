@extends('layouts.app')

@section('title', 'Contact — Saffron & Sage')

@section('styles')
<style>
.contact-section { background: var(--cream); padding: 5rem 0; }
.contact-form-wrap {
    background: var(--warm-white);
    border: 1px solid #EDE0D0;
    border-radius: 4px;
    padding: 2.5rem;
}
.form-label {
    font-weight: 700;
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--cocoa);
    margin-bottom: 0.4rem;
}
.form-control {
    border: 2px solid #EDE0D0;
    border-radius: 2px;
    background: var(--cream);
    color: var(--cocoa);
    padding: 0.65rem 1rem;
    font-size: 0.9rem;
    transition: border-color 0.2s;
}
.form-control:focus {
    border-color: var(--saffron);
    box-shadow: none;
    background: var(--cream);
    color: var(--cocoa);
}
.info-card {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.25rem;
    background: var(--warm-white);
    border: 1px solid #EDE0D0;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.info-icon {
    width: 42px; height: 42px;
    background: rgba(232,135,26,0.1);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: var(--saffron);
    font-size: 1.1rem;
    flex-shrink: 0;
}
</style>
@endsection

@section('content')

<div style="background:var(--cocoa); padding:4rem 0 3rem; text-align:center;">
    <p class="section-label" style="color:var(--saffron-light);">Let's Talk</p>
    <h1 style="color:#fff; font-size:clamp(2rem,4vw,3rem);">Get In Touch</h1>
    <p style="color:rgba(255,255,255,0.7); max-width:500px; margin:0 auto;">Whether it's a recipe question, collaboration enquiry, or just to say hello — I'd love to hear from you.</p>
</div>

<section class="contact-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="contact-form-wrap">
                    <h3 style="font-family:'Playfair Display',serif; font-size:1.6rem; margin-bottom:1.75rem;">Send a Message</h3>
                    <form action="{{ url('/contact') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Anjali" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Mehta">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="anjali@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select class="form-control" name="subject">
                                <option>Recipe Question</option>
                                <option>Collaboration / PR</option>
                                <option>Sponsored Content</option>
                                <option>Media Enquiry</option>
                                <option>Just Saying Hi!</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="6" placeholder="Tell me what's on your mind…" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-saffron w-100" style="padding:0.8rem;">Send Message <i class="bi bi-arrow-right ms-2"></i></button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <p class="section-label mb-4">Contact Info</p>
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-envelope"></i></div>
                    <div>
                        <div style="font-weight:700; font-size:0.85rem; color:var(--cocoa); margin-bottom:0.2rem;">Email</div>
                        <div style="font-size:0.9rem; color:var(--text-muted);">hello@saffronandsage.in</div>
                        <div style="font-size:0.78rem; color:var(--text-muted);">Replies within 48 hours</div>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-instagram"></i></div>
                    <div>
                        <div style="font-weight:700; font-size:0.85rem; color:var(--cocoa); margin-bottom:0.2rem;">Instagram</div>
                        <div style="font-size:0.9rem; color:var(--text-muted);">@saffronandsage</div>
                        <div style="font-size:0.78rem; color:var(--text-muted);">DMs open for quick questions</div>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                    <div>
                        <div style="font-weight:700; font-size:0.85rem; color:var(--cocoa); margin-bottom:0.2rem;">Based In</div>
                        <div style="font-size:0.9rem; color:var(--text-muted);">Mumbai, Maharashtra, India</div>
                    </div>
                </div>

                <div style="background:var(--warm-white); border:1px solid #EDE0D0; border-radius:4px; padding:1.5rem; margin-top:1.5rem;">
                    <p class="section-label mb-2">Collaborations</p>
                    <h4 style="font-family:'Playfair Display',serif; font-size:1.1rem; margin-bottom:0.75rem;">Work With Me</h4>
                    <p style="font-size:0.875rem; color:var(--text-muted); line-height:1.7;">I work with kitchenware brands, food producers, and travel organisations on sponsored content, recipe development, and photography. Please use the form to get in touch with your brief.</p>
                    <p style="font-size:0.78rem; color:var(--text-muted);">I only partner with brands I genuinely use and believe in.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
