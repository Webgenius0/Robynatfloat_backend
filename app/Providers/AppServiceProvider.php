<?php

namespace App\Providers;

use App\Repositories\API\V1\Auth\ForgetPasswordRepository;
use App\Repositories\API\V1\Auth\ForgetPasswordRepositoryInterface;
use App\Repositories\API\V1\Auth\OTPRepository;
use App\Repositories\API\V1\Auth\OTPRepositoryInterface;
use App\Repositories\API\V1\Auth\PasswordRepository;
use App\Repositories\API\V1\Auth\PasswordRepositoryInterface;
use App\Repositories\API\V1\Auth\UserRepository;
use App\Repositories\API\V1\Auth\UserRepositoryInterface;
use App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitory;
use App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitoryInterface;
use App\Repositories\Web\Backend\V1\User\AdminRepository;
use App\Repositories\Web\Backend\V1\User\AdminRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\CrueRepository;
use App\Repositories\Web\Backend\V1\User\CrueRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\FreelancerRepository;
use App\Repositories\Web\Backend\V1\User\FreelancerRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\SupplierRepository;
use App\Repositories\Web\Backend\V1\User\SupplierRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\UserRepository as UserUserRepository;
use App\Repositories\Web\Backend\V1\User\UserRepositoryInterface as UserUserRepositoryInterface;
use App\Repositories\Web\Backend\V1\User\YacthRepository;
use App\Repositories\Web\Backend\V1\User\YacthRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ForgetPasswordRepositoryInterface::class, ForgetPasswordRepository::class);
        $this->app->bind(OTPRepositoryInterface::class, OTPRepository::class);
        $this->app->bind(PasswordRepositoryInterface::class, PasswordRepository::class);

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);


        // backend
        $this->app->bind(UserUserRepositoryInterface::class, UserUserRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(CrueRepositoryInterface::class, CrueRepository::class);
        $this->app->bind(FreelancerRepositoryInterface::class, FreelancerRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
        $this->app->bind(YacthRepositoryInterface::class, YacthRepository::class);

        //dropdown
        $this->app->bind(YachtTypeReopsitoryInterface::class, YachtTypeReopsitory::class);
    }

    /**F
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
