$(document).ready(function(){

	$("body").delegate(".del_cat","click",function(){
		var did = $(this).attr("did");
		if (confirm("Are you sure ? You want to delete..!")) {
			$.ajax({
				url : "../includes/process.php",
				method : "POST",
				data : {deleteCategory:1,id:did},
				success : function(data){
					 if(data == "DELETED"){
						alert("Deleted Successfully");
					}else{
						alert(data);
					}
						
				}
			})
		}else{

		}
	})	
})