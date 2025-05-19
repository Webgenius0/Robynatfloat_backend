<?php

namespace App\Http\Controllers\Web\Backend\V1\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeaturePlanController extends Controller
{
    public function index()
    {
        // dd('hi');
        $planFeatures = PlanFeature::with(['plan', 'feature'])->latest()->get();
        return view('backend.layouts.subscription.planFeature.index', compact('planFeatures'));
    }

    public function create()
    {
        $plans = Plan::all();
        $features = Feature::all();
        return view('backend.layouts.subscription.planFeature.create', compact('plans', 'features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
        'plan_name' => 'nullable|string|max:255',
        'plan_price' => 'nullable|integer',
        'plan_full_price' => 'nullable|integer',
        'description' => 'nullable|string',
        ]);
// dd($request);
        // Create or find the feature
        $feature = Feature::updateOrCreate(
            [
                'plan_name'=> $request->plan_name,
                'plan_price'=> $request->plan_price,
                'plan_full_price'=> $request->plan_full_price,
                'description' => $request->description,
                'slug' => Str::slug($request->plan_name),
            ]

);
// dd($feature);
        // Attach the feature to the plan
        PlanFeature::create([
            'plan_id' => $request->plan_id,
            'feature_id' => $feature->id,
        ]);
        // dd($feature);

        return redirect()->route('admin.subscription.featurePlan.index')->with('success', 'Feature plan added successfully.');
    }

    public function edit($id)
    {
        $planFeature = PlanFeature::findOrFail($id);
        $plans = Plan::all();
        $features = Feature::all();
        return view('backend.layouts.subscription.planFeature.edit', compact('planFeature', 'plans', 'features'));
    }

   public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'plan_id' => 'required|exists:plans,id',
        'feature_id' => 'required|exists:features,id',
        'plan_price'=> 'nullable|integer',
        'plan_full_price'=> 'nullable|integer',
        'description' => 'nullable|string',
    ]);

    // Find the PlanFeature record
    $planFeature = PlanFeature::findOrFail($id);

    // Update the plan and feature association
    $planFeature->update([
        'plan_id' => $request->plan_id,
        'feature_id' => $request->feature_id,
        'plan_price'=> $request->plan_price,
        'plan_full_price'=> $request->plan_full_price
    ]);

    // Optionally, update the feature description if provided
    if ($request->filled('description')) {
        $feature = Feature::findOrFail($request->feature_id);
        $feature->update(['description' => $request->description]);
    }

    // Redirect back with success message
    return redirect()->route('admin.subscription.featurePlan.index')->with('success', 'Feature plan updated successfully.');
}


    public function destroy($id)
    {
        $planFeature = PlanFeature::findOrFail($id);
        $planFeature->delete();

        return redirect()->route('admin.subscription.featurePlan.index')->with('success', 'Feature plan deleted successfully.');
    }
}
