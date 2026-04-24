@extends('layouts.app')
@section('title', 'Home')
@section('extra-css')
<style>
    /* HERO */
    .hero{min-height:100vh;display:flex;align-items:center;padding-top:66px;position:relative;overflow:hidden;background:linear-gradient(160deg,#f8f9ff 0%,#f0f3ff 40%,#faf5ff 100%);}
    .hero::before{content:'';position:absolute;top:-100px;right:-150px;width:700px;height:700px;background:radial-gradient(circle,rgba(124,58,237,0.07) 0%,transparent 65%);pointer-events:none;}
    .hero::after{content:'';position:absolute;bottom:-80px;left:-100px;width:500px;height:500px;background:radial-gradient(circle,rgba(79,70,229,0.06) 0%,transparent 65%);pointer-events:none;}
    .hero-inner{max-width:1120px;margin:0 auto;padding:0 2rem;width:100%;position:relative;z-index:1;}
    .hero-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,0.9);border:1px solid var(--border);padding:8px 18px;border-radius:30px;font-size:0.8rem;color:var(--accent);font-weight:600;margin-bottom:2rem;box-shadow:var(--shadow-sm);}
    .hero-dot{width:7px;height:7px;background:#10b981;border-radius:50%;animation:blink 1.5s infinite;}
    @keyframes blink{0%,100%{opacity:1}50%{opacity:0.3}}
    .hero h1{font-size:clamp(2.6rem,6vw,4.4rem);font-weight:800;line-height:1.08;margin-bottom:1.5rem;letter-spacing:-1.5px;color:var(--text);}
    .hero h1 .grad{background:linear-gradient(135deg,var(--accent),var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
    .hero-sub{font-size:1.1rem;color:var(--text2);max-width:560px;margin-bottom:2.5rem;line-height:1.8;}
    .hero-btns{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:4rem;}
    .hero-stats{display:flex;gap:2.5rem;flex-wrap:wrap;}
    .stat{background:var(--surface);border:1px solid rgba(255,255,255,0.9);border-radius:var(--radius);padding:1rem 1.4rem;box-shadow:var(--shadow-sm);}
    .stat-num{font-family:'Bricolage Grotesque',sans-serif;font-size:1.7rem;font-weight:800;color:var(--accent);}
    .stat-label{font-size:0.8rem;color:var(--text3);margin-top:2px;}

    /* MARQUEE */
    .marquee-wrap{background:var(--accent);padding:14px 0;overflow:hidden;white-space:nowrap;}
    .marquee-track{display:inline-block;animation:marquee 22s linear infinite;}
    @keyframes marquee{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
    .marquee-item{display:inline-block;color:rgba(255,255,255,0.85);font-size:0.82rem;font-weight:600;letter-spacing:1px;text-transform:uppercase;padding:0 2.5rem;}
    .marquee-dot{color:rgba(255,255,255,0.4);margin:0 0.5rem;}

    /* FEATURES */
    .features-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(290px,1fr));gap:1.4rem;margin-top:3rem;}
    .feature-card{background:var(--surface);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.9);border-radius:var(--radius);padding:1.8rem;box-shadow:var(--shadow);transition:all 0.2s;}
    .feature-card:hover{transform:translateY(-5px);box-shadow:var(--shadow-lg);border-color:rgba(79,70,229,0.15);}
    .f-icon{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:1rem;}
    .f-icon.purple{background:var(--accent-light);}
    .f-icon.green{background:var(--green-light);}
    .f-icon.blue{background:#dbeafe;}
    .f-title{font-family:'Bricolage Grotesque',sans-serif;font-size:1rem;font-weight:700;margin-bottom:0.5rem;}
    .f-desc{color:var(--text2);font-size:0.88rem;line-height:1.7;}

    /* SERVICES STRIP */
    .services-strip{background:linear-gradient(135deg,#1e1b4b 0%,#312e81 100%);padding:100px 0;}
    .services-strip .section{padding-top:0;padding-bottom:0;}
    .services-strip .section-tag{background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.8);}
    .services-strip .section-title{color:#fff;}
    .services-strip .section-sub{color:rgba(255,255,255,0.55);}
    .svc-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.2rem;margin-top:3rem;}
    .svc-card{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:var(--radius);padding:1.6rem;transition:all 0.2s;}
    .svc-card:hover{background:rgba(255,255,255,0.1);transform:translateY(-3px);}
    .svc-icon{font-size:1.8rem;margin-bottom:0.8rem;}
    .svc-name{font-family:'Bricolage Grotesque',sans-serif;font-weight:700;color:#fff;margin-bottom:0.4rem;}
    .svc-price{font-size:0.82rem;color:rgba(255,255,255,0.45);margin-bottom:0.6rem;}
    .svc-desc{color:rgba(255,255,255,0.5);font-size:0.85rem;line-height:1.6;}

    /* CTA BAND */
    .cta-band{background:linear-gradient(135deg,var(--accent-light) 0%,#faf5ff 100%);border-top:1px solid var(--border);border-bottom:1px solid var(--border);padding:90px 2rem;text-align:center;}
    .cta-band h2{font-size:clamp(1.8rem,3.5vw,2.6rem);font-weight:800;margin-bottom:1rem;}
    .cta-band p{color:var(--text2);margin-bottom:2rem;}

    @media(max-width:600px){.hero-stats{gap:1rem;}.hero-btns{flex-direction:column;}}
</style>
@endsection
@section('content')

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div class="hero-badge"><div class="hero-dot"></div> Pakistan's AI-First Web Agency — Lahore</div>
    <h1>Websites That<br>Work <span class="grad">While You Sleep</span></h1>
    <p class="hero-sub">We help Pakistani SMEs go online with AI-powered websites, Laravel development, and smart marketing — delivered in days, priced in PKR.</p>
    <div class="hero-btns">
      <a href="/services" class="btn btn-primary">View Packages & Pricing</a>
      <a href="/contact" class="btn btn-outline">Free Consultation</a>
    </div>
    <div class="hero-stats">
      <div class="stat"><div class="stat-num">50+</div><div class="stat-label">Projects Delivered</div></div>
      <div class="stat"><div class="stat-num">5.2M</div><div class="stat-label">SMEs in Pakistan</div></div>
      <div class="stat"><div class="stat-num">3x</div><div class="stat-label">Faster with AI</div></div>
      <div class="stat"><div class="stat-num">24/7</div><div class="stat-label">WhatsApp Support</div></div>
    </div>
  </div>
</section>

<!-- MARQUEE -->
<div class="marquee-wrap">
  <div class="marquee-track">
    <span class="marquee-item">AI Web Design<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Laravel Development<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">SEO Pakistan<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">SmartBot AI<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Digital Marketing<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">JazzCash Integration<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Urdu + English<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Mobile Responsive<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">AI Web Design<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Laravel Development<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">SEO Pakistan<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">SmartBot AI<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Digital Marketing<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">JazzCash Integration<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Urdu + English<span class="marquee-dot">✦</span></span>
    <span class="marquee-item">Mobile Responsive<span class="marquee-dot">✦</span></span>
  </div>
</div>

<!-- WHY US -->
<section style="background:linear-gradient(180deg,#f8f9ff 0%,#ffffff 100%);padding:100px 0;">
  <div class="section" style="padding-top:0;padding-bottom:0;">
    <div class="section-tag">Why NeuralCraft</div>
    <h2 class="section-title">Built for <span>Pakistani</span> Businesses</h2>
    <p class="section-sub">We understand the local market, speak your language, and build what actually works here.</p>
    <div class="features-grid">
      <div class="feature-card">
        <div class="f-icon purple">⚡</div>
        <div class="f-title">AI-Powered Speed</div>
        <div class="f-desc">Sites delivered in 5–7 days using AI tools — not 2 months. You go live fast and start getting customers faster.</div>
      </div>
      <div class="feature-card">
        <div class="f-icon green">🇵🇰</div>
        <div class="f-title">Truly Local</div>
        <div class="f-desc">JazzCash, EasyPaisa, Urdu/English support, and local SEO baked in. We know what works in Pakistan.</div>
      </div>
      <div class="feature-card">
        <div class="f-icon blue">💰</div>
        <div class="f-title">PKR Pricing</div>
        <div class="f-desc">Enterprise-quality work at SME-friendly PKR prices. Starting from PKR 35,000 with no hidden fees.</div>
      </div>
      <div class="feature-card">
        <div class="f-icon purple">🤖</div>
        <div class="f-title">SmartBot AI</div>
        <div class="f-desc">Our AI chatbot answers customer questions 24/7 on WhatsApp, captures leads, and books appointments automatically.</div>
      </div>
      <div class="feature-card">
        <div class="f-icon green">📱</div>
        <div class="f-title">Mobile First</div>
        <div class="f-desc">70% of your customers are on mobile. Every site we build is pixel-perfect on all screen sizes.</div>
      </div>
      <div class="feature-card">
        <div class="f-icon blue">🛡️</div>
        <div class="f-title">100% Transparent</div>
        <div class="f-desc">Written scope, clear timeline, fixed price. No surprises. 50% refund guarantee if you're not satisfied.</div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="services-strip">
  <div class="section">
    <div class="section-tag">Our Services</div>
    <h2 class="section-title">Everything Your Business Needs</h2>
    <p class="section-sub">From a starter website to a full AI-powered business platform.</p>
    <div class="svc-grid">
      <div class="svc-card">
        <div class="svc-icon">🌐</div>
        <div class="svc-name">AI Web Design</div>
        <div class="svc-price">From PKR 35,000</div>
        <div class="svc-desc">Modern, fast websites built with AI tools for maximum impact and minimum wait time.</div>
      </div>
      <div class="svc-card">
        <div class="svc-icon">⚙️</div>
        <div class="svc-name">Laravel Development</div>
        <div class="svc-price">From PKR 50,000</div>
        <div class="svc-desc">Custom web apps, booking systems, and business portals built on Laravel.</div>
      </div>
      <div class="svc-card">
        <div class="svc-icon">🤖</div>
        <div class="svc-name">SmartBot SaaS</div>
        <div class="svc-price">From PKR 5,000/month</div>
        <div class="svc-desc">AI chatbot for WhatsApp and your website — captures leads while you sleep.</div>
      </div>
      <div class="svc-card">
        <div class="svc-icon">🔍</div>
        <div class="svc-name">SEO + Marketing</div>
        <div class="svc-price">From PKR 15,000/month</div>
        <div class="svc-desc">Google rankings, Facebook Ads, and WhatsApp campaigns for Pakistani audiences.</div>
      </div>
    </div>
    <div style="text-align:center;margin-top:2.5rem;">
      <a href="/services" class="btn" style="background:rgba(255,255,255,0.1);color:#fff;border:1px solid rgba(255,255,255,0.2);">See All Packages & Pricing</a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta-band">
  <div class="section-tag" style="margin:0 auto 1.2rem;">Free Consultation</div>
  <h2>Ready to Take Your Business <span style="color:var(--accent)">Online?</span></h2>
  <p>No commitment. Just a free 30-minute chat about your goals.</p>
  <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
    <a href="/contact" class="btn btn-primary">Book Free Consultation</a>
    <a href="https://wa.me/923000000000" class="btn btn-outline">WhatsApp Us Now</a>
  </div>
</div>

@endsection
