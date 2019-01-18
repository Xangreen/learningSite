$(document).ready(function(){
	$("#feedbackForm").on("submit", function(event){
		event.preventDefault();
		
		/*
		var userName = $("#name").val();				
		var userEmail = $("#email").val();
		var userPhone = $("#phone").val();
		var userMessage = $("#message").val();			
		
		$.ajax({
			url:"php/mail.php",
			method:"POST",
			data: {
				name: userName,
				email: userEmail,
				phone: userPhone,
				message: userMessage						
				}					
			}).done( function(){
				$("#feedbackForm").append("<h2>Ваше сообщение успешно отправлено</h2>");
				console.log("success");	
			}).fail( function(){
				console.log("fail");	
			});*/
			/*
		$.ajax({
		url:"php/mail.php",
		type: "post",
		data: $("#feedbackForm").serialize(),
		success: function (html){
			$("#feedbackForm").append("<h2>Ваше сообщение успешно отправлено</h2>");
		}
		});
		*/
		
		
		//console.log( $( "#feedbackForm" ).serialize() );
						
/* 		$.ajax({
			url:"php/mail.php",
			method:"POST",
			data: $("#feedbackForm").serialize()					
			}).done( function(){ //function(result)
				showResult("Ваше сообщение отправлено");
				//$("#feedbackForm").append("<h2>Ваше сообщение успешно отправлено</h2>");
				//console.log("success");
				//console.log(result);				
			}).fail( function(){ //function(result)
				showResult("Ваше сообщение отправить не удалось");
				//console.log(result);	
				//console.log("fail");	
			}); */
		$.ajax({
			url:"php/comments.php",
			method:"POST",
			data: $("#feedbackForm").serialize()					
		}).done( function(){
			message = "Ваше сообщение отправленно успешно<br>"+"Ваше имя: "+$("#name").val()+"<br>"+"Номер вашего телефона: "+$("#phone").val()+"<br>"+"Номер вашей почты: "+$("#email").val()+"<br>"+"Ваше сообщение: "+$("#message").val()+"<br>";
			$("#confirmation").append(message);
			//console.log('операция выполнена успешно');
		}).fail( function(){
			//console.log('ошибка при выполнении');			
		});
			
	});
});

function showResult (resMessage) {
	$('#resultModal').modal();
	$( "#result" ).text(resMessage);
}
function verifyAdress(adres) {
	if (confirm("Вы уходите с сайта, перейти по адресу " + adres + "?")){
		document.location.href = adres;
	}			
}