<?php

namespace App\Providers;

use App\Policies\DepartmentPolicy;
use App\Policies\TaskPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Model\Task' => 'App\Policies\TaskPolicy',
        'App\Model\Department' => 'App\Policies\DepartmentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    { 
        $this->registerPolicies();

        Gate::resource('tasks', TaskPolicy::class);
        Gate::resource('departments', DepartmentPolicy::class);

        Gate::before(function($user, $ability){
            if($user->is_superadmin){
                return true;
            }
        });
    }
}
