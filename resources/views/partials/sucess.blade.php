@if(session()->has('success'))
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-danger alert-dismissible fade show" style="margin-top: 7px">
                <button class="close" data-dismiss="alert" type="button" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <strong>{!! session()->get('success') !!}</strong>
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
    @endif