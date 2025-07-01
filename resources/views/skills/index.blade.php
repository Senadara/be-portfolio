@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Skills</h1>
    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Add Skill</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Icon</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->icon }}</td>
                <td>{{ $skill->description }}</td>
                <td>
                    <a href="{{ route('skills.show', $skill) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this skill?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 