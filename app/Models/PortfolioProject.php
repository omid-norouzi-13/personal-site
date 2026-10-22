<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProject extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'featured_image',
        'project_url',
        'source_url',
        'client',
        'project_type',
        'project_date',
        'case_study_url',
        'highlights',
        'details',
        'features',
        'challenges',
        'solutions',
        'results',
        'tech_levels',
        'gallery',
        'technologies',
        'status',
        'is_featured',
        'sort_order',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'technologies' => 'array',
            'tech_levels' => 'array',
            'gallery' => 'array',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    /** @return array<int, string> هر خط متن یک آیتم. */
    public static function lines(?string $text): array
    {
        return array_values(array_filter(
            array_map('trim', preg_split('/\R/u', (string) $text) ?: []),
            fn ($line) => $line !== ''
        ));
    }

    /** @return array<int, string> هر پاراگراف (جداشده با خط خالی) یک آیتم. */
    public static function paragraphs(?string $text): array
    {
        return array_values(array_filter(
            array_map('trim', preg_split('/\R{2,}/u', (string) $text) ?: []),
            fn ($paragraph) => $paragraph !== ''
        ));
    }
}
