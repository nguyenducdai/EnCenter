@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Tin tức</h2></div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Table manage News
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
                 <form role="form" method="post" action="{{route('cp.news.Dcreate')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="tab-content clearfix">
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tên Bài Viêt</label>
                            <input  type="text" class="form-control" name="txtName" value="{{old('txtName')}}">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="txtDescaption"  class="form-control" >{{old('txtDescaption')}}</textarea>  
                         </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea name="txtContent"  class="form-control" >{{old('txtContent')}}</textarea>  
                        </div>

                         <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="txtImage" value="{{old('txtImage')}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input  type="text" class="form-control" name="txtMetaTitle" value="{{old('txtMetaTitle')}}">
                        </div>

                         <div class="form-group">
                            <label>Meta KeyWord</label>
                            <input  type="text" class="form-control" name="txtMetaKey" value="{{old('txtMetaKey')}}">
                        </div>

                        <div class="form-group">
                            <label>Meta Content</label>
                            <textarea name="txtMetaDescation"  class="form-control" >{{old('txtMetaDescation')}}</textarea>  
                         </div>

                           <div class="form-group">
                            <label>Danh Mục Tin</label>
                           <select name="txtDanhMuc" class="form-control">
                               <option value="">--chọn danh mục tin--</option>
                               @foreach($danhmuc as $dm)
                                     <option value="{{$dm->id}}">{{$dm->name}}</option>
                                     <?php 
                                        $item = DB::table("danhmuc")->where('parent_id',$dm['id'])->get();
                                     ?>
                                     @foreach($item as $subdm)
                                              <option value="{{$subdm->id}}">----{{$subdm->name}}</option>
                                      @endforeach
                               @endforeach
                           </select>
                         </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success" value="Thêm"> </button>
                        <input type="reset" class="btn btn-default" value="clear"> </button>
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