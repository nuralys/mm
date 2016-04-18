<div class="title">
	<h1>
		Прием в партию
	</h1>
</div>

<div class="structure">
	<div class="form">
		<form action="/join/sendmail" method="post" accept-charset="utf-8">
			<div class="form_input">
				<label for="">ФИО</label>
				<input type="text" name="data[Join][fio]">
			</div>
			<div class="form_input">
				<label for="">Почта</label>
				<input type="text" name="data[Join][email]">
			</div>
			<div class="form_input">
				<label for="">Телефон</label>
				<input type="text" name="data[Join][phone]">
			</div>
			<div class="form_input">
				<textarea  name="data[Join][body]" id="" cols="30" rows="10" placeholder="Текст сообщения"></textarea>
			</div>
			<!-- <div class="submit"><input type="submit" value="Вступить в партию"></div> -->
			<button class="buttons" type="submit">Вступить в партию</button>
		</form>
	</div>
</div>