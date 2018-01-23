@extends('layouts/default')

@section('pagetitle') Upload document - EdPaper @endsection

@section('navbar')
<li class="nav-item"><a href="/" class="nav-link">Home</a></li>
<li class="nav-item"><a href="/cat" class="nav-link">Categories</a></li>
<li class="nav-item"><a href="/account" class="nav-link">Account</a></li>
<li class="nav-item"><a href="/logout" class="nav-link">Logout <i>({{ Auth::user()->name }})</i></a></li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h2 class="text-center display-4">Upload document</h2>
    </div>
    @if ( count( $errors ) > 0 )
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif
    <br />
    <form class="form-horizontal" role="form" method="POST" action="/doc/add" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Title</label>
            <div class="col-sm-5">
                <input id="name" type="text" class="form-control" name="title" maxlength="40" >
            </div>
        </div>
        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
         <div class="col-sm-offset-4 col-sm-5"><input type="file" name="document" id="document"> (max 25MB, PDF only)</div>
     </div>

     @if (count($cats) > 0)
     <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
        <label for="categories" class="col-md-4 control-label">Categories</label>

        <div class="col-md-6">


            @foreach ($cats as $cat)
            <input class="checkbox-inline" type='checkbox' name="catId[]" value="{{ $cat->id }}">{{ $cat->title }}<br>
            @endforeach
        </div>
    </div>
    @endif
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-check-circle"></i> Submit
            </button>
        </div>
    </div>
</form>
</div>
@endsection
