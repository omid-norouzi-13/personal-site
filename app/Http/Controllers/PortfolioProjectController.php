<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Contracts\View\View;

class PortfolioProjectController extends Controller
{
    public function index(): View
    {
        $projects = PortfolioProject::query()
            ->where('status', 'published')
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('published_at')
            ->get();

        return view('portfolio.index', compact('projects'));
    }

    public function show(string $slug): View
    {
        $project = PortfolioProject::query()
            ->where('status', 'published')
            ->where(function ($query) {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->where('slug', $slug)
            ->firstOrFail();

        return view('portfolio.show', compact('project'));
    }
}
