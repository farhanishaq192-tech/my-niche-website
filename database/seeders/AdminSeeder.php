<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@neuralcraft.pk'],
            ['name' => 'NeuralCraft Admin', 'password' => Hash::make('admin1234')]
        );

        $packages = [
            [
                'sort_order' => 1, 'tier' => 'Tier 1', 'name' => 'Digital Presence',
                'tagline' => 'For businesses with no online presence',
                'price_min' => 35000, 'price_max' => 60000, 'delivery' => '5–7 working days',
                'is_featured' => false, 'button_text' => 'Get Started', 'is_active' => true,
                'features' => ['5-page responsive website', 'AI-powered WhatsApp chatbot (24/7 FAQ)', 'Google Maps + Google My Business setup', 'Basic SEO (meta tags, sitemap)', 'Contact form with WhatsApp notifications', 'Mobile-first design', '1 month free support'],
            ],
            [
                'sort_order' => 2, 'tier' => 'Tier 2', 'name' => 'Smart Business',
                'tagline' => 'For businesses ready to grow',
                'price_min' => 80000, 'price_max' => 150000, 'delivery' => '10–14 working days',
                'is_featured' => true, 'button_text' => 'Get Started', 'is_active' => true,
                'features' => ['Everything in Tier 1, plus:', 'Up to 15 pages', 'AI content generation (blogs, product descriptions)', 'Online booking / appointment system', 'Basic e-commerce (up to 50 products)', 'AI product recommendation widget', 'WhatsApp Business API integration', '3 months free support + monthly report'],
            ],
            [
                'sort_order' => 3, 'tier' => 'Tier 3', 'name' => 'Full AI Platform',
                'tagline' => 'Full business automation',
                'price_min' => 200000, 'price_max' => 500000, 'delivery' => '21–30 working days',
                'is_featured' => false, 'button_text' => 'Contact Us', 'is_active' => true,
                'features' => ['Everything in Tier 2, plus:', 'Full e-commerce (unlimited products)', 'AI chatbot trained on your business data', 'CRM integration (leads, follow-ups)', 'WhatsApp + Email marketing automation', 'Multi-language (Urdu + English)', 'Admin dashboard with analytics', 'JazzCash, EasyPaisa, Stripe, PayPal', '6 months support + priority response'],
            ],
        ];

        foreach ($packages as $pkg) {
            Package::firstOrCreate(['tier' => $pkg['tier']], $pkg);
        }

        $settings = [
            ['key' => 'whatsapp_number', 'label' => 'WhatsApp Number', 'group' => 'contact', 'value' => '923000000000'],
            ['key' => 'email',           'label' => 'Email Address',   'group' => 'contact', 'value' => 'hello@neuralcraft.pk'],
            ['key' => 'phone',           'label' => 'Phone Number',    'group' => 'contact', 'value' => '+92 300 0000000'],
            ['key' => 'address',         'label' => 'Address',         'group' => 'contact', 'value' => 'Lahore, Pakistan'],
            ['key' => 'hero_title',      'label' => 'Hero Title',      'group' => 'homepage', 'value' => 'AI-Powered Websites for Pakistani Businesses'],
            ['key' => 'hero_subtitle',   'label' => 'Hero Subtitle',   'group' => 'homepage', 'value' => 'We build fast, intelligent websites with WhatsApp chatbots, SEO, and AI automation — so you can focus on running your business.'],
            ['key' => 'footer_tagline',  'label' => 'Footer Tagline',  'group' => 'general',  'value' => 'Where Intelligence Meets Design'],
        ];

        foreach ($settings as $s) {
            SiteSetting::firstOrCreate(['key' => $s['key']], $s);
        }
    }
}
