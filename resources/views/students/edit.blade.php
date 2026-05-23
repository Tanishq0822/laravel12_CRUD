@extends('layout.app')
@section('title', 'Update students')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h2 class="text-white m-0">Add Students</h2>
            <button href="{{ route('students.index') }}" class="btn btn-outline-primary mt-2" onclick="history.back()">Back</button>
            <div class="card bg-dark text-white mt-4">
                <div class="card-body border border-light rounded">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name"
                                class="form-control bg-dark text-white @error('name') is-invalid @enderror"
                                value="{{ old('name', $student->name) }}">
                            @error('name')
                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control bg-dark text-white @error('email') is-invalid @enderror"
                                value="{{ old('email', $student->email) }}">
                            @error('email')
                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone"
                                class="form-control bg-dark text-white @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $student->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
