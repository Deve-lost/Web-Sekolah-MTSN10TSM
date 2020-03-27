@extends('layouts.mfrontend')

@section('title')
	Gallery | MTSN 10 Tasikmalaya
@stop

@section('content')
<!-- Fact section -->
	<section class="fact-section spad set-bg" data-setbg="{{asset('frontend/img/gallery.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 fact">
					<div class="fact-text">
						<!-- <h2>Home > Profile Sekolah</h2> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fact section end-->

	<!-- Team section  -->
	<section class="team-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>MTSN 10 TASIKMALAYA</h3>
				<p>Gallery MTSN 10 Tasikmalaya</p>
			</div>
			<div class="row">
				@forelse($gallery as $gr)
				<div class="col-md-6 col-lg-3">
					<div class="panel-body member">
						<img src="{{ asset('images/gallery/'.$gr->image) }}" alt="image" class="img-thumbnail">
						<div class="member-social">
							<p>{{ $gr->caption }}</p>
						</div>
					</div>
				</div>
				@empty
				<div class="col-md-6">
					<b><i>Tidak Ada Data</i></b>
				</div>	
				@endforelse
			</div>
		</div>
	</section>
	<!-- Team section end -->
@stop