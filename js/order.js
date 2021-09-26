$(document).ready(function(){
	// var DOMAIN = "http://localhost/inv_project/public_html";

	addNewRow();

	$("#add").click(function(){
		addNewRow();
	})

	function addNewRow(){
		$.ajax({
			url :"includes/process.php",
			method : "POST",
			data : {getNewOrderItem:1},
			success : function(data){
				$("#invoice_item").append(data);
				var n = 0;
				$(".number").each(function(){
					$(this).html(++n);
				})
			}
		})
	}

	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})

	$("#invoice_item").delegate(".pid","change",function(){
		var pid = $(this).val();
		var tr = $(this).parent().parent();
		$(".overlay").show();
		$.ajax({
			url : "./includes/process.php",
			method : "POST",
			dataType : "json",
			data : {getPriceAndQty:1,id:pid},
			success : function(data){
				tr.find(".tqty").val(data["product_stock"]);
				tr.find(".pro_name").val(data["product_name"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["product_price"]);
				calculate(0,0);
			}
		})
	})

	$("#invoice_item").delegate(".qty","keyup",function(){
		var qty = $(this);
		var tr = $(this).parent().parent();
		if (isNaN(qty.val())) {
			alert("Please enter a valid quantity");
			qty.val(1);
		}else{
			if ((qty.val() - 0) > (tr.find(".tqty").val()-0)) {
				alert("Sorry ! This much of quantity is not available");
				aty.val(1);
			}else{
				tr.find(".amt").html(qty.val() * tr.find(".price").val());
				calculate(0,0);
			}
		}

	})

	function calculate(dis,paid){
		var sub_total = 0;
		$(".amt").each(function(){
			sub_total = sub_total + ($(this).html() * 1);
		})
		$("#sub_total").val(sub_total);
	}

	/*Order Accepting*/

	$("#order_form").click(function(){

		var invoice = $("#get_order_data").serialize();

		if ($("#cust_name").val() === "") {
			alert("Please Enter Customer Name");
		}else{
			$.ajax({
				url : "./includes/process.php",
				method : "POST",
				data : $("#get_order_data").serialize(),
				success : function(data){

					if (data === "ORDER_COMPLETED") {
						$("#get_order_data").trigger("reset");
						if (confirm("Do u want to print Invoice ?")) {
							window.location.href = "./includes/invoice_bill.php?"+invoice;
						}
					}
				}
			});
		}

	});

});