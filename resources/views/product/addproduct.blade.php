@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 text-danger text-center"> 
			<svg width="6em" height="6em" viewBox="0 0 16 16" class="bi bi-box-seam" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/> 
			</svg><h3>Update Products
			</h3>
		</div>
		<div class="col-12 col-md-4"></div>
		<div class="col-12 col-md-4">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/product') }}"> {!! csrf_field() !!}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
					<label class="control-label">Product Name</label> 
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
					<label class="control-label">Description</label> 
					<input type="text" class="form-control" name="desc" value="{{ old('email') }}">
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
					<label class="control-label">Sell Price</label> 
					<input type="text" class="form-control" name="price">
				</div>
				<div class="form-group"> 
					<label class="control-label">Buy Price</label> 
					<input type="text" class="form-control" name="quantity">
				</div>
				<div class="form-group"> 
					<button type="submit" class="btn btn-danger btn-block"> Update 
					</button>
					<a href="/product" class="btn btn-dark btn-block"> Cancel</a>
				</div>
			</form>
			<div class="col-12 col-md-4"></div>
		</div>
	</div> 
	@endsection