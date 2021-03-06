@extends('Site.layout.app')
@section('content')
	<div id="fh5co-tours">
			<div class="container">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="{{Url('/')}}">Trang chủ</a>
						</li>
						<li class="active">Lưu Trữ</li>
					</ol>
				</div>

				<div class="row">
					<div class="col-md-8">
					  <div class="jumbotron">
					  @foreach($model as $item)
						  <div class="media">
							  <div class="media-left" href="#">
							    <img class="media-object" src="{{url('upload',$item['image'])}}" alt="Generic placeholder image" style="width:100px">
							  </div>
							  <div class="media-body">
							    <h3 class="media-heading"> <a class="media-left" href="{{route('cp.home.detail',$item->id)}}">{{ $item['title']}} </a> </h3>
							    <p style="font-size:12px">{{ date('d-m-Y', strtotime($item['created_at']))}}<br><span style="font-size:15px">{{ substr($item['descaption'], 1,100)}} </span></p>
							   
							  </div>
							</div>
						    <hr>
						@endforeach
					   </div>

						{!! $model->render() !!}
					</div>

					<div class="col-md-4 " id="right">
						<div class="alert alert-success">
					  			<p>Tin tức mới</p>
						</div>
						@foreach($new as $item)
							<div class="jumbotron">
								<div class="media">
								  <a class="media-left" href="{{route('cp.home.detail.new',$item->id)}}">
								    <img class="media-object" src="{{Url("upload",$item->Image)}}" alt="Generic placeholder image" style="width:100px">
								  </a>
								  <div class="media-body">
								    <h5 class="media-heading"><a href="{{route('cp.home.detail.new',$item->id)}}">{{ $item->Title}}</a></h5>
								  </div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
	</div>				
 @endsection	