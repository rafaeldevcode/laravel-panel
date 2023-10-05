<?php

namespace App\Providers;

use App\View\Components\Form\InputButton;
use App\View\Components\Form\InputCheckboxSwitch;
use App\View\Components\Form\InputFileImage;
use App\View\Components\Form\InputSearch;
use App\View\Components\Form\InputSelect;
use App\View\Components\Form\InputDefault;
use App\View\Components\Form\TextArea;
use App\View\Components\Tinymce;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('input-button', InputButton::class);
        Blade::component('input-checkbox-switch', InputCheckboxSwitch::class);
        Blade::component('input-default', InputDefault::class);
        Blade::component('tinymce', Tinymce::class);
        Blade::component('input-search', InputSearch::class);
        Blade::component('input-select', InputSelect::class);
        Blade::component('text-area', TextArea::class);
        Blade::component('input-file-image', InputFileImage::class);

        // Timezone default for timestamps
        Schema::defaultStringLength(191);
        date_default_timezone_set('America/Sao_Paulo');
    }
}
