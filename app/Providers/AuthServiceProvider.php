<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

/**
 * '1. control unit,2. spv proyek,3.manager proyek, 4.direktur proyek, 5.vendor, 6.keuangan'
 */
    /**
     * list role
     */
        public static $listRole = [
        'isTU' => 0,
        'isDirjen' => 1,
        'isEselon1'=> 2,
        'isEselon2'=> 3,
        'isEselon3'=> 4,
        'isStaff'=> 5,
    ];
    // public static $listRole = [
    //     'isControlUnit' => 1,
    //     'isSPV' => 2,
    //     'isManager'=> 3,
    //     'isDirektur'=> 4,
    //     'isVendor'=> 5,
    //     'isKeuangan'=> 6,
    // ];

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach (self::$listRole as $action => $role) {
            Gate::define(
                $action,
                function (User $user) use ($role) {
                    return (int)$user->role === (int)$role;
                }
            );
        }
    }
}
