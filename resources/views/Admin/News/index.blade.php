@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Tin tức</h2></div>
        <div class="col-lg-6 page-header">
            <form action="{{route('cp.news.add')}}"  method="get">
                  <button type="submit" class="btn btn-primary pull-right">Thêm Mới</button>
            </form>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Table manage News
        </div>

         @include('Admin.block.success')
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên bài viết</th>
                            <th>Danh mục</th>
                            <th>Ngày tạo</th>
                            <th>Trang thái</th>
                            <th colspan="2">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;?>
                    @foreach($model as $item)
                        <tr>
                            <td>{{ $stt ++ }}</td>
                            <td>{{ $item['Title']}}</td>
                             <td>
                               <?php
                                  $danhmuc = DB::table('danhmuc')->where('id','=',$item['danhmuc_id'])->first();
                                    echo $danhmuc->name;
                                  ?>
                            </td>
                            <td>  {{ $item['created_at']}}  </td>
                            <td>  
                                @if($item['Status'] == 0)
                                <button class="btn btn-success btn-xs">{{"enable"}}</button>
                                @else
                                   <button class="btn btn-warning btn-xs">{{"disable"}}</button>
                                 @endif
                             </td>
                            <td> <a href="{{route('cp.news.edit',$item['id'])}}" ><span class="glyphicon glyphicon-edit"></span> </a></td>
                            <td class="center"> <a href="{{route('cp.news.del',$item['id'])}}"><span class="glyphicon glyphicon-trash"></span> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@endsection