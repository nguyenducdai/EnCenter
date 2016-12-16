@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Danh Mục Tin Tức</h2></div>
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
            <div class="table-responsive">
                 <form role="form" method="post" action="{{route('cp.news.dadd')}}">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label> Tên Danh mục tin</label>
                    <input class="form-control" name="txtName" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="txtDescation" value="{{old('Descation')}}"></textarea>
                </div>
                <div class="form-group">
                    <label>Danh Mục cha</label>
                        <select class="form-control" name="parent_id">
                            <option value="0">None</option>
                           @foreach($model as $item)
                                 <option value="{{$item->id}}">{{$item->name}}</option>
                           @endforeach
                        </select>
                </div>
                <button type="submit" class="btn btn-default">Add</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@endsection