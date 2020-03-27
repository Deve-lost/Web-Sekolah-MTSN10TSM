@extends('layouts.master')

@section('title')
	Prestasi | {{ $prestasi->judul }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Prestasi - {{ $prestasi->judul }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ $prestasi->image }}" alt="thumbnail" class="image-fluid" style="width:100%">
								        <div class="caption">
								          <h4> {{ $prestasi->judul }} - oleh {{ $prestasi->user->name }} </h4> 
								          <p>
								          	{!! $prestasi->deskripsi !!}
								          </p>
								          <br>
								          Di Publish Pada : {{ $prestasi->created_at->format('D, d M y') }}
								        </div>
								    </div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
