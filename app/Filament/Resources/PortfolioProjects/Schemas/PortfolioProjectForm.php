<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('عنوان پروژه')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('آدرس اختصاصی پروژه')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->helperText(
                        'یک آدرس یکتا وارد کن؛ مثلاً my-personal-website'
                    ),

                Textarea::make('excerpt')
                    ->label('توضیحات کوتاه')
                    ->rows(3)
                    ->columnSpanFull(),

                RichEditor::make('description')
                    ->label('توضیحات کامل پروژه')
                    ->columnSpanFull(),

                FileUpload::make('featured_image')
                    ->label('تصویر شاخص پروژه')
                    ->image()
                    ->disk('public')
                    ->directory('portfolio-images')
                    ->visibility('public')
                    ->imageEditor(),

                TextInput::make('project_url')
                    ->label('آدرس سایت یا پروژه')
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://example.com'),

                TextInput::make('source_url')
                    ->label('لینک مخزن کد')
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://github.com/username/project'),

                TagsInput::make('technologies')
                    ->label('تکنولوژی‌های استفاده‌شده')
                    ->placeholder('مثلاً Laravel')
                    ->helperText(
                        'هر تکنولوژی را وارد کن و با Enter ثبت کن.'
                    )
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('وضعیت انتشار')
                    ->options([
                        'draft' => 'پیش‌نویس',
                        'published' => 'منتشر شده',
                    ])
                    ->required()
                    ->default('draft')
                    ->native(false),

                Toggle::make('is_featured')
                    ->label('نمایش به‌عنوان پروژه ویژه')
                    ->default(false),

                TextInput::make('sort_order')
                    ->label('ترتیب نمایش')
                    ->required()
                    ->numeric()
                    ->integer()
                    ->minValue(0)
                    ->default(0),

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
