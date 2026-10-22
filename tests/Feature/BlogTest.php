<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    private function makePost(array $overrides = []): BlogPost
    {
        return BlogPost::create(array_merge([
            'title' => 'Sample title',
            'slug' => 'sample-title',
            'content' => '<p>Intro</p><h2>First part</h2><p>Body</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
        ], $overrides));
    }

    public function test_index_shows_only_published_posts(): void
    {
        $this->makePost(['title' => 'Visible post', 'slug' => 'visible-post']);
        $this->makePost(['title' => 'Draft post', 'slug' => 'draft-post', 'status' => 'draft']);
        $this->makePost(['title' => 'Future post', 'slug' => 'future-post', 'published_at' => now()->addDay()]);

        $this->get('/blog')
            ->assertOk()
            ->assertSee('Visible post')
            ->assertDontSee('Draft post')
            ->assertDontSee('Future post');
    }

    public function test_search_and_category_filter_work(): void
    {
        $php = BlogCategory::create(['name' => 'PHP', 'slug' => 'php']);
        $seo = BlogCategory::create(['name' => 'SEO', 'slug' => 'seo']);

        $this->makePost(['title' => 'Laravel tips', 'slug' => 'laravel-tips', 'category_id' => $php->id]);
        $this->makePost(['title' => 'Ranking tips', 'slug' => 'ranking-tips', 'category_id' => $seo->id]);

        $this->get('/blog?q=Laravel')->assertSee('Laravel tips')->assertDontSee('Ranking tips');
        $this->get('/blog?category=seo')->assertSee('Ranking tips')->assertDontSee('Laravel tips');
    }

    public function test_show_renders_content_and_table_of_contents(): void
    {
        $this->makePost();

        $this->get('/blog/sample-title')
            ->assertOk()
            ->assertSee('Sample title')
            ->assertSee('id="section-1"', false)
            ->assertSee('First part');
    }

    public function test_draft_post_returns_404(): void
    {
        $this->makePost(['slug' => 'hidden', 'status' => 'draft']);

        $this->get('/blog/hidden')->assertNotFound();
    }

    public function test_publishing_without_date_sets_published_at(): void
    {
        $post = $this->makePost(['slug' => 'no-date', 'published_at' => null]);

        $this->assertNotNull($post->fresh()->published_at);
    }

    public function test_persian_slug_is_preserved(): void
    {
        $this->assertSame('مقاله-اول-من', BlogPost::makeSlug('مقاله اول من!'));
    }
}
