@extends('layouts.app')
@section('title', 'Contact')
@section('extra-css')
<style>
    .contact-grid{display:grid;grid-template-columns:1fr 1.5fr;gap:3rem;align-items:start;}
    .info-card{background:linear-gradient(135deg,var(--accent),var(--accent2));border-radius:var(--radius-lg);padding:2.5rem;color:#fff;}
    .info-card h3{font-size:1.3rem;font-weight:800;margin-bottom:0.4rem;}
    .info-card p{font-size:0.88rem;opacity:0.7;margin-bottom:2rem;}
    .info-item{display:flex;gap:12px;margin-bottom:1.5rem;align-items:flex-start;}
    .i-icon{width:38px;height:38px;background:rgba(255,255,255,0.12);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
    .i-label{font-size:0.72rem;opacity:0.6;text-transform:uppercase;letter-spacing:1px;margin-bottom:3px;}
    .i-val{font-size:0.92rem;font-weight:500;}
    .wa-btn-white{display:flex;align-items:center;gap:10px;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);border-radius:30px;padding:12px 20px;color:#fff;font-weight:600;font-size:0.88rem;margin-top:2rem;transition:background 0.2s;cursor:pointer;}
    .wa-btn-white:hover{background:rgba(255,255,255,0.2);}
    .wa-btn-white svg{width:20px;height:20px;fill:#fff;flex-shrink:0;}

    .form-card{background:var(--surface);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.9);border-radius:var(--radius-lg);padding:2.5rem;box-shadow:var(--shadow-lg);}
    .form-card h3{font-family:'Bricolage Grotesque',sans-serif;font-size:1.3rem;font-weight:800;margin-bottom:0.3rem;}
    .form-card p{color:var(--text2);font-size:0.88rem;margin-bottom:2rem;}
    .form-row{display:grid;grid-template-columns:1fr 1fr;gap:1rem;}
    .form-group{margin-bottom:1.2rem;}
    .form-group label{display:flex;justify-content:space-between;font-size:0.82rem;font-weight:600;margin-bottom:7px;color:var(--text);}
    .form-group label span{color:var(--text3);font-weight:400;font-style:italic;}
    .form-group input,.form-group textarea,.form-group select{width:100%;background:#f8f9fc;border:1.5px solid var(--border2);border-radius:10px;padding:11px 14px;color:var(--text);font-size:0.92rem;font-family:'Plus Jakarta Sans',sans-serif;outline:none;transition:border-color 0.2s,box-shadow 0.2s;}
    .form-group input:focus,.form-group textarea:focus,.form-group select:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(79,70,229,0.08);background:#fff;}
    .form-group textarea{height:115px;resize:vertical;}
    .form-group select option{background:#fff;}
    .submit-btn{width:100%;background:var(--accent);color:#fff;border:none;border-radius:30px;padding:14px;font-family:'Bricolage Grotesque',sans-serif;font-weight:700;font-size:1rem;cursor:pointer;transition:all 0.2s;margin-top:0.5rem;box-shadow:0 4px 16px rgba(79,70,229,0.3);}
    .submit-btn:hover{background:#4338ca;transform:translateY(-1px);box-shadow:0 8px 24px rgba(79,70,229,0.4);}

    @media(max-width:768px){.contact-grid{grid-template-columns:1fr;}.form-row{grid-template-columns:1fr;}}
</style>
@endsection
@section('content')

<div style="background:linear-gradient(160deg,#f8f9ff,#f0f3ff);padding:140px 2rem 60px;">
  <div style="max-width:1120px;margin:0 auto;">
    <div class="section-tag">Get In Touch</div>
    <h1 style="font-size:clamp(2rem,5vw,3.2rem);font-weight:800;margin-bottom:1rem;">Let's Build Something <span style="color:var(--accent)">Great</span></h1>
    <p style="color:var(--text2);font-size:1.05rem;max-width:520px;">Free consultation, no commitment. We reply within 24 hours — usually much faster on WhatsApp.</p>
  </div>
</div>

<div class="section" style="padding-top:60px;">
  <div class="contact-grid">
    <div>
      <div class="info-card">
        <h3>NeuralCraft</h3>
        <p>Pakistan's AI-First Web Agency</p>
        <div class="info-item"><div class="i-icon">📍</div><div><div class="i-label">Address</div><div class="i-val">Gulberg III, Lahore, Pakistan</div></div></div>
        <div class="info-item"><div class="i-icon">📞</div><div><div class="i-label">Phone / Number</div><div class="i-val">+92-300-0000000</div></div></div>
        <div class="info-item"><div class="i-icon">✉️</div><div><div class="i-label">Email</div><div class="i-val">hello@neuralcraft.pk</div></div></div>
        <div class="info-item"><div class="i-icon">🕐</div><div><div class="i-label">Working Hours</div><div class="i-val">Mon–Sat: 10 AM – 8 PM</div></div></div>
        <a href="https://wa.me/923000000000" class="wa-btn-white">
          <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          WhatsApp Karo — Abhi Message Karen
        </a>
      </div>
    </div>

    <div class="form-card">
      <h3>Send Us a Message</h3>
      <p>Hamaray sath rabta karen — apna project batayein, hum 24 ghante mein jawab denge.</p>

      @if(session('success'))
      <div style="background:#d1fae5;color:#059669;padding:1rem;border-radius:10px;margin-bottom:1rem;font-weight:600;">
          ✅ {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group"><label>Full Name <span>Pura Naam</span></label><input type="text" name="name" placeholder="Muhammad Ali" value="{{ old('name') }}"></div>
          <div class="form-group"><label>Phone <span>Number</span></label><input type="tel" name="phone" placeholder="03XX-XXXXXXX" value="{{ old('phone') }}"></div>
        </div>
        <div class="form-group"><label>Email <span>Emel</span></label><input type="email" name="email" placeholder="you@example.com" value="{{ old('email') }}"></div>
        <div class="form-group">
          <label>Service Needed <span>Kaunsi service chahiye</span></label>
          <select name="service">
            <option value="">-- Select a service --</option>
            <option {{ old('service') == 'Tier 1 — Digital Presence (PKR 35K–60K)' ? 'selected' : '' }}>Tier 1 — Digital Presence (PKR 35K–60K)</option>
            <option {{ old('service') == 'Tier 2 — Smart Business Website (PKR 80K–150K)' ? 'selected' : '' }}>Tier 2 — Smart Business Website (PKR 80K–150K)</option>
            <option {{ old('service') == 'Tier 3 — Full AI Platform (PKR 200K+)' ? 'selected' : '' }}>Tier 3 — Full AI Platform (PKR 200K+)</option>
            <option {{ old('service') == 'Monthly Retainer Plan' ? 'selected' : '' }}>Monthly Retainer Plan</option>
            <option {{ old('service') == 'SmartBot AI Chatbot' ? 'selected' : '' }}>SmartBot AI Chatbot</option>
            <option {{ old('service') == 'SEO + Digital Marketing' ? 'selected' : '' }}>SEO + Digital Marketing</option>
            <option {{ old('service') == 'Not sure — need advice' ? 'selected' : '' }}>Not sure — need advice</option>
          </select>
        </div>
        <div class="form-group"><label>Your Message <span>Paigham</span></label><textarea name="message" placeholder="Tell us about your business and what you need...">{{ old('message') }}</textarea></div>
        <button type="submit" class="submit-btn">Send Message ✓</button>
      </form>
    </div>
  </div>
</div>

@endsection
