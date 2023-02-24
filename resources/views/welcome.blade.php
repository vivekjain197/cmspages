@extends('layouts.main')

@section('content')
<section>
	<div class="block gray no-padding">
		<div class="">
		    <h6 style="margin-top: 0px !important;line-height: 30px; font-size:20px; margin: 0; padding: 5px; background-color:#f1f1f1;">
				<marquee behavior="scroll" direction="left" scrollamount="4">
					<?php if(count($home_news) >=1){
						 foreach($home_news as $home_new){
							echo $home_new->sortdec;
						 }
					 }?>
				</marquee>
			</h6>
			<div class="row">
				{{--<div class="col-md-12 column">
					<iframe width="962" height="650" src="https://www.youtube.com/embed/6CD7g_QkEbU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>--}}
				<div class="col-md-12 column">
					<div id="layerslider-container-fw">
						<div id="layerslider" style="width: 100%; height: 570px; margin: 0px auto; ">
							<?php if(!empty($homebanners)){?>
								<?php foreach($homebanners as $homebanner){?>
									<div class="ls-slide" data-ls="transition2d:12; timeshift:-1000;">
										<img itemprop="image" src="<?php echo url('/public/upload/cms').'/'.$homebanner->file1?>" class="ls-bg" alt="Slide background" />
									</div>
								<?php }?>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section style="background:#f1f1ff;">
	<div class="block whitish parallax-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="urgent-cause">
						<div class="row">
							<div class="col-md-12 column">
								<div class="urgentcause-detail">
									<center>
										<?php if(!empty($abouts)){?>
											<?php foreach($abouts as $about){?>
												<?php echo $about->sortdec;?>
											<?php }?>
										<?php }?>
									<p><a href="/about_us" title="description">Read More <i class="fa fa-angle-double-right"></i></a></p>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="gallery-detail-page">
						<div class="title">
							<h2>फोटो <span>गैलरी</span></h2>
						</div>

						<div class="gallery-filters">
							<div class="row">
								<div class="masonary">
								<?php
									foreach($photo_galarys as $gallery){?>
									<div class="col-md-3 images">
										<div class="gallery-box lightbox">
											<img src="<?php echo url('/public/upload/cms').'/'.$gallery->file1?>" height="197" width="272" />
											<a href="<?php echo url('/public/upload/cms').'/'.$gallery->file1?>">+</a>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section style="background:#f1f1ff;">
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="title">
						<h2>गोलापूर्व जैन<span> त्रैमासिक पत्रिका</span></h2>
						<span></span>
					</div>
					<div class="successful-stories">
						<div class="row">
						<?php
						foreach($Patrikas as $epatrika){
							$date = explode('-',$epatrika->content_1);
							$year=$date[0];
						    $month=date('M',$date[1]);
							$day=$date[2];
						?>
							<div class="col-md-3">
								<div class="story">
									<div class="story-img">
										<img itemprop="image" src="<?php echo url('/public/upload/cms').'/'.$epatrika->file1?>" alt="" />
									</div>
									<div class="story-detail">
										<?php if(isset($epatrika->heading) and $epatrika->heading !=''){?>
										<center><h3><a itemprop="url" href="<?php echo url('/public/upload/cms').'/'.$epatrika->file2?>" title=""><?php echo $epatrika->content_1;?></a></h3></center>
										<?php }else{?>
										<center><h3><a itemprop="url" href="javascript:;" title=""><?php echo $epatrika->content_1;?></a></h3></center>
										<?php }?>
									</div>
								</div>
							</div>
							<?php }?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 column">
					<div class="title style2">
						<h2>आगामी <span>कार्यक्रम</span></h2>

					</div>
					<div class="events">
					<?php foreach($events as $upnews){ ?>
						<div class="event-toggle">
							<div class="event-date"><strong><?php echo date('d, M, Y',strtotime($upnews->content_1));?></strong></div>
							<div class="event-bar">
								<div class="col-xs-7">
									<h3><a itemprop="url" href="" title=""><?php echo $upnews->heading;?></a></h3>
								</div>
								<!--<div class="col-xs-5">
									<div class="count-down"></div>
								</div>-->
							</div>
							<div class="event-desc">
								<p><?php echo $upnews->bodytext;?></p>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
				<div class="col-md-4 column">
					<div class="volunteer">
						<img itemprop="image" src="/public/images/resource/volunteer.jpg" alt="" />
						<div class="volunteer-overlay">
							<div class="volunteer-inner">
								<span>अखिल भारतवर्षीय दिगम्बर जैन गोलापूर्व महासभा में सदस्य के रूप में </span>
								<strong>आपका स्वागत है</strong>
								<!--<p>अखिल भारतवर्षीय दिगम्बर जैन गोलापूर्व महासभा</p>-->
								<!-- <a itemprop="url" class="signup-btn theme-btn" data-toggle="modal" data-target="#myModal">सदस्य बने</a> -->
								<!-- <a itemprop="url" class="signup-btn theme-btn"><i class="fa fa-user"></i>REGISTER</a> -->
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection
