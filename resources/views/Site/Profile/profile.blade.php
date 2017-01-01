@extends('Site.layout.app')
@section('content')
	<div id="fh5co-tours">
			<div class="container">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="{{Url('/')}}">Trang Chủ</a>
						</li>
						<li class="active">Thông tin cá nhân</li>
					</ol>
				</div>

				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Các khóa học đã đăng ký</h3>
							</div>

							<div class="panel-body">
							 @include('Admin.block.success')
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
				                            <th>Tên khoa hoc</th>
				                            <th>Giá (vnd)</th>
				                            <th>Ngày đăng ký</th>
				                            <th colspan="2">Hành động</th>
										</tr>
									</thead>
									<tbody>
									<?php $stt = 1;
										        // echo "<pre>";
										        //     var_dump($model);
										        // echo "</pre>";
									?>
									@foreach($model as $item)
											@foreach($item as $it)
												<tr>
													<td>{{$stt ++}}</td>
													<td><a href="#">{{$it->title}}</a></td>
													<td>{{ number_format($it->price)}}</td>
													<td>

													<?php 
														$d = DB::table('hocvien')->where('idKhoahoc',$it->id)->select('created_at','id')->first();

													?>
													{{ date('d/m/Y',strtotime($d->created_at))}}</td>
													<td>
                            							<td class="center"> <a href="{{route('cp.home.profile.del',[$d->id ,$it->id])}}"><span class="glyphicon glyphicon-trash"></span> Hủy</a>
													</td>
												</tr> 	
											@endforeach
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">cảm nhận về trung tâm</h3>
							</div>
							<div class="panel-body">
							 @if(count($errors) > 0)
				                <div class="alert alert-danger success-style">
				                    @foreach ($errors->all() as $err)
				                       <li>{{$err}}</li>
				                    @endforeach
				                </div>
				               @endif
				                @include('Admin.block.success')
								<form action="{{route('cp.home.profile.do')}}" method="POST" role="form">
                				  <input type="hidden" name="_token" value="{{csrf_token()}}">

										<div class="form-group">
											<legend>Nội dung cảm nhận</legend>
											<textarea class="form-control" cols="5" name="txtContent"></textarea>
										</div>
										<div class="form-group">
											
												<button type="submit" class="btn btn-primary">Submit</button>
											
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>				
 @endsection	