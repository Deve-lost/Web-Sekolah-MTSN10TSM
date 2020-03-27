@extends('layouts.master')

@section('title')
	{{ $ds->judul }}
@stop

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">{{ $ds->judul }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
								    <div class="thumbnail">
								        <img src="{{ $ds->image }}" alt="thumbnail" class="image-fluid" style="width:100%">
								        <div class="caption">
								          <h4> {!! $ds->deskripsi !!} - oleh {{ $ds->user->name }} </h4> 
								          <br>
								          Di Publish Pada : {{ $ds->created_at->format('D, d M y') }}
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
