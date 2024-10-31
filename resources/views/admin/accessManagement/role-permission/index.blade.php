@extends('admin.master')

@section('main-content')
    <div class="page-content">

        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Role Permission</h5>
                <a href="{{ route('role-permission.create') }}" class="btn btn-primary">

                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    Create Permission
                </a>

            </div>
            <div class="card-body">
                <table id="example" class="table table-stiped table-hover">
                    <thead>
                        <th>Roll Name</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @forelse ($roles as $role)
                            <tr>

                                <td style="width: 10%">{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                    <span class="badge bg-primary px-3 py-2 mb-2" style="font-weight: 200 !important">{{ $permission->name }}</span>
                                    @endforeach
                                </td>

                                <td style="width: 10%">
                                    @if ($role->name !== 'Super Admin')
                                    <a href="{{ route('role-permission.edit', $role->id) }}" class="btn btn-primary  btn-sm">Edit</a>
                                    <a href="{{ route('role-permission.edit', $role->id) }}" class="btn btn-danger btn-sm mr-3">Delete</a>
                                    @endif
                                </td>

                            </tr>

                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No result found!</td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </div>
@endsection
