@if(Session::has('msg'))
    <div class="alert alert-success success-style">
        <i class="fa fa-exclamation-circle"></i> {!! Session::get('msg')!!}
    </div>
@endif