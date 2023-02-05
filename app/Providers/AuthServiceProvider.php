<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Detailing;
use App\Models\Order;
use App\Models\Service;
use App\Policies\DetailingPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ServicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Order::class => OrderPolicy::class,
        Service::class => ServicePolicy::class,
        Detailing::class => DetailingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
