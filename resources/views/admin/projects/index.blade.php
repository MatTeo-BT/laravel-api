@extends('layouts.admin')

@section('title', 'Dashboard')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">All Projects</h1>
            </div>
            <div class="col-12 mb-3 text-end">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-info text-white">Create New Project</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Needed languages</th>
                            <th scope="col">Repository Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->languages }}</td>
                                <td><a href="{{ $project->repo_url }}" target="_blank" class="link-underline link-underline-opacity-0">{{ $project->repo_url }}</a></td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-success">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ '#modal' . $project->id}}">Delete</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'modal' . $project->id}}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel">Delete</h1>
                                                </div>
                                                <div class="modal-body">
                                                    You really want to delete the project {{ $project->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center fs-5">No projects Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection