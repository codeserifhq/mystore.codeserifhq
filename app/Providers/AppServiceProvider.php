<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Department;
use App\Models\JobPosition;
use App\Models\Address;
use App\Models\Branch;
use App\Models\Company;
use App\Models\CompanyContract;
use App\Models\Contact;
use App\Models\OauthAccessToken;
use App\Models\OauthClient;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCustomProperty;
use App\Models\Role;
use App\Models\Sale;
use App\Models\StockInbound;
use App\Models\StockInboundProduct;
use App\Models\StockOutboundProduct;
use App\Models\User;


use App\Observers\SystemCodeObserver;
use App\Observers\ActivityObserver;

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
        Department::observe(SystemCodeObserver::class);
        JobPosition::observe(SystemCodeObserver::class);
        Role::observe(SystemCodeObserver::class);

        User::observe(ActivityObserver::class);
        Product::observe(ActivityObserver::class);
        Department::observe(ActivityObserver::class);
        JobPosition::observe(ActivityObserver::class);
        Address::observe(ActivityObserver::class);
        Branch::observe(ActivityObserver::class);
        Company::observe(ActivityObserver::class);
        CompanyContract::observe(ActivityObserver::class);
        Contact::observe(ActivityObserver::class);
        OauthAccessToken::observe(ActivityObserver::class);
        OauthClient::observe(ActivityObserver::class);
        Partner::observe(ActivityObserver::class);
        ProductCategory::observe(ActivityObserver::class);
        ProductCustomProperty::observe(ActivityObserver::class);
        Role::observe(ActivityObserver::class);
        Sale::observe(ActivityObserver::class);
        StockInbound::observe(ActivityObserver::class);
        StockInboundProduct::observe(ActivityObserver::class);
        StockOutboundProduct::observe(ActivityObserver::class);
    }
}
