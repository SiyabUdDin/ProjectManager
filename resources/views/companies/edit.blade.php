@extends('layouts.app')




@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
       <form method="post" action="{{route('companies.update',[$company->id])}}">
           {{csrf_field()}}

      <input type="hidden" name="_method" value="put" >
       <label for="company-name " class="col-md-2"
              style="font-weight: bold;font-size: 20px">
           <span style="font-weight: bold;font-family: 'Comic Sans MS'">Name</span></label>
               <input  name="name" type="text" class="form-control" placeholder="{{$company->name}}"><br>
    <label for="company-name " class="col-md-2"
                  style="font-weight: bold;font-size: 20px"> <span style="font-weight: bold;font-family: 'Comic Sans MS'">Description</span></label>
     <textarea  name="description" rows="10" cols="20"
                      class="form-control" placeholder="{{$company->description}}"></textarea><br>
 <button type="submit" class="btn btn-primary btn-lg btn-block col-md-3">
     <span style="font-weight: bold;font-family: 'Comic Sans MS'">
        Update</span> <li class="fa fa-reply"></li> </button>


       </form>









    </div>
    <div class="col-md-3">
        <h5>Actions</h5>
        <ol class="list-unstyled">
            <li><a href="/pmanager/public/companies/{{$company->id}}">
            <li class="fa fa-eye"style="color: blue"></li> View Company</a></li>
            <li><a href="/pmanager/public/companies/">
                    <li class="fa fa-eye" style="color: blue"></li> All Companies</a></li>

        </ol><br><br>
    </div>

</div>








    @endsection