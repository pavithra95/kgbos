@extends('layouts.app') {{-- or your layout file --}}

@section('content')
<div class="container">
    <h2>Add Course</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <div class="mb-3">
            <label for="course" class="form-label">Course Category</label>
            <input type="text" class="form-control @error('course') is-invalid @enderror" name="course" id="course" value="{{ old('course') }}" required>
            @error('course')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="internal" class="form-label">Internal Mark</label>
            <input type="number" class="form-control @error('internal') is-invalid @enderror" name="internal" id="internal" value="{{ old('internal') }}" required min="0" max="100">
            @error('internal')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="external" class="form-label">External Mark</label>
            <input type="number" class="form-control @error('external') is-invalid @enderror" name="external" id="external" value="{{ old('external') }}" required min="0" max="100">
            @error('external')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
