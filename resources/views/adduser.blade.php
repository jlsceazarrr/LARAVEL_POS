@extends('layouts.app')
 @section('content')
 <div class="container">
 	<div class="row">
 		<div class="col-12 col-md-12 text-danger text-center"> 
 			<svg width="6em" height="6em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
 				<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/> 
 				<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/> 
 				<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/> 
 			</svg>
 			<h3>New User</h3>
 		</div>
 		<div class="col-12 col-md-4"></div>
 		<div class="col-12 col-md-4 p-3 md-5">
 			<form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}"> {!! csrf_field() !!}
 				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
 					<label class="control-label">Name</label> 
 					<input type="text" class="form-control" name="name" value="{{ old('name') }}">@if ($errors->has('name')) 
 					<span class="help-block"> 
 						<strong>{{ $errors->first('name') }}</strong> 
 					</span> @endif
 				</div>
 				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
 					<label class="control-label">E-Mail Address</label> 
 					<input type="email" class="form-control" name="email" value="{{ old('email') }}">@if ($errors->has('email')) 
 					<span class="help-block"> 
 						<strong>{{ $errors->first('email') }}</strong> 
 					</span> @endif
 				</div>
 				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
 					<label class="control-label">Password</label> 
 					<input type="password" class="form-control" name="password">@if ($errors->has('password')) 
 					<span class="help-block"> 
 						<strong>{{ $errors->first('password') }}</strong> 
 					</span> @endif
 				</div>
 				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"> 
 					<label class="control-label">Confirm Password</label> 
 					<input type="password" class="form-control" name="password_confirmation">@if ($errors->has('password_confirmation')) 
 					<span class="help-block"> 
 						<strong>{{ $errors->first('password_confirmation') }}</strong> 
 					</span> @endif
 				</div>
 				<div class="form-group"> 
 					<button type="submit" class="btn btn-danger btn-block" style="background-color: #fc9403;"> Register 
 					</button> 
 					<a href="/users" class="btn btn-dark btn-block"> Cancel </a>
 				</div>
 			</form>
 		</div>
 		<div class="col-12 col-md-4"></div>
 	</div>
 </div> 
 @endsection