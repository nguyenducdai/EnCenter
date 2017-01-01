	<div class="fh5co-hero">
			  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <?php 
                    for ($i=1; $i <= count($slides) ; $i++) { ?>
                      <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i?>"></li>
                     <?php } ?>

                </ol>
                <div class="carousel-inner">
         
                    <div class="item active">
                        <img src="{{url('upload/slide',$slide->HinhAnh)}}" alt="First slide">
                    </div>
                @foreach($slides as $item)
                    <div class="item">
                        <img src="{{url('upload/slide',$item->HinhAnh)}}"" alt="Second slide">
                    </div>
                @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glypshicon glyphicon-chevron-right">
                        </span></a>
            </div>

		</div>