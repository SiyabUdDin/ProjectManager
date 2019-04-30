@extends('layouts.app')




@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
       <form method="post" action="{{route('projects.update',[$project->id])}}">
           {{csrf_field()}}

      <input type="hidden" name="_method" value="put" >
       <label for="company-name " class="col-md-2"
              style="font-weight: bold;font-size: 20px">Name</label>
               <input  name="name" type="text" class="form-control" placeholder="{{$project->name}}"><br>
    <label for="company-name " class="col-md-2"
                  style="font-weight: bold;font-size: 20px">Description</label>
     <textarea  name="description" rows="10" cols="20"
                      class="form-control" placeholder="{{$project->description}}"></textarea><br>
 <button type="submit" class="btn btn-outline-primary btn-lg btn-block col-md-3">Update</button>


       </form>









    </div>
    <div class="col-md-3">
        <h5>Actions</h5>
        <ol class="list-unstyled">
            <li><a href="/pmanager/public/projects/{{$project->id}}">View Project</a></li>
            <li><a href="/pmanager/public/projects/">All Projects</a></li>

        </ol><br><br>
        <h5>Members</h5>
    </div>

</div>








    @endsection