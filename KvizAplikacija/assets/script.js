$(document).ready(function(){
	$("#answerQuestionForm").submit(function(e){
		e.preventDefault();
		var dataForm  = $("#answerQuestionForm").serialize();
		
		$.ajax({
			type: "POST",
			url: "DatabaseProcessing/answerquestion.php",
			data: dataForm,		
			success: function(response){
				console.log(response);
				if(response == "bravo"){
					$("#success").show();
					$("#success").text("Tacan odgovor");
				}else if(response == "nemoze"){
					$("#error").show();
					$("#error").text("Vec ste odgovorili na pitanje");
				}else{
					$("#error").show();
					$("#error").text("Netacan odgovor")
				}
				$("#nextButton").show();

			}
		});
		return false;		
	});
	// if(location.href == "startkviz.php"){	
	// 	$(window).bind('beforeunload', function(){
 	//  		return 'Are you sure you want to leave?';
	// 	});	
	// }
});