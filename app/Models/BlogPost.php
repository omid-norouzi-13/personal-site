<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class BlogPost extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category_id',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        // اگر مقاله منتشر شد ولی تاریخ انتشار خالی بود، تاریخ همین لحظه ثبت می‌شود.
        static::saving(function (BlogPost $post) {
            if ($post->status === 'published' && $post->published_at === null) {
                $post->published_at = now();
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /** فقط مقالات منتشرشده‌ای که زمان انتشارشان رسیده است. */
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function (Builder $q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /** جدیدترین مقاله اول. */
    public function scopeLatestFirst(Builder $query): Builder
    {
        return $query->orderByRaw('COALESCE(published_at, created_at) DESC');
    }

    public function getDisplayDateAttribute()
    {
        return $this->published_at ?? $this->created_at;
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->featured_image
            ? Storage::disk('public')->url($this->featured_image)
            : null;
    }

    /** زمان تقریبی مطالعه (دقیقه). */
    public function getReadingTimeAttribute(): int
    {
        $text = trim(strip_tags((string) $this->content));
        $words = $text === '' ? 0 : count(preg_split('/\s+/u', $text));

        return max(1, (int) ceil($words / 200));
    }

    /**
     * به h2 و h3 داخل متن مقاله id و کلاس می‌دهد و فهرست مطالب می‌سازد.
     *
     * @return array{html: string, toc: array<int, array{id: string, title: string, level: int}>}
     */
    public function renderContent(): array
    {
        $toc = [];
        $i = 0;

        $html = preg_replace_callback(
            '/<h([23])\b[^>]*>(.*?)<\/h\1>/is',
            function (array $m) use (&$toc, &$i) {
                $title = trim(html_entity_decode(strip_tags($m[2]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

                if ($title === '') {
                    return $m[0];
                }

                $i++;
                $id = 'section-'.$i;
                $toc[] = ['id' => $id, 'title' => $title, 'level' => (int) $m[1]];

                return '<h'.$m[1].' id="'.$id.'" class="section-heading">'.$m[2].'</h'.$m[1].'>';
            },
            (string) $this->content
        );

        return ['html' => $html ?? (string) $this->content, 'toc' => $toc];
    }

    /** ساخت اسلاگ؛ حروف فارسی هم نگه داشته می‌شوند. */
    public static function makeSlug(string $text): string
    {
        $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', mb_strtolower(trim($text)));

        return trim((string) $slug, '-');
    }
}
