@extends('backend.app')

@section('title', 'Edit Feature Plan')

@section('main')
<div class="app-content-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-5">
                    <h3 class="mb-0">Edit Feature Plan</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.subscription.featurePlan.update', $planFeature->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Plan Selection -->
                            <div class="mb-3">
                                <label for="plan" class="form-label">Select Plan</label>
                                <select name="plan_id" id="plan" class="form-control" required>
                                    @foreach($plans as $plan)
                                        <option value="{{ $plan->id }}" {{ $planFeature->plan_id == $plan->id ? 'selected' : '' }}>
                                            {{ $plan->plan_type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('plan_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Feature Selection -->
                            <div class="mb-3">
                                <label for="feature" class="form-label">Select Feature</label>
                                <select name="feature_id" id="feature" class="form-control" required>
                                    @foreach($features as $feature)
                                        <option value="{{ $feature->id }}" {{ $planFeature->feature_id == $feature->id ? 'selected' : '' }}>
                                            {{ $feature->plan_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('feature_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                        <label for="plan_price" class="form-label">Plan Price</label>
                        <input type="number" class="form-control" id="plan_price" name="plan_price" value="{{ $feature->plan_price }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="plan_full_price" class="form-label">Plan Full Price</label>
                        <input type="number" class="form-control" id="plan_full_price" name="plan_full_price" value="{{ $feature->plan_full_price }}" required>
                    </div>

                            <!-- Feature Description (Optional) -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Feature Description</label>
                                <textarea name="description" id="description" class="form-control">
                                    {{ $planFeature->feature->description ?? '' }}
                                </textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Feature Plan</button>
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
