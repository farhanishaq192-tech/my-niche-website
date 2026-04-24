@extends('layouts.app')
@section('title', 'Services')
@section('extra-css')
<style>
    /* ── Pricing Cards ── */
    .pkg-grid{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:0;
      margin-top:3.5rem;
      align-items:stretch;
    }
    @media(max-width:900px){.pkg-grid{grid-template-columns:1fr;gap:1.5rem;}}

    .pkg{
      background:#fff;
      border:1px solid #e8eaf6;
      padding:2.5rem 2rem 2rem;
      position:relative;
      display:flex;
      flex-direction:column;
      transition:all 0.25s;
    }
    .pkg:first-child{border-radius:20px 0 0 20px;}
    .pkg:last-child{border-radius:0 20px 20px 0;}
    @media(max-width:900px){
      .pkg:first-child,.pkg:last-child{border-radius:20px;}
      .pkg.featured{border-radius:20px!important;}
    }
    .pkg:hover{z-index:1;box-shadow:0 20px 60px rgba(79,70,229,0.12);}

    .pkg.featured{
      background:linear-gradient(160deg,#4f46e5 0%,#6d28d9 100%);
      border:none;
      border-radius:20px!important;
      margin:-20px 0;
      padding:3rem 2rem 2.5rem;
      z-index:2;
      box-shadow:0 24px 64px rgba(79,70,229,0.35);
      color:#fff;
    }
    .pkg.featured:hover{box-shadow:0 32px 80px rgba(79,70,229,0.45);transform:translateY(-4px);}

    .pkg-badge{
      position:absolute;top:20px;right:20px;
      background:rgba(255,255,255,0.2);
      color:#fff;
      font-size:0.68rem;font-weight:700;
      padding:4px 12px;border-radius:20px;
      white-space:nowrap;letter-spacing:0.8px;
      text-transform:uppercase;
      backdrop-filter:blur(8px);
      border:1px solid rgba(255,255,255,0.3);
    }

    .pkg-tier{
      font-size:0.68rem;font-weight:700;letter-spacing:2px;
      text-transform:uppercase;color:var(--accent);
      margin-bottom:0.6rem;
    }
    .pkg.featured .pkg-tier{color:rgba(255,255,255,0.6);}

    .pkg-name{
      font-family:'Bricolage Grotesque',sans-serif;
      font-size:1.5rem;font-weight:800;
      color:var(--text);margin-bottom:0.25rem;
    }
    .pkg.featured .pkg-name{color:#fff;}

    .pkg-tagline{
      color:var(--text3);font-size:0.83rem;
      margin-bottom:1.8rem;line-height:1.5;
    }
    .pkg.featured .pkg-tagline{color:rgba(255,255,255,0.65);}

    .pkg-price-block{
      padding:1.2rem 0;
      border-top:1px solid var(--border2);
      border-bottom:1px solid var(--border2);
      margin-bottom:1.4rem;
    }
    .pkg.featured .pkg-price-block{
      border-color:rgba(255,255,255,0.15);
    }
    .pkg-price{
      font-family:'Bricolage Grotesque',sans-serif;
      font-size:1.15rem;font-weight:800;
      color:var(--text);line-height:1.2;
      white-space:nowrap;
    }
    .pkg.featured .pkg-price{color:#fff;}
    .pkg-price span{font-size:0.78rem;font-weight:500;color:var(--text3);}
    .pkg.featured .pkg-price span{color:rgba(255,255,255,0.5);}
    .pkg-delivery{
      display:inline-flex;align-items:center;gap:5px;
      background:var(--green-light);color:var(--green);
      font-size:0.73rem;font-weight:600;
      padding:4px 10px;border-radius:20px;
      margin-top:0.7rem;
    }
    .pkg.featured .pkg-delivery{
      background:rgba(255,255,255,0.15);
      color:#fff;
    }

    .pkg-list{list-style:none;margin:0;flex:1;}
    .pkg-list li{
      padding:8px 0;font-size:0.86rem;
      color:var(--text2);
      display:flex;align-items:flex-start;gap:10px;
      border-bottom:1px solid var(--border2);
    }
    .pkg.featured .pkg-list li{color:rgba(255,255,255,0.85);border-color:rgba(255,255,255,0.1);}
    .pkg-list li:last-child{border-bottom:none;}
    .pkg-list li::before{
      content:'✓';
      color:var(--accent);font-weight:700;
      flex-shrink:0;margin-top:1px;
      width:16px;height:16px;
      background:var(--accent-light);
      border-radius:50%;
      font-size:0.62rem;
      display:flex;align-items:center;justify-content:center;
    }
    .pkg.featured .pkg-list li::before{
      background:rgba(255,255,255,0.2);color:#fff;
    }

    .pkg-btn{
      display:block;width:100%;
      padding:14px;border-radius:30px;
      text-align:center;
      font-family:'Bricolage Grotesque',sans-serif;
      font-weight:700;font-size:0.9rem;
      transition:all 0.2s;cursor:pointer;
      margin-top:1.8rem;
    }
    .pkg-btn.primary{
      background:#fff;color:var(--accent);
      box-shadow:0 4px 20px rgba(0,0,0,0.15);
    }
    .pkg-btn.primary:hover{background:#f0f0ff;transform:translateY(-2px);box-shadow:0 8px 28px rgba(0,0,0,0.18);}
    .pkg-btn.outline{
      background:transparent;color:var(--accent);
      border:1.5px solid #e0e0f0;
    }
    .pkg-btn.outline:hover{background:var(--accent-light);border-color:var(--accent);}

    /* ── Add-ons ── */
    .addons-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(230px,1fr));gap:1rem;margin-top:2rem;}
    .addon{
      background:#fff;border:1px solid #e8eaf6;
      border-radius:var(--radius);padding:1.2rem 1.5rem;
      box-shadow:var(--shadow-sm);
      display:flex;justify-content:space-between;align-items:center;gap:1rem;
      transition:all 0.2s;
    }
    .addon:hover{border-color:var(--accent);box-shadow:0 4px 16px rgba(79,70,229,0.1);transform:translateY(-2px);}
    .addon-name{font-size:0.86rem;font-weight:600;color:var(--text);}
    .addon-price{
      font-family:'Bricolage Grotesque',sans-serif;
      font-size:0.88rem;font-weight:700;
      color:var(--accent);white-space:nowrap;
      background:var(--accent-light);
      padding:3px 10px;border-radius:20px;
    }

    /* ── Retainer ── */
    .retainer-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1.5rem;margin-top:2rem;}
    .retainer{
      background:linear-gradient(135deg,#1e1b4b,#312e81);
      border-radius:var(--radius-lg);padding:2rem;color:#fff;
      transition:transform 0.2s,box-shadow 0.2s;
    }
    .retainer:hover{transform:translateY(-4px);box-shadow:0 20px 50px rgba(30,27,75,0.3);}
    .ret-plan{font-size:0.68rem;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);margin-bottom:0.4rem;}
    .ret-name{font-family:'Bricolage Grotesque',sans-serif;font-size:1.15rem;font-weight:800;margin-bottom:0.8rem;}
    .ret-price{font-family:'Bricolage Grotesque',sans-serif;font-size:1.7rem;font-weight:800;color:#a5b4fc;margin-bottom:1.2rem;}
    .ret-price span{font-size:0.8rem;font-weight:400;color:rgba(255,255,255,0.35);}
    .ret-list{list-style:none;font-size:0.84rem;color:rgba(255,255,255,0.65);}
    .ret-list li{padding:6px 0;border-bottom:1px solid rgba(255,255,255,0.07);display:flex;gap:8px;align-items:flex-start;}
    .ret-list li::before{content:'→';color:#a5b4fc;flex-shrink:0;}
    .ret-list li:last-child{border-bottom:none;}
</style>
@endsection
@section('content')

<div style="background:linear-gradient(160deg,#f8f9ff,#f0f3ff);padding:140px 2rem 60px;">
  <div style="max-width:1120px;margin:0 auto;">
    <div class="section-tag">Services & Pricing</div>
    <h1 style="font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem;">Enterprise Quality at <span style="color:var(--accent)">PKR Prices</span></h1>
    <p style="color:var(--text2);font-size:1.05rem;max-width:560px;">Transparent pricing, clear deliverables, zero hidden fees. Pick a package that fits your business.</p>
  </div>
</div>

<div class="section">
  <div class="section-tag">Website Packages</div>
  <h2 class="section-title">Choose Your <span>Plan</span></h2>
  <p class="section-sub">All packages include mobile-responsive design, WhatsApp button, and 30 days free support.</p>

  <div class="pkg-grid">
    <div class="pkg">
      <div class="pkg-tier">Tier 1</div>
      <div class="pkg-name">Digital Presence</div>
      <div class="pkg-tagline">For businesses with no online presence</div>
      <div class="pkg-price">35,000 – 60,000 <span>PKR</span></div>
      <div class="pkg-delivery">⚡ Delivered in 5–7 working days</div>
      <ul class="pkg-list">
        <li>5-page responsive website</li>
        <li>AI-powered WhatsApp chatbot (24/7 FAQ)</li>
        <li>Google Maps + Google My Business setup</li>
        <li>Basic SEO (meta tags, sitemap)</li>
        <li>Contact form with WhatsApp notifications</li>
        <li>Mobile-first design</li>
        <li>1 month free support</li>
      </ul>
      <a href="/contact" class="pkg-btn outline">Get Started</a>
    </div>

    <div class="pkg featured">
      <div class="pkg-badge">Most Popular</div>
      <div class="pkg-tier">Tier 2</div>
      <div class="pkg-name">Smart Business</div>
      <div class="pkg-tagline">For businesses ready to grow</div>
      <div class="pkg-price">80,000 – 150,000 <span>PKR</span></div>
      <div class="pkg-delivery">⚡ Delivered in 10–14 working days</div>
      <ul class="pkg-list">
        <li>Everything in Tier 1, plus:</li>
        <li>Up to 15 pages</li>
        <li>AI content generation (blogs, product descriptions)</li>
        <li>Online booking / appointment system</li>
        <li>Basic e-commerce (up to 50 products)</li>
        <li>AI product recommendation widget</li>
        <li>WhatsApp Business API integration</li>
        <li>3 months free support + monthly report</li>
      </ul>
      <a href="/contact" class="pkg-btn primary">Get Started</a>
    </div>

    <div class="pkg">
      <div class="pkg-tier">Tier 3</div>
      <div class="pkg-name">Full AI Platform</div>
      <div class="pkg-tagline">Full business automation</div>
      <div class="pkg-price">200,000 – 500,000+ <span>PKR</span></div>
      <div class="pkg-delivery">⚡ Delivered in 21–30 working days</div>
      <ul class="pkg-list">
        <li>Everything in Tier 2, plus:</li>
        <li>Full e-commerce (unlimited products)</li>
        <li>AI chatbot trained on your business data</li>
        <li>CRM integration (leads, follow-ups)</li>
        <li>WhatsApp + Email marketing automation</li>
        <li>Multi-language (Urdu + English)</li>
        <li>Admin dashboard with analytics</li>
        <li>JazzCash, EasyPaisa, Stripe, PayPal</li>
        <li>6 months support + priority response</li>
      </ul>
      <a href="/contact" class="pkg-btn outline">Contact Us</a>
    </div>
  </div>
</div>

<div style="background:#fff;padding:80px 0;">
  <div class="section" style="padding-top:0;padding-bottom:0;">
    <div class="section-tag">Monthly Plans</div>
    <h2 class="section-title">Retainer <span>Packages</span></h2>
    <p class="section-sub">Ongoing work for businesses that need continuous growth and support.</p>
    <div class="retainer-grid">
      <div class="retainer">
        <div class="ret-plan">Basic</div>
        <div class="ret-name">Basic Care</div>
        <div class="ret-price">15,000 <span>PKR/month</span></div>
        <ul class="ret-list">
          <li>Hosting + security</li>
          <li>2 content changes/month</li>
          <li>WhatsApp support</li>
        </ul>
      </div>
      <div class="retainer">
        <div class="ret-plan">Growth</div>
        <div class="ret-name">Growth Plan</div>
        <div class="ret-price">30,000 <span>PKR/month</span></div>
        <ul class="ret-list">
          <li>Everything in Basic, plus</li>
          <li>4 AI blog posts/month</li>
          <li>SEO reporting</li>
          <li>Social media design kit</li>
        </ul>
      </div>
      <div class="retainer">
        <div class="ret-plan">Full Marketing</div>
        <div class="ret-name">Full Marketing</div>
        <div class="ret-price">60,000 <span>PKR/month</span></div>
        <ul class="ret-list">
          <li>Everything in Growth, plus</li>
          <li>Google + Facebook Ads</li>
          <li>WhatsApp campaigns</li>
          <li>Monthly strategy call</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div style="background:linear-gradient(180deg,#f8f9ff,#fff);padding:80px 0;">
  <div class="section" style="padding-top:0;padding-bottom:0;">
    <div class="section-tag">Add-Ons</div>
    <h2 class="section-title">Extra <span>Services</span></h2>
    <p class="section-sub">Add individual services to any package.</p>
    <div class="addons-grid">
      <div class="addon"><span class="addon-name">Logo Design (AI-assisted)</span><span class="addon-price">8K–20K PKR</span></div>
      <div class="addon"><span class="addon-name">AI Blog Post (Urdu or English)</span><span class="addon-price">2,000 PKR</span></div>
      <div class="addon"><span class="addon-name">Google My Business Setup</span><span class="addon-price">10,000 PKR</span></div>
      <div class="addon"><span class="addon-name">Social Media Profile Design</span><span class="addon-price">15,000 PKR</span></div>
      <div class="addon"><span class="addon-name">WhatsApp Business API Setup</span><span class="addon-price">15,000 PKR</span></div>
      <div class="addon"><span class="addon-name">Website Speed Optimization</span><span class="addon-price">20,000 PKR</span></div>
      <div class="addon"><span class="addon-name">Product Photo Editing (AI)</span><span class="addon-price">500/image PKR</span></div>
      <div class="addon"><span class="addon-name">SmartBot SaaS</span><span class="addon-price">5K–25K/month</span></div>
    </div>
  </div>
</div>

<div style="background:linear-gradient(135deg,var(--accent-light),#faf5ff);border-top:1px solid var(--border);padding:80px 2rem;text-align:center;">
  <h2 style="font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:800;margin-bottom:1rem;">Not Sure Which Plan? <span style="color:var(--accent)">Let's Talk.</span></h2>
  <p style="color:var(--text2);margin-bottom:2rem;">Free 30-minute consultation — we'll recommend exactly what your business needs.</p>
  <a href="/contact" class="btn btn-primary">Book Free Consultation</a>
</div>

@endsection
