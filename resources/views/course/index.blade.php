@extends('layouts.app') {{-- or your layout file --}}

@section('content')

<h1>Course Details</h1>
<br>
<div>

    <a type="button" class="btn btn-success float-left mb-2" href="{{ route('courses.create') }}">Create</a>
</div>

<table class="table table-bordered ml-5">
    <thead>
        <tr>
            <th>Sno</th>
            <th>Course</th>
            <th>Internal</th>
            <th>External</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $key=>$course)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ $course->course }}</td>
                <td>{{ $course->internal }}</td>
                <td>{{ $course->external }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

 @stop