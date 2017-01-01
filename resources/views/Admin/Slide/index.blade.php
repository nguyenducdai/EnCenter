@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Quan Ly slide</h2></div>
         <div class="col-lg-6 page-header">
            <form action="{{route('cp.slide.create')}}"  method="get">
                  <button type="submit" class="btn btn-primary pull-right">Thêm Mới</button>
            </form>
        </div>
    </div>

    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Table manage Slide
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
              
                <div class="tab-content clearfix">
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Hình Anh</th>
                                 <th>Ngày Tạo</th>
                                 <th>Trạng thái</th>
                                 <th colspan="2">Hành động</th>
                             </tr>
                         </thead>
                         <tbody>
                         <?php $stt = 1?>
                         @foreach($model as $item)
                             <tr>
                                 <td>{{ $stt ++}}</td>
                                 <td>
                                     <img src="{{url('upload/slide',$item['HinhAnh'] )}}" style="width:110px">
                                 </td>
                                 <td>{{ date('d/m/Y',strtotime($item['created_at']))}}</td>
                                 <td style="width:20%">
                                     @if($item['status'] ==0)
                                        <button class="btn btn-success btn-xs"> Mở</button>
                                     @else
                                        <button class="btn btn-warning btn-xs"> Đóng</button>

                                     @endif

                                 </td>
                                   <td> <a href="{{route('cp.slide.edit',$item['id'])}}" ><span class="glyphicon glyphicon-edit"></span> </a></td>
                                    <td class="center"> <a href="{{route('cp.slide.del',$item['id'])}}"><span class="glyphicon glyphicon-trash"></span> </a>
                                    </td>
                             </tr>
                            @endforeach
                            {!! $model->render() !!}
                         </tbody>
                     </table>
                </div>
                   
                </div>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@endsection