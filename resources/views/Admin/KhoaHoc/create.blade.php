@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Thêm Khóa Học</h2></div>
        <div class="col-lg-6 page-header">
             <button type="submit" class="btn btn-primary pull-right">Trở về</button>
     
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm danh mục
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
                 <form role="form" method="post" action="{{route('cp.khoahoc.Dcreate')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label> Tên Khóa Học</label>
                    <input  type="text" class="form-control" name="txtName" value="{{old('txtName')}}">
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtDescation" value="{{old('txtDescation')}}"></textarea>
                     </div>
                    <div class="form-group">
                        <label>số học viên</label>
                        <input type="number" class="form-control" name="txtNumb" value="{{old('txtNumb')}}">
                    </div>

                     <div class="form-group">
                        <label>Hình anh</label>
                        <input type="file" class="form-control" name="txtFile" value="{{old('txtFile')}}">
                    </div>
                </div>
                <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nội Dung</label>
                        <textarea class="form-control" rows="3" name="txtContent" value="{{old('txtContent')}}"></textarea>
                    </div>
                     <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="txtPrice" id ="price" value="{{old('txtNumb')}}">
                    </div>
                </div>
               <div class="col-lg-12">
                    
                <button type="submit" class="btn btn-default">Add</button>
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