<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\websitelogo;
use App\Models\StaticPage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $data = websitelogo::first();
        view()->share('data', $data);

        $staticpage = StaticPage::wherenot('slug', 'about_us')->get();
        view()->share('data1',$staticpage);

        $staticpageabout = StaticPage::where('slug', 'about_us')->first();
        view()->share('data2',$staticpageabout);
    }
}
