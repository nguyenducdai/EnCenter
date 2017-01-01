@extends('Site.layout.app')
@section('slide')
    @parent
@include('Site.layout.slide')
@endsection
@section('content')
		<div id="fh5co-tours">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
					<h3>PHƯƠNG PHÁP CLT</h3>
					</div>
					<div class="row">
					<div class="col-md-3 animate-box fadeInUp animated">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-refresh"></i>
							</span>
							<div class="feature-copy">
								<h3>Tương tác hiệu quả</h3>
							</div>
						</div>

					</div>

					<div class="col-md-3 animate-box fadeInUp animated">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-global"></i>
							</span>
							<div class="feature-copy">
								<h3>Không gian học hiện đại</h3>
							</div>
						</div>
					</div>
					<div class="col-md-3 animate-box fadeInUp animated">
						<div class="feature-center">
							<span class="icon">
								<i class=" icon-profile-male"></i>
							</span>
							<div class="feature-copy">
								<h3>Chủ động giao tiếp</h3>
							</div>
						</div>
					</div>

					<div class="col-md-3 animate-box fadeInUp animated">
						<div class="feature-center">
							<span class="icon">
								<i class=" icon-linegraph"></i>
							</span>
							<div class="feature-copy">
								<h3>Áp dụng thực tế</h3>
							</div>
						</div>
					</div>
				</div>
				</div>
			
			</div>
		</div>
		
		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>CÁC KHÓA HỌC ANH NGỮ TẠI OCEAN EDU</h3>
					</div>
				</div>
				<div class="row">
				@foreach($model as $item)
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn" id="box-trainning">

						<img src="{{url('upload',$item->image)}}" alt="{{$item->title}}" class="img-responsive" id="img-traning" style="height:150px">
						<div class="desc">
							<span></span>
							<h4>{{$item->title}}</h4>
							<span>Học Phí : <?php echo number_format($item->price)?> (Vnd)</span><br>
							<span>Tình trạng :
								@if($item->status == 0)
									<b class="text-success">{{"Mở"}}</b>
								@endif
							 </span><br>

							<a class="btn btn-primary btn-outline" href="{{route('cp.home.detail',$item->id)}}">Xem Chi Tiết <i class="icon-arrow-right22"></i></a>
						</div>

					</div>
				@endforeach
				@if(count($model) >9)
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{route('cp.home.archive')}}">Xem Thêm<i class="icon-arrow-right22"></i></a></p>
					</div>
				@endif
				</div>
			</div>
		</div>

		<div id="fh5co-features">
			<div class="container">
			<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>TIN TỨC - SỰ KIỆN</h3>
							</div>
						</div>
				<div class="row">
				@foreach($new as $item)
					<div class="col-md-4 animate-box">
						<div class="feature-left">
							<span class="icon">
								<img src="{{url('upload',$item->Image)}}" style="width:100%">
							</span>

							<div class="feature-copy">
								<h3>{{$item->Title}}</h3>
								<p><?php echo substr($item->Descation, 1,100) ?>..</p>
								<p><a href="{{route('cp.home.detail.new',$item->id)}}">Xem Thêm</a></p>
							</div>
						</div>

					</div>
				@endforeach

				@if(count($new) >9)
				<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{route('cp.home.archive.new')}}">Xem Thêm<i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
				@endif
			</div>
		</div>
	{{-- 	<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>HỆ THỐNG OCEAN EDU TRÊN TOÀN QUỐC</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">
			</div>
		</div> --}}
		<!-- fh5co-blog-section -->
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>CẢM NHẬN HỌC VIÊN</h2>
				</div>
			</div>
			<div class="row">
			@foreach($cn as $item)
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>{{$item->Noidung}}</p>
						</blockquote>
						<?php 

							$hv = DB::table('users')->where('id',$item->idHocVien)->first();
						?>
						<p class="author"> {{$hv->name}}</a> </p>
					</div>
					
				</div>
			@endforeach
				
			</div>
 @endsection	