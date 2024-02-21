@extends('layouts.admin.app')

@section('title', 'All Projects')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Project {{ $project->id }}</h5>
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->name }}</h2>
                        <div class="mb-3 input-group">  
                            <label for="status" class="input-group-text">Type:</label>
                            <select class="form-select" type="text" name="type_id" id="type_id" >
                                @foreach ($types as $type)
                                    <option value="{{ old('type_id',$type->id ) }}"
                                        style="color: {{ $type->color }}" {{ $type->id == old('type_id', $type->type_id) ? 'selected' : '' }}>
                                            {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mb-3 input-group">
                                <div>
                                    @foreach ($technologies as $technology)
                                        <input class="form-check-input" type="checkbox" name="technologies[]" id="{{ $technology->id }}" value="{{ $technology->id }}"
                                        {{ in_array( $technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }}> 
                                        <label for="technologies-{{ $technology->id }}"> {{ $technology->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text"><span class="fw-bold">Needed Languages:</span> {{ $project->languages }}</p>
                        <p class="card-text">
                            <span class="fw-bold">Repository Url:</span> 
                            <a href="{{ $project->repo_url }}" target="_blank" class="link-underline link-underline-opacity-0">{{ $project->repo_url }}</a>
                        </p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection