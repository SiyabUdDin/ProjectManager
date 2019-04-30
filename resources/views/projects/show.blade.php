@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-9">

<div class="jumbotron" style="border-radius: 50px">
<h1 style="margin-left: 150px;font-size: 70px">{{$project->name}}</h1>
    <p style="margin-left: 200px">{{$project->description}}</p>

</div><br>
            <div class="col-md-9" style="margin-left: 3px">
                <div class="card">
                    <div class="card-header " style="padding-bottom: 0px">
                        <p><span style="font-family: 'Comic Sans MS';font-weight: bold;font-size: 20px">Recent Comments</span></p>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach($project->comments as $comment)
                                <li class="list-group-item">
                                    <h4>{{$comment->user->name}}</h4>
                                    <small>Commented On:<span  style="font-size: 11px" class="text-danger">{{$comment->created_at}}</span></small><br><br/>
                                    <h5>{{$comment->body}}</h5>
                                    Proof:
                                    <p class="text-danger">{{$comment->url}}</p>
                                </li><br>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

           <form class="col-md-9" method="post" action="{{route('comments.store')}}">
               {{csrf_field()}}
               <input type="hidden" name="commentable_type" value="App\project">
               <input type="hidden" name="commentable_id" value="{{$project->id}}">

               <label style="font-family: 'Comic Sans MS';font-size: 25px;font-weight: bold">Comment</label><br>
               <textarea rows="5" cols="5" class="form-control" name="body"></textarea><br>
               <label style="font-size: 25px;font-weight: bold;font-family: 'Comic Sans MS'">(url) What You Have Work Done</label><br>
               <input type="text" class="form-control col-md-6" name="url"><br>
               <button type="submit" class="btn btn-primary">
                   <span style="font-family: 'Comic Sans MS';font-weight: bold">Comment
                   <li class="fa fa-comment"></li></span></button>
           </form><br>
        </div>
        <div class="col-md-3">

            <h5>Actions</h5>
            <ol class="list-unstyled">
                <li><a href="{{$project->id}}/edit"><li class="fa fa-edit" style="color: blue"></li> Edit</a></li>
                @if($project->user_id==Auth::user()->id)
                <li>
                    <a href="#" onclick="

               var result=confirm('Are You Sure To Delete This Project..?');
               if(result){
                   event.preventDefault();
                   document.getElementById('form-deleted').submit();
               }
"> <li class="fa fa-trash-alt" style="color: blue"></li> Delete</a> </li>
                @endif

                <form id="form-deleted" action="{{route('projects.destroy',[$project->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete">
                </form>
                <li><a href="{{'/pmanager/public/projects'}}">  <li class="fa fa-project-diagram" style="color: blue"></li> My Projects</a></li>
            </ol><br>
        </div>
    </div>
    @endsection