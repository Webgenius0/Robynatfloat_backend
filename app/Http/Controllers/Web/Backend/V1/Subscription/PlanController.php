<?php

namespace App\Http\Controllers\Web\Backend\V1\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    public function index(){
         $plans = Plan::latest()->paginate(10);
        return view('backend.layouts.subscription.plan.index', compact('plans'));
    }

    public function create()
    {
        return view('backend.layouts.subscription.plan.create');
    }


     public function store(Request $request)
{
    $request->validate([
        'plan_type' => 'required|in:Weekly,Monthly,Yearly',
        'description' => 'nullable|string',
    ]);

    Plan::create([
        'plan_type' => $request->plan_type,
        'slug' => Str::slug($request->plan_type),
        'description' => $request->description,
    ]);

    return redirect()->route('admin.subscription.plan.index')->with('success', 'Plan created successfully!');
}

    public function edit(Plan $plan)
    {
        return view('backend.layouts.subscription.plan.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'plan_type' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $plan->update([
            'plan_type' => $request->plan_type,
            'slug' => Str::slug($request->plan_type),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.subscription.plan.index')->with('success', 'Plan updated successfully!');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('admin.subscription.plan.index')->with('success', 'Plan deleted successfully!');
    }

}
