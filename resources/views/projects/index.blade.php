@extends('layouts.app')


@section('content')

<div class=" row">
    <div class=" col-md-3"></div>

<div class="col-md-5">


<div class="card ">
    <div class="card-header  text-center bg-primary">
        <h2 style="font-weight: bold"><span style="font-family: 'Comic Sans MS';font-weight: bold">Projects</span></h2>
    </div>
    <div class="card-body">
        <ul class="list-unstyled list-group">
        @foreach($projecties as $project)
            <li class="list-group-item"><a href="projects/{{$project->id}}">
                    <span style="font-family: 'Comic Sans MS';font-weight: bold">{{$project->name}}</span></a></li><br>

        @endforeach
        </ul>
    </div>
</div>





</div>
    <div class="col-md-4"></div>

</div>
    @endsection


