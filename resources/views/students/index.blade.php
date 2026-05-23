@extends('layout.app')
@section('title', 'students list')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4" text-white>Students List</h2>
        <a href="{{ route('students.create') }}" class="btn btn-outline-info mb-3">Add Students</a>
        @session('success')
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <strong>Success!</strong> {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession
        <table class="table table-bordered table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-warning">view</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-outline-info">Edit</a>
                            <button type="button" class="btn btn-outline-danger delete-btn"
                                data-id="{{ route('students.destroy', $student->id) }}" data-bs-toggle="modal"
                                data-bs-target="#deleteStudentModal">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No students found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-4">
            {{-- Pagination --}}
            {{ $students->links('vendor.pagination.bootstrap-5-dark') }}
        </div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border=0">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <p>Are you sure you want to delete this student?</p>
                </div>
                <div class="modal-footer border=0">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="{{ route('students.destroy', $student->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script>
        // Attach event listener to delete buttons
        document.addEventListner('DOMContentLoaded', function() {
            const DeleteButtons = document.querySelectorAll('.delete-btn');
            cons tdeleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.dataset.id;
                    deleteForm.action = `/students/${studentId}`;
                });
            });
        });
    </script> --}}

    <script>
        // Attach event listener to delete buttons
        document.addEventListener('DOMContentLoaded', function() {
                    const DeleteButtons = document.querySelectorAll('.delete-btn');
                    const deleteForm = document.getElementById('deleteForm');

                    DeleteButtons.forEach(button => {
                                button.addEventListener('click', function() {
                                            const deleteUrl = this.dataset.id;
                                            deleteForm.action = deleteUrl;
                                        });
                            });
                });
    </script>
@endsection
