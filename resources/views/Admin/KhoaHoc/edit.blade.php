@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Sửa Khóa Học</h2></div>
        <div class="col-lg-6 page-header">
             <button type="submit" class="btn btn-primary pull-right">Trở về</button>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            chỉnh sửa khóa học
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
             @include('Admin.block.success')
            <div class="table-responsive">
                 <form role="form" method="post" action="{{route('cp.khoahoc.Dedit',$id)}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
            
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> Tên Khóa Học</label>
                        <input  type="text" class="form-control" name="txtName" value="{{old('txtName',isset($model['title'])? $model['title'] : null)}}">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescation" value="{{old('txtDescation')}}">@if(isset($model['descaption'])){{$model['descaption'] }}@else{{""}}@endif</textarea>
                     </div>
                    <div class="form-group">
                        <label>số học viên</label>
                        <input type="number" class="form-control" name="txtNumb" value="{{old('txtNumb',isset($model['sohocvien'])? $model['sohocvien'] : null)}}">
                    </div>

                     <div class="form-group">
                        <label>Hình anh</label>
                        <input type="file" class="form-control" name="txtFile" value="{{old('txtFile')}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> Trạng Thái</label>
                        <select name="slStatus" class="form-control">
                            @if($model['status']==0)
                                <option value="0" selected="selected">Mở</option>
                                <option value="1">khóa</option>
                            @elseif($model['status']==1) 
                                <option value="0">Mở</option>
                                <option value="1" selected="selected">khóa</option>
                            @endif      
                        </select>
                    </div>
                     <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea class="form-control" rows="3" name="txtContent" value="{{old('txtContent')}}">@if(isset($model['content'])){{$model['content'] }}@else{{""}}@endif</textarea>
                    </div>
                     <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="txtPrice" id ="price" value="{{old('txtNumb',isset($model['price'])? $model['price'] : null)}}">
                    </div>
                     <div class="form-group">
                         <div style="width:100px;">
                              <img src="{{Url("upload",$model['image'])}}" style="width:100%">
                         </div>
                     </div>

                </div>
               <div class="col-lg-12">
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
               </div>
            </form>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@endsection