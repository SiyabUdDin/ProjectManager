@extends('layouts.app')


@section('content')

<div class=" row">
    <div class=" col-md-3"></div>
    <div class=" col-md-6">
        <div class="class card">
            <div class="card-header bg-primary" >
                <h2 style="padding-bottom: -20px;padding-top: 20px;margin-top: 10px;color: white">
                    <span style="font-family: 'Comic Sans MS';font-weight: bold">Companies</span></h2>
                <a href="{{route('companies.create')}}" class="btn btn-outline-dark btn-sm" style="margin-left: 500px">
                    <span style="font-family: 'Comic Sans MS';font-weight: bold">Create Company</span></a>
            </div>
            <div class="class card-body">
                <ul class="list-group">
                   @foreach($companies as $company)
         <li class="list-group-item"><a
                      href="companies/{{$company->id}}">
                 <span style="font-family: 'Comic Sans MS';font-weight: bold;font-size: 18px">{{$company->name}}</span></a></li><br>
                       @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>


    @endsection


