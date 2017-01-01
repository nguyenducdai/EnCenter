@extends('Admin.layout._root')
@section('admin-content')
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6"><h2 class="page-header">Quản lý học viên</h2></div>
        <div class="col-lg-6 page-header">
            <form action="{{route('cp.hocvien.add')}}"  method="get">
                  <button type="submit" class="btn btn-primary pull-right">Thêm Mới</button>
            </form>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">

    <div class="panel panel-default">
        <div class="panel-heading">Table Manager Học viên 
        <div class="panel-body">
         @include('Admin.block.success')
        <?php $stt = 1?>
         <div class="panel-group" id="accordion">

                @foreach($KhoaHoc as $item)
                         <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $stt ?>">{{@$item['title']}}</a>
                              </h4>
                            </div>
                            <div id="collapse<?php echo $stt ?>" class="panel-collapse collapse">
                              <div class="panel-body">
                                  <table class="table table-hover">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Tên</th>
                                              <th>Mail</th>
                                              <th>Ngay sinh</th>
                                              <th>Diện Thoại</th>
                                              <th>Địa chỉ</th>
                                              <th>Hành động</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                        $hocvien = DB::table("hocvien")->where('idKhoahoc',$item['id'] )->get();
                                        $stthv= 1;
                                         ?>
                                         @foreach($hocvien as $hv)
                                          <tr>
                                              <td>{{ $stthv}}</td>
                                              <td>{{ $hv->name }}</td>
                                              <td>{{ $hv->email }}</td>
                                              <td>{{ date('d/m/Y',strtotime($hv->date ))}}</td>
                                              <td>0{{ $hv->phone }}</td>
                                              <td>{{ $hv->address }}</td>
                                              <td><a href="{{route('cp.hocvien.del', $hv->id)}}"><span class="glyphicon glyphicon-trash"></span> </a></td>
                                          </tr>
                                          {{ $stthv ++}}
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
                    
                    <?php $stt++ ?>
                @endforeach
           </div> <!-- /.panel-body -->
        </div>
    </div>
</div>
</div>
@endsection

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        this.nextElementSibling.classList.toggle("show");
  }
}
</script>

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