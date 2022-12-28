<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\CompanyPolicy;
use App\Policies\DeliveryPolicy;
use App\Policies\DistrictPolicy;
use App\Policies\GradePolicy;
use App\Policies\LegalPolicy;
use App\Policies\OwnerPolicy;
use App\Policies\SettlementPolicy;
use App\Policies\TrademarkPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('operate-settlement', [SettlementPolicy::class, 'operate']);
        Gate::define('operate-legal', [LegalPolicy::class, 'operate']);
        Gate::define('operate-grade', [GradePolicy::class, 'operate']);
        Gate::define('operate-district', [DistrictPolicy::class, 'operate']);
        Gate::define('operate-shop', [ShopPolicy::class, 'operate']);
        Gate::define('operate-trademark', [TrademarkPolicy::class, 'operate']);
        Gate::define('operate-company', [CompanyPolicy::class, 'operate']);
        Gate::define('operate-owner', [OwnerPolicy::class, 'operate']);
        Gate::define('creare-delivery', [DeliveryPolicy::class, 'create']);
        Gate::define('update-delivery', [DeliveryPolicy::class, 'update']);
        Gate::define('delete-delivery', [DeliveryPolicy::class, 'delete']);
    }
}
