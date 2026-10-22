<?php

namespace App\Filament\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
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

                TextInput::make('client')
                    ->label('کارفرما')
                    ->maxLength(255),

                TextInput::make('project_type')
                    ->label('نوع پروژه')
                    ->helperText('مثلاً: خبری / فروشگاهی')
                    ->maxLength(255),

                TextInput::make('project_date')
                    ->label('تاریخ انجام پروژه')
                    ->helperText('متن آزاد؛ مثلاً: 1403 / 2024')
                    ->maxLength(255),

                TextInput::make('case_study_url')
                    ->label('لینک پرونده پروژه (PDF)')
                    ->url()
                    ->maxLength(255)
                    ->helperText('اگر خالی بماند دکمه پرونده پروژه نمایش داده نمی‌شود.'),

                Textarea::make('highlights')
                    ->label('نکات برجسته (Highlights)')
                    ->rows(5)
                    ->helperText('هر خط یک مورد.')
                    ->columnSpanFull(),

                Textarea::make('details')
                    ->label('تب DETAILS — توضیحات')
                    ->rows(4)
                    ->helperText('برای پاراگراف جدید یک خط خالی بگذار.')
                    ->columnSpanFull(),

                Textarea::make('features')
                    ->label('تب DETAILS — لیست قابلیت‌ها')
                    ->rows(5)
                    ->helperText('هر خط یک مورد.')
                    ->columnSpanFull(),

                Textarea::make('challenges')
                    ->label('تب CHALLENGES — چالش‌ها')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('solutions')
                    ->label('تب SOLUTIONS — راه‌حل‌ها')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('results')
                    ->label('تب RESULTS — نتایج')
                    ->rows(4)
                    ->columnSpanFull(),

                TagsInput::make('technologies')
                    ->label('تکنولوژی‌های استفاده‌شده')
                    ->placeholder('مثلاً Laravel')
                    ->helperText(
                        'هر تکنولوژی را وارد کن و با Enter ثبت کن.'
                    )
                    ->columnSpanFull(),

                KeyValue::make('tech_levels')
                    ->label('درصد تسلط روی هر تکنولوژی (اختیاری)')
                    ->keyLabel('نام تکنولوژی (دقیقاً مثل بالا)')
                    ->valueLabel('درصد (عدد 0 تا 100)')
                    ->helperText('فقط برای تکنولوژی‌هایی که اینجا بنویسی نوار درصد نمایش داده می‌شود.')
                    ->columnSpanFull(),

                FileUpload::make('gallery')
                    ->label('گالری تصاویر')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->disk('public')
                    ->directory('portfolio-gallery')
                    ->visibility('public')
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
