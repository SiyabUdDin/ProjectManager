@if(isset($errors)&& count($errors)>0)
<div class="alert alert-danger fade show alert-dismissible">
<button type="button" aria-label="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
@foreach($errors->all() as $error)
    {!! $error !!}
    @endforeach
</div>
    @endif