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
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|integer',
            'full_price' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Plan::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'monthly_price' => $request->monthly_price,
            'full_price' => $request->full_price,
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
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|integer',
            'full_price' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $plan->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'monthly_price' => $request->monthly_price,
            'full_price' => $request->full_price,
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
