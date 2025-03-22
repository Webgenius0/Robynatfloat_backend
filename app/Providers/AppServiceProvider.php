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
use App\Repositories\API\V1\Service\ServiceRepository;
use App\Repositories\API\V1\Service\ServiceRepositoryInterface;
use App\Repositories\Web\Backend\V1\Blog\BlogRepository;
use App\Repositories\Web\Backend\V1\Blog\BlogRepositoryInterface;
use App\Repositories\Web\Backend\V1\Dropdown\CityRepository;
use App\Repositories\Web\Backend\V1\Dropdown\CityRepositoryInterface;
use App\Repositories\Web\Backend\V1\Dropdown\CountryRepository;
use App\Repositories\Web\Backend\V1\Dropdown\CountryRepositoryInterface;
use App\Repositories\Web\Backend\V1\Dropdown\StateRepository;
use App\Repositories\Web\Backend\V1\Dropdown\StateRepositoryInterface;
use App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitory;
use App\Repositories\Web\Backend\V1\Dropdown\YachtTypeReopsitoryInterface;
use App\Repositories\Web\Backend\V1\Setting\MailSettingRepository;
use App\Repositories\Web\Backend\V1\Setting\MailSettingRepositoryInterface;
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
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);

        //Blog
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);

        //settings
        $this->app->bind(MailSettingRepositoryInterface::class, MailSettingRepository::class);

        //Api Service Provider
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);


    }

    /**F
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
