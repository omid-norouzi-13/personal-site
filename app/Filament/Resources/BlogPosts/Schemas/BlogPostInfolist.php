<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BlogPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                    ->label('عنوان مقاله'),

                TextEntry::make('slug')
                    ->label('آدرس اختصاصی'),

                TextEntry::make('category.name')
                    ->label('دسته‌بندی')
                    ->placeholder('-'),

                TextEntry::make('status')
                    ->label('وضعیت انتشار')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'پیش‌نویس',
                        'published' => 'منتشر شده',
                        default => $state,
                    })
                    ->color(fn (string $state): string => $state === 'published' ? 'success' : 'gray'),

                TextEntry::make('excerpt')
                    ->label('توضیحات کوتاه')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('content')
                    ->label('متن کامل مقاله')
                    ->html()
                    ->columnSpanFull(),

                ImageEntry::make('featured_image')
                    ->label('تصویر شاخص')
                    ->disk('public')
                    ->placeholder('-'),

                TextEntry::make('published_at')
                    ->label('تاریخ انتشار')
                    ->dateTime('Y/m/d H:i')
                    ->placeholder('-'),

                TextEntry::make('meta_title')
                    ->label('عنوان سئو')
                    ->placeholder('-'),

                TextEntry::make('meta_description')
                    ->label('توضیحات سئو')
                    ->placeholder('-')
                    ->columnSpanFull(),

                TextEntry::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime('Y/m/d H:i')
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخرین ویرایش')
                    ->dateTime('Y/m/d H:i')
                    ->placeholder('-'),
            ]);
    }
}
