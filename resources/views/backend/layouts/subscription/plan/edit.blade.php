@extends('backend.app')

@section('title', 'Edit Plan')

@section('main')
<div class="app-content-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-5">
                    <h3 class="mb-0">Edit Subscription Plan</h3>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.subscription.plan.update', $plan->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="name" name="plan_type" value="{{ $plan->plan_type }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ $plan->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Plan</button>
                    <a href="{{ route('admin.subscription.plan.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
