<?php

namespace App\Providers;

use App\View\Components\BgLogin;
use App\View\Components\BgProfile;
use App\View\Components\Favicon;
use App\View\Components\Footer;
use App\View\Components\Form\InputButton;
use App\View\Components\Form\InputCheckboxSwitch;
use App\View\Components\Form\InputDate;
use App\View\Components\Form\InputEmail;
use App\View\Components\Form\InputFileArchive;
use App\View\Components\Form\InputFileImage;
use App\View\Components\Form\InputNumber;
use App\View\Components\Form\InputPass;
use App\View\Components\Form\InputSearch;
use App\View\Components\Form\InputSelect;
use App\View\Components\Form\InputDefault;
use App\View\Components\Form\TextArea;
use App\View\Components\Header;
use App\View\Components\LoginSocial;
use App\View\Components\Logo;
use App\View\Components\LogoHeader;
use App\View\Components\Menu;
use App\View\Components\Message;
use App\View\Components\MetaConfig;
use App\View\Components\ModalDelete;
use App\View\Components\Notifications;
use App\View\Components\Pagination;
use App\View\Components\Profile;
use App\View\Components\Sidebar;
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
        Blade::component('input-pass', InputPass::class);
        Blade::component('input-default', InputDefault::class);
        Blade::component('bg-login', BgLogin::class);
        Blade::component('input-email', InputEmail::class);
        Blade::component('login-social', LoginSocial::class);
        Blade::component('meta-config', MetaConfig::class);
        Blade::component('input-number', InputNumber::class);
        Blade::component('sidebar', Sidebar::class);
        Blade::component('header', Header::class);
        Blade::component('menu', Menu::class);
        Blade::component('footer', Footer::class);
        Blade::component('notifications', Notifications::class);
        Blade::component('profile', Profile::class);
        Blade::component('pagination', Pagination::class);
        Blade::component('modal-delete', ModalDelete::class);
        Blade::component('tinymce', Tinymce::class);
        Blade::component('input-search', InputSearch::class);
        Blade::component('input-date', InputDate::class);
        Blade::component('input-select', InputSelect::class);
        Blade::component('text-area', TextArea::class);
        Blade::component('input-file-image', InputFileImage::class);
        Blade::component('message', Message::class);
        Blade::component('bg-profile', BgProfile::class);
        Blade::component('logo', Logo::class);
        Blade::component('logo-header', LogoHeader::class);
        Blade::component('input-file-archive', InputFileArchive::class);
        Blade::component('card-report-roi', CardReportRoi::class);
        Blade::component('filter-report-popup', FilterReportPopup::class);
        Blade::component('quotes', Quotes::class);
        Blade::component('favicon', Favicon::class);

        // Timezone default for timestamps
        Schema::defaultStringLength(191);
        date_default_timezone_set('America/Sao_Paulo');
    }
}
