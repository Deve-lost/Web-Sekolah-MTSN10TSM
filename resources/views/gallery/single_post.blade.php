@extends('layouts.master')

@section('title')
	Gallery | {{ $gallery->caption }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Gallery - {{ $gallery->caption }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ $gallery->image }}" alt="thumbnail" class="image-fluid" style="width:100%">
								        <div class="caption">
								          <h4> {{ $gallery->caption }} - oleh {{ $gallery->user->name }} </h4> 
								          <br>
								          Di Publish Pada : {{ $gallery->created_at->format('D, d M y') }}
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
