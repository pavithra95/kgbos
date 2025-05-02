@extends('layouts.app') {{-- or your layout file --}}

@section('content')
<div class="container">
    <h2>Add Department</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div class="mb-3">
            <label for="course" class="form-label">Department Name</label>
            <input type="text" class="form-control @error('course') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
            @error('course')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

       

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
