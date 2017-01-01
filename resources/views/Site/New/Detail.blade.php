@extends('Site.layout.app')
@section('content')
	<div id="fh5co-tours">
			<div class="container">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="{{Url('/')}}">Home</a>
						</li>
						<li class="active">abc</li>
					</ol>
				</div>

				<div class="row">
					<div class="col-md-8">
					  <div class="jumbotron">
						  	<div class="enty_title"><h3>{{$model['Title']}}</h3>
						  	<span class="date"> Ngày đăng : {{ date('d/m/Y',strtotime($model['created_at']))}}</span>
						  	</div>
						  	
						  	<div class="enty_Descation"> <i>  {{$model['Descation']}}</i></div>
						 
						  	<div class="enty_Img">
							  	<center>
							  		<img src="{{url('upload',$model['Image'])}}">
							  	</center>
						  	</div>
					  	<div class="enty_content"> {{$model['Content']}}</div>
					   </div>

					</div>
					<div class="col-md-4">
					  <div class="jumbotron">
						  <div class="alert alert-success">
					  			<p>Tin tức mới</p>
						</div>
						@foreach($new as $item)
							<div class="jumbotron">
								<div class="media">
								  <a class="media-left" href="{{route('cp.home.detail',$item->id)}}">
								    <img class="media-object" src="{{Url("upload",$item->Image)}}" alt="Generic placeholder image" style="width:100px">
								  </a>
								  <div class="media-body">
								    <h5 class="media-heading"><a href="{{route('cp.home.detail',$item->id)}}">{{ $item->Title}}</a></h5>
								  </div>
								</div>
							</div>
						@endforeach

					   </div>

					</div>
				</div>
			</div>
	</div>				
 @endsection	