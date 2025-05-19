@extends('backend.app')

@section('title', 'Add Feature Plan')

@push('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.css">
@endpush

@section('main')
<div class="app-content-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-5">
                    <h3 class="mb-0">Add Feature Plan</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.subscription.featurePlan.store') }}" method="POST">
                            @csrf

                            <!-- Plan Selection -->
                            <div class="mb-3">
                                <label for="plan" class="form-label">Select Plan type</label>
                                <select name="plan_id" id="plan" class="form-control" required>
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}">{{ $plan->plan_type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Feature Name -->
                            <div class="mb-3">
                                <label for="plan_name" class="form-label">Plan Name</label>
                                <input type="text" name="plan_name" id="plan_name" class="form-control" placeholder="Enter feature name" required>
                                @error('plan_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                              <div class="mb-3">
                        <label for="plan_price" class="form-label">Plan Price</label>
                        <input type="number" class="form-control" id="plan_price" name="plan_price" placeholder="Enter Plan price"  required>
                    </div>

                    <div class="mb-3">
                        <label for="plan_full_price" class="form-label">Plan Full Price</label>
                        <input type="number" class="form-control" id="plan_full_price" name="plan_full_price" placeholder="Enter Full plan price" required>
                    </div>

                            <!-- Feature Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Feature Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Feature Plan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
