<div class="container">
	<div class="alert alert-info">
	 	<div class="panel panel-default">
		  <div class="panel-heading">Tiêu đề : {{$model['title']}}</div>
		  <div class="panel-body">Mô Tả : {{$model['descaption']}}</div>
		  <div class="panel-body">Nội Dung : {{$model['content']}}</div>
		  <div class="panel-body">giá : <?php echo number_format($model['price']) ?></div>
		  <div class="panel-body">
		 		<div class="col-md-2"> Hình ảnh </div>
		 		 <div class="col-md-10 pull-right"><img src="{{Url("upload",$model['image'])}}" style="width:300px"></div>
		  </div>
		  <div class="panel-body">
		 		 Số học viên :{{$model['sohocvien']}}
		  </div>

		  
		</div>

	</div>
</div>