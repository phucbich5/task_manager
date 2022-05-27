<?php

namespace App\Providers;
use App\Policies\StepsPolicy;
use App\Models\Step;
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
        Step::class => StepsPolicy::class,
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
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        Gate::define('isDeveloper', function ($user) {
            return $user->role == 'developer';
        });
        Gate::define('isVideo_editer', function ($user) {
            return $user->role == 'video_editer';
        });
        Gate::define('isDesigner', function ($user) {
            return $user->role == 'designer';
        });
        Gate::define('isContent_writer', function ($user) {
            return $user->role == 'content_writer';
        });
        Gate::define('isSeo', function ($user) {
            return $user->role == 'seo';
        });
        Gate::define('isTranslate', function ($user) {
            return $user->role == 'translate';
        });
    }
}
