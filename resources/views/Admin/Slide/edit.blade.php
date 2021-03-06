@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Quản lý slide</h2></div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Table manage slide
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
               @if(count($errors) > 0)
                <div class="alert alert-danger success-style">
                    @foreach ($errors->all() as $err)
                       <li>{{$err}}</li>
                    @endforeach
                </div>
               @endif
             @include('Admin.block.success')
            <div class="table-responsive">
                 <form role="form" method="post" action="{{route('cp.slide.dedit',$model['id'])}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="tab-content clearfix">
                     
                        <div class="form-group">
                            <div class="col-md-8">
                              <label>Hình ảnh</label>
                              <input type="file" name="txtHinhAnh"  class="form-control">
                              </div>
                              <div class="col-md-4">
                                 <img src="{{url('upload/slide',$model['HinhAnh'] )}}" style="width:110px">
                              </div>
                         </div>

                           <div class="form-group">
                            <label>Trang Thái</label>
                              <select name="txtStatus" class="form-control">
                              @if($model['status']==0)
                                  <option value="0" selected="selected">Hiện</option>
                                  <option value="1">Ân</option>
                              @else
                                  <option value="0">Hiện</option>
                                  <option value="1"  selected="selected">Ân</option>
                              @endif

                              </select>
                         </div>
                    
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success" value="Tải Lên"> </button>
                        <input type="reset" class="btn btn-default" value="Xóa"> </button>
                    </div>
                </div>
            </form>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@endsection