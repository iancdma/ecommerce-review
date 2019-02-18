<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::tokensCan([
//            Admins
            'index-products' => 'Can index products',
            'store-products' => 'Can store products',
            'show-products' => 'Can show products',
            'update-products' => 'Can update products',
            'destroy-products' => 'Can destroy products',

            'index-categories' => 'Can index categories',
            'store-categories' => 'Can store categories',
            'show-categories' => 'Can show categories',
            'update-categories' => 'Can update categories',
            'destroy-categories' => 'Can destroy categories',

            'index-orders' => 'Can index orders',
            'store-orders' => 'Can store orders',
            'show-orders' => 'Can show orders',
            'update-orders' => 'Can update orders',
            'destroy-orders' => 'Can destroy orders',

            'index-users' => 'Can index users',
            'store-users' => 'Can store users',
            'show-users' => 'Can show users',
            'update-users' => 'Can update users',
            'destroy-users' => 'Can destroy users',

//            Customers
            'place-order' => 'Can place an order',
        ]);

        Passport::routes();

    }
}
