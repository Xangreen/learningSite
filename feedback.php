<?php
require "header.php";
?>

		<div class="container-fluid" id="registration-wrapper">
			<form action="php/mail.php" method="post" id="feedbackForm">
			  <div class="form-group">
				<label for="name">Ваше имя</label>
				<input type="text" class="form-control" id="name" placeholder="Иванов Иван Иванович" name="name">
			  </div>
			  <div class="form-group">
				<label for="email">Адрес электронной почты</label>
				<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
			  </div>			 
			  <div class="form-group">
				<label for="phoneNumber">Номер телефона</label>
				<input type="text" class="form-control" id="phone" placeholder="8 000 000 00 00" name="phone">
			  </div>
			  <div class="form-group">
				<label for="message">Ваше сообщение</label>
				<textarea class="form-control" id="message" rows="3" name="message"></textarea>
			  </div>
			  <button type="submit" id="feedbackSubmit" class="btn btn-primary">Отправить</button>
			</form>
		</div>
		<div style="clear:both;">
		
		<div id="confirmation"></div>
		
		<!-- Модальное окно -->
<!-- 		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		  Запустить модальное окно
		</button>
		
		<button type="button" class="btn btn-primary" onclick="showResult('test')">
		  Запустить функцию модального окна
		</button> -->
		
		<div class="modal fade"  id="resultModal" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title">Результат отправки</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<p id="result">Modal body text goes here.</p>
			  </div>
			  <div class="modal-footer">
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Ок</button>
			  </div>
			</div>
		  </div>
		</div>	

<script type="text/javascript">

</script>		

<?php
require "footer.php";
?>