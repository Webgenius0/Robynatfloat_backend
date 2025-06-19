<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AllUserListCountController extends Controller
{
    public function getAllUserCount(){
        $yachts = User::where('role_id',2)->count();
        $suppliers = User::where('role_id',3)->count();
        $crews = User::where('role_id',4)->count();
        $freelancers = User::where('role_id',5)->count();
        return $this->success(200, 'All User Count', [
            'yachts' => $yachts,
            'suppliers' => $suppliers,
            'crews' => $crews,
            'freelancers' => $freelancers
        ]);
    }
}
