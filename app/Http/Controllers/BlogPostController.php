<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BlogPostController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));
        $categorySlug = trim((string) $request->query('category', ''));

        $posts = BlogPost::query()
            ->published()
            ->with('category')
            ->when($search !== '', function ($query) use ($search) {
                $like = '%'.str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $search).'%';

                $query->where(function ($q) use ($like) {
                    $q->where('title', 'like', $like)
                        ->orWhere('excerpt', 'like', $like);
                });
            })
            ->when($categorySlug !== '', function ($query) use ($categorySlug) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
            })
            ->latestFirst()
            ->paginate(8)
            ->withQueryString();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => $this->categoriesWithCounts(),
            'totalPosts' => BlogPost::published()->count(),
            'search' => $search,
            'activeCategory' => $categorySlug,
        ]);
    }

    public function show(string $slug): View
    {
        $post = BlogPost::query()
            ->published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $rendered = $post->renderContent();

        return view('blog.show', [
            'post' => $post,
            'contentHtml' => $rendered['html'],
            'toc' => $rendered['toc'],
            'categories' => $this->categoriesWithCounts(),
            'latestPosts' => BlogPost::published()
                ->whereKeyNot($post->getKey())
                ->latestFirst()
                ->limit(3)
                ->get(),
        ]);
    }

    private function categoriesWithCounts()
    {
        return BlogCategory::query()
            ->withCount(['posts' => fn ($q) => $q->published()])
            ->orderBy('name')
            ->get()
            ->filter(fn ($category) => $category->posts_count > 0)
            ->values();
    }
}
