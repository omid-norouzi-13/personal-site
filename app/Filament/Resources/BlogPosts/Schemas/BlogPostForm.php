<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('عنوان مقاله')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('آدرس اختصاصی مقاله')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText(
                        'آدرس یکتا و ترجیحاً انگلیسی وارد کن؛ مثلاً my-first-article'
                    ),

                Textarea::make('excerpt')
                    ->label('توضیحات کوتاه')
                    ->rows(3)
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->label('متن کامل مقاله')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->label('تصویر شاخص')
                    ->image()
                    ->disk('public')
                    ->directory('blog-images')
                    ->visibility('public')
                    ->imageEditor(),

                Select::make('status')
                    ->label('وضعیت انتشار')
                    ->options([
                        'draft' => 'پیش‌نویس',
                        'published' => 'منتشر شده',
                    ])
                    ->required()
                    ->default('draft')
                    ->native(false),

                DateTimePicker::make('published_at')
                    ->label('تاریخ انتشار')
                    ->seconds(false),

                TextInput::make('meta_title')
                    ->label('عنوان سئو')
                    ->maxLength(255),

                Textarea::make('meta_description')
                    ->label('توضیحات سئو')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}