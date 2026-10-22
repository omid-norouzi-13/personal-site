<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolio_projects', function (Blueprint $table) {
            $table->string('client')->nullable()->after('source_url');
            $table->string('project_type')->nullable()->after('client');
            $table->string('project_date')->nullable()->after('project_type');
            $table->string('case_study_url')->nullable()->after('project_date');

            $table->text('highlights')->nullable();   // هر خط یک مورد
            $table->text('details')->nullable();      // پاراگراف‌ها با خط خالی جدا می‌شوند
            $table->text('features')->nullable();     // هر خط یک مورد (لیست زیر تب Details)
            $table->text('challenges')->nullable();
            $table->text('solutions')->nullable();
            $table->text('results')->nullable();

            $table->json('tech_levels')->nullable();  // {"WordPress": "95", ...}
            $table->json('gallery')->nullable();      // مسیر تصاویر گالری
        });

        $this->backfillIprocul();
    }

    public function down(): void
    {
        Schema::table('portfolio_projects', function (Blueprint $table) {
            $table->dropColumn([
                'client', 'project_type', 'project_date', 'case_study_url',
                'highlights', 'details', 'features', 'challenges', 'solutions', 'results',
                'tech_levels', 'gallery',
            ]);
        });
    }

    /**
     * محتوایی که قبلاً داخل show.blade.php برای iprocul هاردکد شده بود
     * به دیتابیس منتقل می‌شود تا با داینامیک شدن صفحه از دست نرود.
     */
    private function backfillIprocul(): void
    {
        $project = DB::table('portfolio_projects')->where('slug', 'iprocul')->first();

        if (! $project) {
            return;
        }

        // کپی تصاویر گالری قدیمی (public/assets/images/iprocul1..5.jpg) به storage
        $gallery = [];
        File::ensureDirectoryExists(storage_path('app/public/portfolio-gallery'));

        foreach (range(1, 5) as $n) {
            $source = public_path("assets/images/iprocul{$n}.jpg");

            if (File::exists($source)) {
                $target = "portfolio-gallery/iprocul{$n}.jpg";
                File::copy($source, storage_path('app/public/'.$target));
                $gallery[] = $target;
            }
        }

        DB::table('portfolio_projects')->where('id', $project->id)->update([
            'client' => 'دانشگاه کشاورزی تهران',
            'project_type' => 'خبری / فروشگاهی',
            'project_date' => '1403 / 2024',
            'highlights' => implode("\n", [
                'آنالیز و دیباگ کامل از صفر تا صد',
                'طراحی پیاده‌سازی شده توسط دکتر دلشاد',
                'درگاه پرداخت آنلاین',
                'مجوزهای لازم برای فعالیت سایت',
                'بخش خبری و فروشگاهی (WooCommerce)',
                'ریسپانسیو و بهینه‌سازی شده',
            ]),
            'details' => 'این پروژه به صورت کامل از صفر تا صد توسط شخص خودم آنالیز، دیباگ و طراحی شد. طرح انجام شده توسط دکتر مجتبی دلشاد ارائه و توسط بنده پیاده‌سازی شد.',
            'features' => implode("\n", [
                'طراحی و پیاده‌سازی کامل قالب WordPress',
                'بخش خبری با سیستم مدیریت محتوا',
                'فروشگاه آنلاین با WooCommerce',
                'درگاه پرداخت آنلاین',
                'اخذ تمام مجوزهای لازم برای فعالیت',
                'بهینه‌سازی عملکرد و سرعت سایت',
            ]),
            'challenges' => 'بزرگترین چالش این پروژه پیاده‌سازی دقیق طرح ارائه شده توسط دکتر دلشاد بود که شامل بخش‌های مختلف خبری، فروشگاهی و اطلاع‌رسانی بود. تمام قسمت‌های مهم سایت باید در یک بخش حدوداً 700 پیکسلی پیاده‌سازی و نمایش داده می‌شد.',
            'solutions' => 'تمام سناریوهای مهم در سایت برای آنلاین کردن و لحاظ کردن قابلیت‌ها به طور کامل توسط بنده ایده‌دهی و انجام شد. درگاه پرداخت، مجوزهای لازم و سیستم فروشگاهی همگی از صفر پیاده‌سازی شدند.',
            'results' => 'پروژه هم اکنون به صورت آنلاین درحال فعالیت هست و تمام بخش‌های مورد نیاز از جمله بخش خبری، فروشگاهی، درگاه پرداخت و مجوزها فعال هستند.',
            'tech_levels' => json_encode([
                'WordPress' => '95',
                'WooCommerce' => '90',
                'PHP' => '85',
                'JavaScript' => '70',
                'HTML5' => '90',
                'CSS3' => '85',
            ]),
            'gallery' => $gallery ? json_encode($gallery) : null,
            'technologies' => $project->technologies ?: json_encode(
                ['WordPress', 'WooCommerce', 'PHP', 'JavaScript', 'HTML5', 'CSS3']
            ),
        ]);
    }
};
