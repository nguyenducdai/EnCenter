@extends('Site.layout.app')
@section('content')
        <div class="fh5co-hero">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover" id="login_page"
            data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_1.jpg);">
                <div class="desc">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 col-md-5">
                                <div class="tabulation animate-box">

                                  <!-- Nav tabs -->
                                   <ul class="nav nav-tabs" role="tablist">
                                      <li role="presentation">
                                        <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Đăng Nhập</a>
                                      </li>
                                      <li role="presentation" class="active">
                                           <a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Đăng Ký</a>
                                      </li>
                                     
                                   </ul>
                                  <!-- Tab panes -->
                                    <div class="tab-content">
                                     <div role="tabpanel" class="tab-pane" id="flights">
                                        <div class="row">
                                             <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                <a href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                         <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
                    </div>
                    </form>
                                                           
                    </div>
                 </div>

                     <div role="tabpanel" class="tab-pane active" id="hotels">
                        <div class="row">
                             <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                             <div class="col-xs-12">
                                  <button type="submit" class="btn btn-primary btn-block">
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                         </form>
                           
                        </div>
                     </div>
                    </div>
                </div>
            </div>
            <div class="desc2 animate-box">
                <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
                    <p>Đăng ký để nhận nhưng bản tin và khóa học tiếng anh tại</p>
                    <h2>En Center</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
@endsection
