@extends('layouts/default')

@section('pagetitle') Edit category - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href=" /cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href=" /account" class="nav-link">Account</a></li>
<li class="nav-item"><a href=" /logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<h2 class="text-center">Edit category "{{ $cat->title }}"</h2>
	</div>
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<form class="form-inline" method="POST" action="/cat/{{ $cat->id }}/edit">
			{{ csrf_field() }}
				<div class="input-group col-xs-12">
					<input type="text" class="form-control" name="title" id="title" maxlength="20" value="{{ $cat->title }}">
					<span class="input-group-btn">
						<button class="btn btn-info" type="submit">Submit</button>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
