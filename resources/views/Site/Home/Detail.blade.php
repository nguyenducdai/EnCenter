@extends('Site.layout.app')
@section('content')
	<div id="fh5co-tours">
			<div class="container">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="{{Url('/')}}">Home</a>
						</li>
						<li class="active">{{ $model['title']}}</li>
					</ol>
				</div>

				<div class="row">
					<div class="col-md-8">
					  <div class="jumbotron">
						    <h3>{{ $model['title']}}</h3>
						    <div class="date">
						    	<span>{{$model['created_at']}} / tình trạng : <span class="text-success">
						    	@if($model->status == 0)
									<b class="text-success">{{"Mở"}}</b>
								@endif</span></span>
						    </div>

						    <div class="price">
						  		  <span class="text-warning">Học Phí : <?php echo number_format($model->price)?> (Vnd)</span>
						    </div> 

						    <div class="descaption">
						    	{{$model['descaption']}}
						    </div> 
						    <hr>

						    <div class="content">
						    	{{$model['content']}}
						    </div> 

					   </div>
					  <div class="panel panel-success">
					      <div class="panel-heading">Đăng Ký khóa học ngay</div>
					      <div class="panel-body">
					      	@if(!Auth::user())
					      		<p>Vui lòng đăng nhập để tiếp tục <a href="{{Url('login')}}">Đăng Nhập </a> hoặc <a href="{{Url('login')}}">Đăng ký</a></p>
					      	@else
					      	  @if(count($errors) > 0)
					                <div class="alert alert-danger success-style">
					                    @foreach ($errors->all() as $err)
					                       <li>{{$err}}</li>
					                    @endforeach
					                </div>
					               @endif
					             @include('Admin.block.success')
					      		<form method="post" action="{{route('cp.home.register', $model['id'])}}">
									  <input type="hidden" name="_token" value="{{csrf_token()}}">
									  <div class="col-md-6">
										  <div class="form-group">
										    <label for="name">Họ và Tên</label>
										    <input type="text" class="form-control" name="txtName">
										  </div>
										  <div class="form-group">
										    <label for="pwd">Địa chỉ</label>
										    <input type="text" class="form-control" name="txtEdress" value="">
										  </div>
										  <div class="form-group">
										    <label for="pwd">Năm sinh</label>
										    <input type="date" class="form-control" name="txtDate" value="">
										  </div>
									  </div>
										<div class="col-md-6">
											  <div class="form-group">
											    <label for="pwd">Nghề Nghiệp</label>
											    <input type="text" class="form-control" name="txtCaree" value="">
											  </div>
											  <div class="form-group">
											    <label for="pwd">Số điện thoại</label>
											    <input type="number" class="form-control" name="txtPhone" value="">
											  </div>
											  <div class="form-group">
											    <label for="pwd">Nghi chú</label>
											    <textarea name="txtNote" class="form-control"> </textarea>
											  </div>
										</div>
									  <button type="submit" class="btn btn-default">Đăng ký</button>
									  <button type="reset" class="btn btn-default">Nhập lại</button>
								</form>
					      	@endif

					      </div>
					    </div>

					</div>

					<div class="col-md-4 " id="right">
						<div class="alert alert-success">
					  			<h3>Tin tức mới</h3>
						</div>
						@foreach($new as $item)
							<div class="jumbotron">
								<div class="media">
								  <a class="media-left" href="{{route('cp.home.detail.new',$item->id)}}">
								    <img class="media-object" src="{{Url("upload",$item->Image)}}" alt="Generic placeholder image">
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