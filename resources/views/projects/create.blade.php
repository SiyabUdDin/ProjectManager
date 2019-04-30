@extends('layouts.app')




@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="{{route('projects.store')}}">
                {{csrf_field()}}
                <label for="company-name " class="col-md-4"
                       style="font-weight: bold;font-size: 20px;font-family: 'Comic Sans MS'">Project Name</label>
                <input  name="name" type="text" class="form-control" placeholder="Name"><br>
                <label for="project-name " class="col-md-6"
                       style="font-weight: bold;font-size: 20px;font-family: 'Comic Sans MS'">Project  Description</label>
                <textarea  name="description" rows="10" cols="20"
                           class="form-control" placeholder="Description"></textarea><br>
                <input  type="hidden" name="company_id" class="form-control" value="{{$company_id}}"><br>
                <button type="submit" class="btn btn-primary btn-lg btn-block col-md-3">
                    Submit <li class="fa fa-save"></li></button>
            </form>
        </div>
    </div>





    @endsection