@extends('layouts.app') 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 text-center">
			<br/> @include ('inc.home')<hr>
		</div>
		<div class="col-12 col-md-12 text-center">
			<h3 class="text-center"> User account <br/> 
				<a class="btn btn-danger rounded-circle display-4" href="users/create"> + </a>
			</h3>
			<p>Click icon + for add new and register user</p>
			<table class="table table-striped">
				<thead class="text-white bg-danger">
					<tr style="background-color: #fc9403">
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Update</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody> 
					@foreach($users as $user)
					<tr>
						<td>{!! $user->id !!}</td>
						<td>{!! $user->name !!}</td>
						<td>{!! $user->email !!}</td>
						<td> {!! Form::open(array('url' => "/users/$user->id/edit" , 'method' => 'GET')) !!} {!! Form::hidden('id', $user->id) !!} 
							<button type="submit" class="btn btn-info rounded-pill">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
									<path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/> 
									<path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/> 
									<path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/> 
								</svg> Edit
							</button> {!! Form::close() !!}
						</td>
						<td> {!! Form::open(array('url' => '/users/destroy' , 'method' => 'delete')) !!} {!! Form::hidden('id', $user->id) !!}
							<button type="submit" class="btn btn-dark rounded-pill"> 
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
									<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> 
									<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/> 
									<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/> 
								</svg> Del
							</button> {!! Form::close() !!}
						</td>
					</tr> @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
 @endsection