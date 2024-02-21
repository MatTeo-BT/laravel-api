@extends('layouts.admin')


@section('main-content')
<section class="container">
    <div class="row">
        <div class="d-flex justify-content-center col-12">
            <form  action="{{route('admin.projects.update',$project)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4 d-flex justify-content-between" >
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" value="{{$project->name}}" name="name" id="name">
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <label for="description" class="form-label">Description:</label>
                    <textarea type="text" value="{{$project->description}}" name="description" id="description" ></textarea>
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <label for="languages" class="form-label">Languages:</label>
                    <input type="text" value="{{$project->languages}}" name="languages" id="languages">
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <label for="repo_url" class="form-label">Repo url:</label>
                    <input type="text" value="{{$project->repo_url}}" name="repo_url" id="repo_url">
                </div>
                
              
                <div>
                <a href="{{route('admin.projects.edit', $project->id)}}">
                    <button type="submit" class="me-3 btn btn-success">Edit</button>  
                </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection