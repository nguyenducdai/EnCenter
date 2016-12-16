@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản Lý thành viên</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               sửa thông tin
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

              @if(count($errors) > 0)
                <div class="alert alert-danger success-style">
                    @foreach ($errors->all() as $err)
                       <li>{{$err}}</li>
                    @endforeach
                </div>
               @endif

            <form role="form" method="post" action="{{route('cp.user.dedit',$id)}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>	Tên đăng nhập</label>
                    <input class="form-control" name="txtName" value="{{old('name',isset($model['name'])?$model['name'] :null)}}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ mail</label>
                    <input  type ="email" class="form-control" value="{{old('email',isset($model['email'])? $model['email'] :null)}}"  name="txtMail">
                </div>
                <div class="form-group">
                    <label>Mật Khẩu</label>
                   <input  type ="password" class="form-control" value="{{old('password',isset($model['password'])? $model['password'] :null)}}" ="" name="txtPass">
                </div>
               
                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection