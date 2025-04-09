<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class ResetController extends Controller {
    public function RunMigrations() {
        try {
            Artisan::call('migrate:fresh --seed');
            Artisan::call('optimize:clear');

            return redirect()->route('login')->with('success', 'System Reset Successfully.');
        } catch (Exception $e) {
            Log::error('Migration Reset Failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'System Reset Failed.');
        }
    }
    // public function stroageLink(){
    //     Artisan::call('storage:link');
    //     return "Storage Link Created Successfully";
    // }
}
