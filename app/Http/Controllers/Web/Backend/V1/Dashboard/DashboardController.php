<?php

namespace App\Http\Controllers\Web\Backend\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Models\YachtJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        //user list count
        $yachts = User::where('role_id',2)->count();
        $suppliers = User::where('role_id',3)->count();
        $crews = User::where('role_id',4)->count();
        $freelancers = User::where('role_id',5)->count();
        //jobs list information

        $jobs = YachtJob::where('status', 'active')->get();
        $activeJobs = YachtJob::where('status', 'active')->count();
        $completedJobs = YachtJob::where('status', 'completed')->count();
        $cancelledJobs = YachtJob::where('status', 'cancelled')->count();

    return view('backend.layouts.dashboard.index',compact(['yachts','suppliers','crews','freelancers','jobs','activeJobs','completedJobs','cancelledJobs']));
    }

    // public function profileEdit(){

    //     $user = Auth::user();
    //     $profile = $user->profile ?? new Profile();
    //     return view('backend.layouts.dashboard.profile.edit', compact('profile'));


    // }
}
