@extends('layouts.app')
 @section('content')
 <div class="container">
 	<div class="row">
 		<div class="col-12 col-md-4"></div>
 		<div class="col-12 col-md-4">
 			<div class="text-center"></div>
 			<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}"> {!! csrf_field() !!}
 				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
 					<label class="control-label">E-Mail</label>
 					<input type="email" class="form-control" placeholder="Insert email" name="email" value="{{ old('email') }}">@if ($errors->has('email')) 
 					<span class="help-block"> 
 						<strong>{{ $errors->first('email') }}</strong> 
 					</span> @endif
 				</div>
 				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
 					<label class="control-label">Password</label> 
 					<input type="password" placeholder="Insert password" class="form-control" name="password">@if ($errors->has('password')) 
 					<span class="help-block"> 
 						<strong>{{ $errors->first('password') }}</strong> 
 					</span> @endif
 				</div>
 				<div class="form-group">
 					<div class="checkbox"> 
 						<label> 
 							<input type="checkbox" name="remember"> Remember Me 
 						</label>
 					</div>
 				</div>
 				<div class="form-group"> 
 					<button type="submit" class="btn btn-block btn-danger"> Login </button> 
 					<br/> 
 					<a class="btn btn-link text-danger" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
 				</div>
 			</form>
 		</div>
 		<div class="col-12 col-md-4"></div>
 	</div>
 </div>
 @endsection