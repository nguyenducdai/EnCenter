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
                 <form role="form" method="post" action="{{route('cp.news.Dedit',$model['id'])}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="tab-content clearfix">
                     <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tên Bài Viêt</label>
                            <input  type="text" class="form-control" name="txtName" value="{{old('txtName',isset($model['Title'])? $model['Title'] : null)}}">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="txtDescaption"  class="form-control" >{{old('txtDescaption',isset($model['Descation'])? $model['Descation'] : null)}}</textarea>  
                         </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea name="txtContent"  class="form-control" >{{old('txtContent',isset($model['Content'])? $model['Content'] : null)}}</textarea>  
                        </div>

                         <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="txtImage" value="{{old('txtImage')}}">
                        </div>

                         <div class="form-group">
                            <label>Trạng Thái</label>
                           <select name="txtStatus" class="form-control">
                            @if($model['Status']==0)
                               <option value="0" selected="selected">Mở</option>
                               <option value="1">Đóng</option>
                            @else
                                <option value="0">Mở</option>
                               <option value="1"  selected="selected">Đóng</option>
                            @endif
                           </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input  type="text" class="form-control" name="txtMetaTitle" value="{{old('txtMetaTitle',isset($model['MetaTitle'])? $model['MetaTitle'] : null)}}">
                        </div>

                         <div class="form-group">
                            <label>Meta KeyWord</label>
                            <input  type="text" class="form-control" name="txtMetaKey" value="{{old('txtMetaKey',isset($model['MetaKeyword'])? $model['MetaKeyword'] : null)}}">
                        </div>

                        <div class="form-group">
                            <label>Meta Content</label>
                            <textarea name="txtMetaDescation"  class="form-control" >{{old('txtMetaDescation',isset($model['MetaDescation'])? $model['MetaDescation'] : null)}}</textarea>  
                         </div>

                           <div class="form-group">
                            <label>Danh Mục Tin</label>
                           <select name="txtDanhMuc" class="form-control">
                               <option value="">--chọn danh mục tin--</option>
                               @foreach($danhmuc as $dm)
                                    @if($model['danhmuc_id'] == $dm->id)
                                     <option value="{{$dm->id}}" selected="selected">{{$dm->name}}</option>
                                     @else
                                         <option value="{{$dm->id}}">{{$dm->name}}</option>

                                     @endif

                                         <?php 
                                            $item = DB::table("danhmuc")->where('parent_id',$dm['id'])->get();
                                         ?>
                                         @foreach($item as $subdm)
                                             @if($model['danhmuc_id'] == $subdm->id)
                                                  <option value="{{$subdm->id}}" selected="selected">----{{$subdm->name}}</option>
                                            @else
                                            <option value="{{$subdm->id}}">----{{$subdm->name}}</option>
                                            @endif
                                             
                                          @endforeach
                                     
                               @endforeach
                           </select>
                         </div>

                          <div class="form-group">
                            <img src="{{url('upload',$model['Image'])}}" style="width:100px;height:100px">
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