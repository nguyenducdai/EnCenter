@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Quản lý khóa học</h2></div>
        <div class="col-lg-6 page-header">
            <form action="{{route('cp.khoahoc.create')}}"  method="get">
                  <button type="submit" class="btn btn-primary pull-right">Thêm Mới</button>
            </form>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Table Manager Khoa Hoc
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
             @include('Admin.block.success')
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên khoa hoc</th>
                            <th>Giá (vnd)</th>
                            <th>Đăng ký/tổng sô</th>
                            <th>Trang thái</th>
                            <th>xem chi tiết</th>
                            <th colspan="2">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1;?>
                    @foreach($model as $item)
                        <tr>
                            <td>{{ $stt ++ }}</td>
                            <td>{{ $item['title']}} <br> <?php echo date('d-M-Y',strtotime($item['created_at'])) ?></td>
                            <td><?php echo number_format($item['price'])?></td>
                            <td>
                            <?php 
                                $count = DB::table('hocvien')->
                                where('idKhoaHoc',$item['id'])->get()->count();
                                echo $count;
                            ?>
                            /{{ $item['sohocvien']}}</td>
                            <td>  
                                @if($item['status'] == 0)
                                <button class="btn btn-success btn-xs">{{"enable"}}</button>
                                @else
                                  <button class="btn btn-warning btn-xs">{{"disable"}}</button>
                                 @endif
                             </td>
                             {{-- {{route('cp.khoahoc.detail',$item['id'] )}} --}}
                            <td>
                            <a href="javascript:void(0);" onclick="PopupCenterDual('{{route('cp.khoahoc.detail',$item['id'])}}','chi tiết','500','500')">chi tiết</a>
                            </td>
                            <td> <a href="{{route('cp.khoahoc.edit',$item['id'] )}}" onclick = "alert('update coming soon')"><span class="glyphicon glyphicon-edit"></span> </a></td>
                            <td class="center"> <a href="{{route('cp.khoahoc.del',$item['id'] )}}" onclick = "alert('update coming soon')"><span class="glyphicon glyphicon-trash"></span> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </tabl>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
</div>
@endsection

<script type="text/javascript">
    function PopupCenterDual(url, title, w, h) {
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    if (window.focus) {
    newWindow.focus();
    }
}
</script>