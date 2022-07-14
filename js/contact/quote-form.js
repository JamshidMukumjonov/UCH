$(function(){
	$("#QuoteForm").submit(function(){
		$("#q_submitf").value='Please wait...';
		
		$.post("request-a-quote.php?send=comments", $("#QuoteForm").serialize(),
		function(data){
			if(data.frm_check == 'error'){ 
			
					$("#q_message_post").html("<div class='errorMessage'>ERROR: " + data.msg + "!</div>"); 
					document.QuoteForm.q_submitf.value='Resend >>';
					document.QuoteForm.q_submitf.disabled=false;
			} else {
				$("#q_message_post").html("<div class='successMessage'>Your message has been sent successfully!</div>"); 
				$('.form-control').val("");
				$("#q_submitf").value='Send >>';
				}
		}, "json");
		
		return false;
		
	});
});