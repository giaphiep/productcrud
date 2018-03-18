<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product CRUD</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>
	<div class="container">
		<button id="add-new" class="btn btn-sm btn-primary" style="margin: 30px 0;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new</button>

		<table class="table table-striped table-bordered table-hover" id="product-table">
	        <thead>
	            <tr>
	               <th class="stl-column color-column">#</th>
	               <th class="stl-column color-column">Name</th>
	               <th class="stl-column color-column">Price</th>
	               <th class="stl-column color-column">Created at</th>
	               <th class="stl-column color-column">Action</th>
	            </tr>
	        </thead>
	    </table>

	</div>

	<div class="modal fade" id="add">
		<div class="modal-dialog">
			<form action="" name="form_add" method="post" id="form-add">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new</h4>
					</div>
					<div class="modal-body">

							<div class="form-group">
								<label for="">Name</label>
								<input type="text" required class="form-control" id="name" placeholder="Name">
								<label class="error"></label>
							</div>
							<div class="form-group">
								<label for="">Price</label>
								<input type="number" required class="form-control" id="price" placeholder="Price">
								<label class="error"></label>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-sm btn-primary">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="show">
		<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><i class="fa fa-eye" aria-hidden="true"></i> Detail</h4>
					</div>
					<div class="modal-body">

							<div class="table-responsive">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td style="font-weight: bold;width: 30%">#</td>
											<td style="width: 70%" id="show-id"></td>
										</tr>
										<tr>
											<td style="font-weight: bold;width: 30%">Name</td>
											<td style="width: 70%" id="show-name"></td>
										</tr>
										<tr>
											<td style="font-weight: bold;width: 30%">Price</td>
											<td style="width: 70%" id="show-price"></td>
										</tr>
										<tr>
											<td style="font-weight: bold;width: 30%">Created at</td>
											<td style="width: 70%" id="show-created-at"></td>
										</tr>
										<tr>
											<td style="font-weight: bold;width: 30%">Updated at</td>
											<td style="width: 70%" id="show-updated-at"></td>
										</tr>
									</tbody>
								</table>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
						
					</div>
				</div>
		</div>
	</div>
	
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<form action="" name="form_update" method="post" id="form-update">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><i class="fa fa-edit"></i> Edit</h4>
					</div>
					<div class="modal-body">

							<div class="form-group">
								<label for="">Name</label>
								<input type="text" required class="form-control" id="name-edit" placeholder="Name">
								<label class="error"></label>
							</div>
							<div class="form-group">
								<label for="">Price</label>
								<input type="number" required class="form-control" id="price-edit" placeholder="Price">
								<input type="hidden" class="form-control" id="id-edit" value="">
								<label class="error"></label>
							</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-sm btn-primary">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script type="text/javascript">

		$(function() {

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			//set timeout toastr
			toastr.options = {
				"preventOpenDuplicates": true,
				"timeOut": 600
			};

			
		    var table = $('#product-table').DataTable({
		        processing: true,
		        serverSide: true,
		        order: [], 
		        ajax: '{!! route('product.list') !!}',
		        columns: [
		            {data: 'id', name: 'id'},
		            {data: 'name', name: 'name'},
		            {data: 'price', name: 'price'},
		            {data: 'created_at', name: 'created_at'},
		            {data: 'action', name: 'action', orderable: false, searchable: false}
		        ]
		    });

		    // add new
		    $(document).on('click', '#add-new', function() {
				$('#add').modal('show');
				$('#name').val('');
				$('#price').val('');
		    });

		    $(document).on('submit', '#form-add', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: 'product',
					data: {
						name: $('#name').val(),
						price: $('#price').val()
					},
					success: function (response) {

						toastr.success('Add success!');
						$('#add').modal('hide');
			            table.ajax.reload(); 

					}, error: function (xhr, ajaxOptions, thrownError) {
	                    toastr.error(thrownError);
	                  }
				});
		    });
			

		    //delete
		    $(document).on('click', '.btn-danger', function() {

		    	var id = $(this).data('id');

		        swal({
		            title: "Are you sure ?",
		            type: "warning",
		            showCancelButton: true,
		            confirmButtonColor: "#DD6B55",
		            cancelButtonText: "Cancel",
		            confirmButtonText: "Yes",
		        },

		        function(isConfirm) {
		            if (isConfirm) {  
			            $.ajax({
			                  type: "DELETE",
			                  url: 'product/' + id,
			                  success: function(response)
			                  {
			                        toastr.success('Delete success');
			                        table.ajax.reload(); 

			                  }, error: function (xhr, ajaxOptions, thrownError) {
			                    toastr.error(thrownError);
			                  }
			            }); 
		            }
		        });
		    });

		    //show
		    $(document).on('click', '.btn-info', function() {
				$('#show').modal('show');
		    	var id = $(this).data('id');

		    	$.ajax({
		    		type: 'get',
		    		url: 'product/' + id,
		    		success: function (response) {

						$('#show-id').text(response.id);
						$('#show-name').text(response.name);
						$('#show-price').text(response.price);
						$('#show-created-at').text(response.created_at);
						$('#show-updated-at').text(response.updated_at);
						

					}, error: function (xhr, ajaxOptions, thrownError) {
	                    toastr.error(thrownError);
	                  }
		    	})
				
			});


			//update
			$(document).on('click', '.btn-warning', function() {
				$('#edit').modal('show');
		    	var id = $(this).data('id');

				$.ajax({
		    		type: 'get',
		    		url: 'product/' + id,
		    		success: function (response) {

						$('#id-edit').val(response.id);
						$('#name-edit').val(response.name);
						$('#price-edit').val(response.price);
						
					}, error: function (xhr, ajaxOptions, thrownError) {
	                    toastr.error(thrownError);
	                  }
		    	})
			});

			$(document).on('submit', '#form-update', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'put',
					url: 'product/' + $('#id-edit').val(),
					data: {
						name: $('#name-edit').val(),
						price: $('#price-edit').val()
					},
					success: function (response) {

						toastr.success('Update success!');
						$('#edit').modal('hide');
			            table.ajax.reload(); 

					}, error: function (xhr, ajaxOptions, thrownError) {
	                    toastr.error(thrownError);
	                  }
				});
		    });

		});

		</script>
		
</body>
</html>

