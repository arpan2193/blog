@include('header')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach($users as $user)
            <tr>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['created_at']}}</td>
                <td>{{$user['updated_at']}}</td>
                <td>
                    <a onclick="editUser({{$user['id']}})" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" >&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" onclick="deleteUser({{$user['id']}})">&#xE872;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<input type="hidden" value="{{ route('add.user') }}" id="addUrl">
<input type="hidden" value="{{ csrf_token() }}" id="csrf_token">
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                
				<div class="modal-body">					
					<div class="form-group">
						<label>Name*</label>
						<input type="text" class="form-control" id="newName" required>
					</div>
					<div class="form-group">
						<label>Email*</label>
						<input type="email" class="form-control" id="newEmail" required>
					</div>
					<div class="form-group">
						<label>Message</label>
						<textarea class="form-control"id="newMessage"></textarea>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-success" value="Add" id="addNewUser">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
                <input type="hidden" value="{{ route('get.user') }}" id="editUrl">
                <input type="hidden" id="editId">
				<div class="modal-header">						
					<h4 class="modal-title">Edit User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" id="editName" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" id="editEmail" required>
					</div>
					<div class="form-group">
						<label>Message</label>
						<textarea class="form-control" id="editMessage"></textarea>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" class="btn btn-info" value="Save" id="editUser">
                    
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete this Record?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
@include('footer')

<script>
function editUser(id) {

let url = $("#editUrl").val();
$.post(url, {
    id: id,
    _method: 'POST',
    _token: csrf_token
}, null, 'text')
    .done(function (response) {
        console.log(response);
        var res = JSON.parse(response);
        console.log(res);

    });
}

</script>