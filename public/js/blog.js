// let appUrl = $('#appUrl').val();
let appUrl = window.location.origin;
// $(document).ready(function(){
// 	// Activate tooltip
// 	$('[data-toggle="tooltip"]').tooltip();

// 	// Select/Deselect checkboxes
// 	var checkbox = $('table tbody input[type="checkbox"]');
// 	$("#selectAll").click(function(){
// 		if(this.checked){
// 			checkbox.each(function(){
// 				this.checked = true;                        
// 			});
// 		} else{
// 			checkbox.each(function(){
// 				this.checked = false;                        
// 			});
// 		} 
// 	});
// 	checkbox.click(function(){
// 		if(!this.checked){
// 			$("#selectAll").prop("checked", false);
// 		}
// 	});
// });
$(document).ready(function () {
    var csrf_token = $("#csrf_token").val();
    $("#addNewUser").on("click", function () {
        let newName = $("#newName").val();
        let newEmail = $("#newEmail").val();
        let newMessage = $("#newMessage").val();
        let url = $("#addUrl").val();

        //alert('ok');
        if (newName.length != 0 && newEmail.length != 0) {
            $.post(url, {
                newName: newName,
                newEmail: newEmail,
                newMessage: newMessage,
                _method: 'POST',
                _token: csrf_token
            }, null, 'text')
                .done(function (response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    // console.log(res);
                    if (res.status == 'success') {
                        // $("#tableBody").load(location.href + "#tableBody");
                        // let html = "<tr><td>"+res.data.name+"</td><td>"+res.data.email+"</td><td>"+res.data.+"</td><td>{{$user['updated_at']}}</td><td><a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit' onclick='editUser({{$user['id']}})'>&#xE254;</i></a><a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete' onclick='deleteUser({{$user['id']}})'>&#xE872;</i></a></td></tr>"
                        // $("#tableBody").append(html);
                        window.location.href = appUrl;
                    }
                });
        }
    });

    
});
