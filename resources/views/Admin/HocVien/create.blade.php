@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Thêm Học viên</h2></div>
        <div class="col-lg-6 page-header">
             <button type="submit" class="btn btn-primary pull-right">Trở về</button>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm học viên
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
                 <form role="form" method="post" action="{{route('cp.hocvien.Dcreate')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> Họ và tên</label>
                        <input  type="text" class="form-control" name="txtName" value="{{old('txtName')}}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control"  name="txtEmail" value="{{old('txtEmail')}}"/>
                     </div>
                    <div class="form-group">
                        <label>Điện Thoại</label>
                        <input type="number" class="form-control" name="txtNumb" value="{{old('txtNumb')}}">
                    </div>

                     <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="txtDate" value="{{old('txtDate')}}">
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="form-group">
                        <label>Khóa Học</label>
                       <select name="txtKhoaHoc" class="form-control">
                           <option value=""> --chọn khóa học--</option>
                           @foreach($KhoaHoc as $item)
                                 <option value="{{ $item['id']}}"> {{ $item['title']}}</option>
                           @endforeach
                       </select>
                    </div>
                     <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea class="form-control" rows="3" name="txtAdress" value="{{old('txtAdress')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Diễn giải</label>
                        <textarea class="form-control" rows="3" name="txtNote" value="{{old('txtNote')}}"></textarea>
                    </div>
                     <div class="form-group">
                        <label>Công Việc</label>
                        <input type="text" class="form-control" name="txtJob" id ="price" value="{{old('txtJob')}}">
                    </div>
                </div>
               <div class="col-lg-12">
                    
                <button type="submit" class="btn btn-default">Create</button>
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