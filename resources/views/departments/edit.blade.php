@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Department</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('departments.update', $item->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="course" class="form-label">Department Name</label>
            <input type="text" class="form-control @error('course') is-invalid @enderror" name="name" id="name" value="{{ old('name', $item->name) }}" required>
            @error('course')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

      

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
