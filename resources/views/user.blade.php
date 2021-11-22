@extends('layouts.app')

	@section('content')
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
                    <a href="#editEmployeeModal" onclick="editUser('{{$user['id']}}')" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" >&#xE254;</i></a>
                    <a href="#deleteEmployeeModal" class="delete" onclick="deleteUser('{{$user['id']}}')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" >&#xE872;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<input type="hidden" value="{{ route('add.user') }}" id="addUrl">

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
<input type="hidden" value="{{ route('get.user') }}" id="editUrl">
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
                <input type="hidden" id="updateUrl" value = "{{route('update.user')}}">
                <input type="hidden" id="editId" value="">
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
					<input type="button" class="btn btn-info" value="Save" id="updateUser">
                    
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
				<input type="hidden" id="deleteUrl" value = "{{route('delete.user')}}">
				<input type="hidden" id="deleteId" value = "">
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
					<input type="button" class="btn btn-danger" value="Delete" id="deleteUser">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('styles')
<style>
    h1 {
		background-color: red;
	}
	</style>
@endpush

@push('scripts')
@endpush
