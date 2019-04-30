@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-9">
<div class="container-fluid">
<div class="jumbotron" style="border-radius: 50px">
<h1 style="margin-left: 200px;font-size: 70px">{{$company->name}}</h1>
    <p style="margin-left: 200px">{{$company->description}}</p>
    <button class="btn btn-primary  " style="margin-left: 200px">
       Get Started Today <li class="fa fa-arrow-alt-circle-right" style="color: white"></li></button>
</div>
</div><br>
    <div class="row">
        @foreach($company->project as $project)
        <div class="col-md-4" style="margin-left: 20px">
            <h1>{{$project->name}}</h1>
                <p class="text-danger">{{$project->description}}</p>
               <a href="/pmanager/public/projects/{{$project->id}}">
                   <button class="btn btn-primary">View Project
                       <li class="fa fa-arrow-alt-circle-right" style="color: white"></li></button></a>
        </div>
        @endforeach
    </div>
    </div>
<div class="col-md-3">

    <h5>Actions</h5>
         <ol class="list-unstyled">
           <li><a href="{{$company->id}}/edit"><li class=" fa fa-edit" style="color: blue"></li> Edit</a></li>
           <li>
               <a href="#" onclick="

               var result=confirm('Are You Sure To Delete This Project..?');
               if(result){
                   event.preventDefault();
                   document.getElementById('form-deleted').submit();
               }

"><li class="" style="color: blue"></li><li class="fa fa-trash-alt" style="color: blue"></li> Delete </a> </li>
             <form id="form-deleted"
                   action="{{route('companies.destroy',['company'=>$company->id])}}" method="post">
                 {{csrf_field()}}
                 <input type="hidden" name="_method" value="delete">
             </form>
        <li><a href="/pmanager/public/projects/create/{{$company->id}}">
                <li class="fa fa-plus-circle" style="color: blue"></li> Add Project</a></li>


          </ol>
</div>
</div>

    @endsection