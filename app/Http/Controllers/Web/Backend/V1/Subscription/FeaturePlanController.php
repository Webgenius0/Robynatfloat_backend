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
            'feature_name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
// dd($request);
        // Create or find the feature
        $feature = Feature::updateOrCreate(
            ['name' => $request->feature_name],
            ['slug' => Str::slug($request->feature_name), 'description' => $request->description]
);
// dd($feature);
        // Attach the feature to the plan
        PlanFeature::create([
            'plan_id' => $request->plan_id,
            'feature_id' => $feature->id,
        ]);

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
        'description' => 'nullable|string',
    ]);

    // Find the PlanFeature record
    $planFeature = PlanFeature::findOrFail($id);

    // Update the plan and feature association
    $planFeature->update([
        'plan_id' => $request->plan_id,
        'feature_id' => $request->feature_id,
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
