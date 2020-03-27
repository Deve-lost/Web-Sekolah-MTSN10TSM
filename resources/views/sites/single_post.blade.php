@extends('layouts.master')

@section('title')
	{{ $post->kategori }} | {{ $post->title }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Berita - {{ $post->title }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ asset('images/post/'.$post->thumbnail()) }}" alt="thumbnail" class="image-fluid" style="width:100%">
								        <div class="caption">
								          <h4> {{ $post->title }} - oleh {{ $post->user->name }} </h4> 
								          <p>
								          	{!! $post->content !!}
								          </p>
								          <br>
								          Di Publish Pada : {{ $post->created_at->format('D, d M y') }}
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
