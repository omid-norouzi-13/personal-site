<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

/**
 * مقالات و دسته‌بندی‌های نمونه برای تست.
 * اجرا:  php artisan db:seed --class=BlogSeeder
 * (چندبار اجرا کردنش مقاله تکراری نمی‌سازد.)
 */
class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = collect([
            'WordPress' => 'wordpress',
            'PHP' => 'php',
            'Python / Django' => 'python-django',
            'Web Development' => 'web-development',
            'SEO & Performance' => 'seo-performance',
            'Tools & Workflow' => 'tools-workflow',
        ])->map(fn ($slug, $name) => BlogCategory::updateOrCreate(
            ['slug' => $slug],
            ['name' => $name],
        ));

        $posts = [
            [
                'title' => 'How to Build a Fast WordPress Website in 2026',
                'slug' => 'how-to-build-a-fast-wordpress-website',
                'category' => 'WordPress',
                'days_ago' => 5,
                'excerpt' => 'Tips and best practices for creating high performance WordPress websites using modern tools and techniques.',
                'content' => '<p>Building a fast WordPress website is essential for better user experience, higher search rankings and more conversions.</p>'
                    .'<h2>Choose a lightweight theme</h2><p>Your theme plays a crucial role in performance. Pick a well-coded theme and avoid themes with too many built-in features.</p>'
                    .'<h2>Use fast hosting</h2><p>Look for NVMe SSD, LiteSpeed and a current PHP version.</p>'
                    .'<h2>Optimize images</h2><p>Use WebP and compress images automatically.</p>'
                    .'<h2>Cache everything you can</h2><p>A caching plugin generates static HTML and reduces server load.</p>',
            ],
            [
                'title' => 'Custom WordPress Plugin Development from Scratch',
                'slug' => 'custom-wordpress-plugin-development',
                'category' => 'PHP',
                'days_ago' => 12,
                'excerpt' => 'A complete guide to building your own WordPress plugin step by step.',
                'content' => '<p>Plugins let you add features without touching the theme.</p>'
                    .'<h2>Plugin structure</h2><p>Start with a main file, a unique prefix and a clean folder layout.</p>'
                    .'<h2>Hooks</h2><p>Actions and filters are the backbone of every plugin.</p>',
            ],
            [
                'title' => 'Getting Started with Django 5',
                'slug' => 'getting-started-with-django',
                'category' => 'Python / Django',
                'days_ago' => 20,
                'excerpt' => 'Set up your Django project and build your first app.',
                'content' => '<p>Django is a batteries-included Python framework.</p>'
                    .'<h2>Create the project</h2><p>Install Django inside a virtual environment and run startproject.</p>'
                    .'<h2>Your first app</h2><p>Create an app, add a model and register it in the admin.</p>',
            ],
            [
                'title' => '10 Advanced SEO Techniques',
                'slug' => '10-advanced-seo-techniques',
                'category' => 'SEO & Performance',
                'days_ago' => 30,
                'excerpt' => 'Improve your website ranking with these advanced SEO strategies.',
                'content' => '<p>Good SEO starts with fast, useful pages.</p>'
                    .'<h2>Structured data</h2><p>Help search engines understand your content.</p>'
                    .'<h2>Core Web Vitals</h2><p>Measure and improve loading, interactivity and layout stability.</p>',
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'title' => $post['title'],
                    'excerpt' => $post['excerpt'],
                    'content' => $post['content'],
                    'category_id' => $categories[$post['category']]->id,
                    'status' => 'published',
                    'published_at' => now()->subDays($post['days_ago']),
                ]
            );
        }
    }
}
