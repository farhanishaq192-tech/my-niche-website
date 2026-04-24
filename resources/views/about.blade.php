@extends('layouts.app')
@section('title', 'About Us')
@section('extra-css')
<style>
    .about-grid{display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;margin-top:3rem;}
    .about-text h2{font-size:clamp(1.7rem,4vw,2.2rem);font-weight:800;margin-bottom:1rem;}
    .about-text h2 span{color:var(--accent);}
    .about-text p{color:var(--text2);line-height:1.8;margin-bottom:1rem;font-size:0.97rem;}
    .stats-box{background:var(--surface);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.9);border-radius:var(--radius-lg);padding:2.5rem;box-shadow:var(--shadow-lg);}
    .stat-row{display:flex;align-items:center;gap:1rem;padding:1rem 0;border-bottom:1px solid var(--border2);}
    .stat-row:last-child{border-bottom:none;padding-bottom:0;}
    .stat-icon{width:42px;height:42px;background:var(--accent-light);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0;}
    .stat-val{font-family:'Bricolage Grotesque',sans-serif;font-size:1.4rem;font-weight:800;color:var(--accent);}
    .stat-lbl{font-size:0.82rem;color:var(--text3);}
    .mission-box{background:linear-gradient(135deg,var(--accent),var(--accent2));border-radius:var(--radius-lg);padding:2.5rem;color:#fff;margin-top:3rem;}
    .mission-box h3{font-size:0.8rem;font-weight:700;margin-bottom:1rem;opacity:0.8;letter-spacing:0.5px;text-transform:uppercase;}
    .mission-box p{font-size:1.05rem;line-height:1.8;font-weight:400;}
    .values-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.2rem;margin-top:3rem;}
    .val-card{background:var(--surface);border:1px solid rgba(255,255,255,0.9);border-radius:var(--radius);padding:1.5rem;box-shadow:var(--shadow);text-align:center;}
    .val-icon{font-size:1.8rem;margin-bottom:0.8rem;}
    .val-title{font-family:'Bricolage Grotesque',sans-serif;font-weight:700;margin-bottom:0.4rem;font-size:0.95rem;}
    .val-desc{color:var(--text2);font-size:0.84rem;line-height:1.6;}
    @media(max-width:768px){.about-grid{grid-template-columns:1fr;gap:2rem;}}
</style>
@endsection
@section('content')

<div style="background:linear-gradient(160deg,#f8f9ff 0%,#f0f3ff 100%);padding:140px 2rem 60px;">
  <div style="max-width:1120px;margin:0 auto;">
    <div class="section-tag">About NeuralCraft</div>
    <h1 style="font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem;">Pakistan's <span style="color:var(--accent)">AI-First</span> Web Agency</h1>
    <p style="color:var(--text2);font-size:1.1rem;max-width:560px;">"Where Intelligence Meets Design" — Born in Lahore, built for every Pakistani business that deserves to win online.</p>
  </div>
</div>

<div style="background:#fff;padding:80px 0;">
  <div class="section" style="padding-top:0;padding-bottom:0;">
    <div class="about-grid">
      <div class="about-text">
        <h2>Our <span>Story</span></h2>
        <p>NeuralCraft was founded with one mission: to make cutting-edge AI-powered digital solutions affordable and accessible for Pakistani businesses — helping them compete locally and globally through smarter websites and intelligent marketing.</p>
        <p>We saw 5.2 million Pakistani SMEs with less than 7% having proper digital presence. That's not a problem — that's an opportunity. We combine AI tools with expert Laravel development to deliver enterprise-quality results at PKR prices.</p>
        <p>Our vision: to become Pakistan's most trusted AI web agency by 2028, powering 1,000+ businesses with technology that works while they sleep.</p>
        <a href="/contact" class="btn btn-primary" style="margin-top:1.2rem;">Start Your Project</a>
      </div>
      <div>
        <div class="stats-box">
          <div class="stat-row"><div class="stat-icon">🚀</div><div><div class="stat-val">50+</div><div class="stat-lbl">Projects Successfully Delivered</div></div></div>
          <div class="stat-row"><div class="stat-icon">😊</div><div><div class="stat-val">30+</div><div class="stat-lbl">Happy Pakistani Clients</div></div></div>
          <div class="stat-row"><div class="stat-icon">⚡</div><div><div class="stat-val">3x</div><div class="stat-lbl">Faster Delivery with AI Tools</div></div></div>
          <div class="stat-row"><div class="stat-icon">💬</div><div><div class="stat-val">24/7</div><div class="stat-lbl">WhatsApp Support Available</div></div></div>
        </div>
        <div class="mission-box">
          <h3>Our Mission</h3>
          <p>"To make cutting-edge AI-powered digital solutions affordable and accessible for Pakistani businesses — helping them compete locally and globally."</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="background:linear-gradient(180deg,#f8f9ff,#fff);padding:80px 0;">
  <div class="section" style="padding-top:0;padding-bottom:0;">
    <div class="section-tag">Core Values</div>
    <h2 class="section-title">What We <span>Stand For</span></h2>
    <p class="section-sub">These principles guide every project, every client, every line of code.</p>
    <div class="values-grid">
      <div class="val-card"><div class="val-icon">💰</div><div class="val-title">Affordability</div><div class="val-desc">Pricing in PKR, plans for every budget — no compromises on quality.</div></div>
      <div class="val-card"><div class="val-icon">⚡</div><div class="val-title">Speed</div><div class="val-desc">Websites delivered in days, not months. Time is money.</div></div>
      <div class="val-card"><div class="val-icon">🤝</div><div class="val-title">Transparency</div><div class="val-desc">No hidden fees. Clear deliverables upfront. What we say, we do.</div></div>
      <div class="val-card"><div class="val-icon">🇵🇰</div><div class="val-title">Local Understanding</div><div class="val-desc">Pakistani culture, Urdu/English, local payments — we get it.</div></div>
      <div class="val-card"><div class="val-icon">📈</div><div class="val-title">Results-First</div><div class="val-desc">Clients pay for outcomes, not just deliverables. Your growth = our success.</div></div>
    </div>
  </div>
</div>

<div style="background:linear-gradient(135deg,var(--accent-light),#faf5ff);border-top:1px solid var(--border);padding:80px 2rem;text-align:center;">
  <h2 style="font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:800;margin-bottom:1rem;">Ready to Work With Us?</h2>
  <p style="color:var(--text2);margin-bottom:2rem;">Free 30-minute consultation — no commitment required.</p>
  <a href="/contact" class="btn btn-primary">Book Free Consultation</a>
</div>

@endsection
