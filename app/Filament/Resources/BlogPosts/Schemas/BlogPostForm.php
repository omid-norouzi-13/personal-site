<?php

namespace App\Filament\Resources\BlogPosts\Schemas;

use App\Models\BlogPost;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Set;
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
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, ?string $state, Set $set) {
                        if ($operation === 'create' && filled($state)) {
                            $set('slug', BlogPost::makeSlug($state));
                        }
                    }),

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

                Select::make('category_id')
                    ->label('دسته‌بندی')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('نام دسته‌بندی')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->label('آدرس اختصاصی')
                            ->required()
                            ->unique('blog_categories', 'slug')
                            ->maxLength(255),
                    ]),

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
                    ->helperText('اگر خالی بماند و وضعیت «منتشر شده» باشد، زمان ذخیره ثبت می‌شود.')
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