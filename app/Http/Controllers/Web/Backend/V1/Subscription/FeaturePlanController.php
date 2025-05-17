<?php

namespace App\Http\Controllers\Web\Backend\V1\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class FeaturePlanController extends Controller

   {
    public function index()
    {
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
            'feature_id' => 'required|exists:features,id',
        ]);

        PlanFeature::create([
            'plan_id' => $request->plan_id,
            'feature_id' => $request->feature_id,
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
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'feature_id' => 'required|exists:features,id',
        ]);

        $planFeature = PlanFeature::findOrFail($id);
        $planFeature->update([
            'plan_id' => $request->plan_id,
            'feature_id' => $request->feature_id,
        ]);

        return redirect()->route('admin.subscription.featurePlan.index')->with('success', 'Feature plan updated successfully.');
    }

    public function destroy($id)
    {
        $planFeature = PlanFeature::findOrFail($id);
        $planFeature->delete();

        return redirect()->route('admin.subscription.featurePlan.index')->with('success', 'Feature plan deleted successfully.');
    }
}

