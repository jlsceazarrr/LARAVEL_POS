@extends('layouts.app') 
@section('content') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
<script type="text/javascript">function totalAmount(){var t=0;$('.amount').each(function(i,e){var amt=$(this).val()-0;t+=amt;});$('.total').html(t);} $(function(){$('.getmoney').change(function(){var total=$('.total').html();var getmoney=$(this).val();var t=getmoney-total;$('.backmoney').val(t).toFixed(2);});$('.add').click(function(){var product=$('.product_id').html();var n=($('.neworderbody tr').length-0)+1;var tr='<tr><td class="no">'+n+'</td>'+'<td><select class="form-control product_id" name="product_id[]">'+product+'</select></td>'+'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old(' email') }}"></td>'+'<td><input type="text" class="price form-control" name="price[]" value="{{ old(' email') }}"></td>'+'<td><input type="text" class="dis form-control" name="dis[]"></td>'+'<td><input type="text" class="amount form-control" name="amount[]"></td>'+'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';$('.neworderbody').append(tr);});$('.neworderbody').delegate('.delete','click',function(){$(this).parent().parent().remove();totalAmount();});$('.neworderbody').delegate('.product_id','change',function(){var tr=$(this).parent().parent();var price=tr.find('.product_id option:selected').attr('data-price');tr.find('.price').val(price);var qty=tr.find('.qty').val()-0;var dis=tr.find('.dis').val()-0;var price=tr.find('.price').val()-0;var total=(qty*price)-((qty*price*dis)/100);tr.find('.amount').val(total);totalAmount();});$('.neworderbody').delegate('.qty , .dis','keyup',function(){var tr=$(this).parent().parent();var qty=tr.find('.qty').val()-0;var dis=tr.find('.dis').val()-0;var price=tr.find('.price').val()-0;var total=(qty*price)-((qty*price*dis)/100);tr.find('.amount').val(total);totalAmount();});$('#hideshow').on('click',function(event){$('#content').removeClass('hidden');$('#content').addClass('show');$('#content').toggle('show');});});</script> 

<style>.hidden{display:none}.show{display:block !important}select.form-control.product_id{width:300px}</style> 

<script>function printPage(id) {var html="<html>";html+=document.getElementById(id).innerHTML;html+="</html>";var printWin=window.open('','','left=0,top=0,width=300,height=300,toolbar=0,scrollbars=0,status =0');printWin.document.write(html);printWin.document.close();printWin.focus();printWin.print();printWin.close();}</script> 

<script>function portPage(id) {var html="<html>";html+=document.getElementById(id).innerHTML;html+="</html>";var printWin=window.open('','','left=0,top=0,width=300,height=300,toolbar=0,scrollbars=0,status =0');printWin.document.write(html);printWin.document.close();printWin.focus();printWin.print();printWin.close();}</script> 

<div class="container">
	<div class="row">
		<div class="col-12 col-md-12 shadow p-3 p-md-5">
			<div id="">
				<form class="form-horizontal" id="yoyo" role="form" method="POST" action="{{ url('/orders') }}">@include ('errors.pos') {!! csrf_field() !!}
					<table class="table table-striped">
						<tr>
							<td>Customer 
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</td>
							<td>Notes 
								<input type="text" class="form-control" name="location" value="{{ old('location') }}">
							</td>
						</tr>
					</table>
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Product</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Discount</th>
								<th>Total</th>
								<th> 
									<input type="button" class="btn btn-sm rounded-circle btn-primary add" value="+">
								</th>
							</tr>
						</thead>
						<tbody class="neworderbody">
							<tr>
								<td class="no">1</td>
								<td> 
									<select class="form-control product_id" name="product_id[]">@foreach($products as $product)
										<option data-price="{!! $product->price !!}" value="{!! $product->id !!}">{!! $product->name!!}
										</option>@endforeach
									</select>
								</td>
								<td> 
									<input type="text" class="qty form-control" name="qty[]" value="{{ old('email') }}">
								</td>
								<td> 
									<input type="text" class="price form-control" name="price[]" value="{{ old('email') }}">
								</td>
								<td> 
									<input type="text" class="dis form-control" name="dis[]">
								</td>
								<td> 
									<input type="text" class="amount form-control" name="amount[]">
								</td>
								<td> 
									<input type="button" class="btn btn-sm rounded-circle btn-danger delete" value="X">
								</td>
							</tr>
						</tbody>
					</table>
					<div class="display-4 bg-danger text-white p-2">
						<p >Total:<b class="total">0</b></p>
					</div>
					<hr>
					<td>Payment 
						<input type="text" class="getmoney form-control">
					</td>
					<td>Change 
						<input type="text" class="backmoney form-control">
					</td>
					<hr> 
					<input type="submit" class="btn btn-primary btn-lg btn-block" name="save" value="Save"> <br/>
					<div class="text-center"> 
						<button type="button" id='hideshow' class="btn btn-info col-12 col-sm-3" data-toggle="modal" data-target="#myModal">Show
						</button> 
						<br> 
						<br> 
						<br> 
						<a class="text-danger" href="home"> 
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
								<path fill-rule="evenodd" d="M4.354 11.354a.5.5 0 0 0 0-.708L1.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z" /> 
								<path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0 0 1h9a.5.5 0 0 0 .5-.5z" /> 
								<path fill-rule="evenodd" d="M14 13.5a1.5 1.5 0 0 0 1.5-1.5V4A1.5 1.5 0 0 0 14 2.5H7A1.5 1.5 0 0 0 5.5 4v1.5a.5.5 0 0 0 1 0V4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5v-1.5a.5.5 0 0 0-1 0V12A1.5 1.5 0 0 0 7 13.5h7z" /> 
							</svg>Home page</a>| 
							<a class="text-danger" href="logout">Log Out 
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
									<path fill-rule="evenodd" d="M11.646 11.354a.5.5 0 0 1 0-.708L14.293 8l-2.647-2.646a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/> <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/> 
									<path fill-rule="evenodd" d="M2 13.5A1.5 1.5 0 0 1 .5 12V4A1.5 1.5 0 0 1 2 2.5h7A1.5 1.5 0 0 1 10.5 4v1.5a.5.5 0 0 1-1 0V4a.5.5 0 0 0-.5-.5H2a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-1.5a.5.5 0 0 1 1 0V12A1.5 1.5 0 0 1 9 13.5H2z"/> 
								</svg>
							</a>
						</div>
					</div>
				</form>
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">DETAILS</h4>
							</div>
							<div class="modal-body" id="print">
								<div class="panel-body " id="toPrint">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Ticket</th>
												<th>Price</th>
												<th>Qty</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>@foreach($orders as $order)
											<tr>
												<td>{!! $order->order_id !!}</td>
												<td>{!! $order->unitprice !!}</td>
												<td>{!! $order->quantity !!}</td>
												<td>{!! $order->amount !!}</td>
											</tr>
											<tr>	
											</tr>@endforeach
										</tbody>@foreach($orderby as $cust)	<b>
											<br/> Customer : {!! $cust->name !!}</b>
											<hr>@endforeach
									</table>
								</div>
							</div> 
							<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			
			<script lang='javascript'>$(document).ready(function(){$('#printPage').click(function(){var data='<input type="button" value="Print this page" onClick="window.print()">';data+='<div id="toPrint">';data+=$('#toPrint').html();data+='</div>';myWindow=window.open('','','width=400,height=400');myWindow.screenX=0;myWindow.screenY=0;myWindow.document.write(data);myWindow.focus();});});
		</script> 
	</div>
	<div class="col-12 text-center">
		
	</div>
</div>
</div>
@endsection