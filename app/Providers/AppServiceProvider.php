<?php

namespace App\Providers;

use App\Repositories\API\V1\ApplyJobRepository;
use App\Repositories\API\V1\ApplyJobRepositoryInterface;
use App\Repositories\API\V1\Auth\ForgetPasswordRepository;
use App\Repositories\API\V1\Auth\ForgetPasswordRepositoryInterface;
use App\Repositories\API\V1\Auth\OTPRepository;
use App\Repositories\API\V1\Auth\OTPRepositoryInterface;
use App\Repositories\API\V1\Auth\PasswordRepository;
use App\Repositories\API\V1\Auth\PasswordRepositoryInterface;
use App\Repositories\API\V1\Auth\UserRepository;
use App\Repositories\API\V1\Auth\UserRepositoryInterface;
use App\Repositories\API\V1\Freelancer\JobApplicationRepository;
use App\Repositories\API\V1\Freelancer\JobApplicationRepositoryInterface;
use App\Repositories\API\V1\Freelancer\ProfileRepository;
use App\Repositories\API\V1\Freelancer\ProfileRepositoryInterface;
use App\Repositories\API\V1\Supplier\ServiceRepository;
use App\Repositories\API\V1\Supplier\ServiceRepositoryInterface;
use App\Repositories\API\V1\Supplier\ProductSupplierRepository;
use App\Repositories\API\V1\Supplier\ProductSupplierRepositoryInterface;
use App\Repositories\API\V1\Supplier\SupplierDashboardRepository;
use App\Repositories\API\V1\Supplier\SupplierDashboardRepositoryInterface;
use App\Repositories\API\V1\Supplier\SupplierManageOrderRepository;
use App\Repositories\API\V1\Supplier\SupplierManageOrderRepositoryInterface;
use App\Repositories\API\V1\Supplier\SupplierManageProductRepository;
use App\Repositories\API\V1\Supplier\SupplierManageProductRepositoryInterface;
use App\Repositories\API\V1\Supplier\SupplierMyJobRepository;
use App\Repositories\API\V1\Supplier\SupplierMyJobRepositoryInterface;
use App\Repositories\API\V1\Supplier\SupplierRepository as SupplierSupplierRepository;
use App\Repositories\API\V1\Supplier\SupplierRepositoryInterface as SupplierSupplierRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtCrewRepository;
use App\Repositories\API\V1\Yacht\YachtCrewRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtDashboardRepository;
use App\Repositories\API\V1\Yacht\YachtDashboardRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtFreelancerRepository;
use App\Repositories\API\V1\Yacht\YachtFreelancerRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtJobRepository;
use App\Repositories\API\V1\Yacht\YachtJobRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtManageApplicationRepository;
use App\Repositories\API\V1\Yacht\YachtManageApplicationRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtSupplierOrderRepository;
use App\Repositories\API\V1\Yacht\YachtSupplierOrderRepositoryInterface;
use App\Repositories\API\V1\Yacht\YachtSupplierRepository;
use App\Repositories\API\V1\Yacht\YachtSupplierRepositoryInterface;
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

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
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

        //Api
//Yacht Api
$this->app->bind(YachtJobRepositoryInterface::class, YachtJobRepository::class);
$this->app->bind(YachtSupplierRepositoryInterface::class, YachtSupplierRepository::class);
$this->app->bind(YachtSupplierOrderRepositoryInterface::class, YachtSupplierOrderRepository::class);
$this->app->bind(YachtCrewRepositoryInterface::class, YachtCrewRepository::class);
$this->app->bind(YachtFreelancerRepositoryInterface::class, YachtFreelancerRepository::class);
$this->app->bind(YachtDashboardRepositoryInterface::class, YachtDashboardRepository::class);
$this->app->bind(YachtManageApplicationRepositoryInterface::class, YachtManageApplicationRepository::class);

//Supplier Api

$this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
$this->app->bind(ProductSupplierRepositoryInterface::class, ProductSupplierRepository::class);
$this->app->bind(SupplierManageProductRepositoryInterface::class, SupplierManageProductRepository::class);
$this->app->bind(SupplierManageOrderRepositoryInterface::class, SupplierManageOrderRepository::class);
$this->app->bind(SupplierDashboardRepositoryInterface::class, SupplierDashboardRepository::class);
$this->app->bind(SupplierMyJobRepositoryInterface::class, SupplierMyJobRepository::class);
$this->app->bind(ApplyJobRepositoryInterface::class, ApplyJobRepository::class);
//Crew Api



//Freelancer Api
$this->app->bind(ProfileRepositoryInterface::class, ProfileRepository::class);
// Job Application Freelancer
$this->app->bind(JobApplicationRepositoryInterface::class, JobApplicationRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }
}
