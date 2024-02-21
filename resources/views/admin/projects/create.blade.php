@extends('layouts.admin')


@section('main-content')
<section class="container">
    <div class="row">
        <div class="d-flex justify-content-center col-12">
            <form  action="{{route('admin.projects.store')}}" method="POST">
                @csrf
                <div class="mb-4 d-flex justify-content-between" >
                    <label for="name" class="form-label">Title:</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <label for="description" class="form-label">Description:</label>
                    <textarea type="text" name="description" id="description" ></textarea>
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <label for="languages" class="form-label">Languages:</label>
                    <input type="text" name="languages" id="languages">
                </div>
                <div class="mb-4 d-flex justify-content-between">
                    <label for="repo_url" class="form-label">Repo url:</label>
                    <input type="text" name="repo_url" id="repo_url">
                </div>
               
              
                <div>
        
                    <button type="submit" class="me-3 btn btn-success">Create</button>  
                
                </div>
            </form>
        </div>
    </div>
</section>
@endsection