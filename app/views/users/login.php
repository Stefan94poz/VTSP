<div class="login">
	<div class="container">
		<div class="login-form">
			<h1>ПРИЈАВА</h1>
			<form method="post" >
				<div class="form-group">
					<label for="">Корисничко име/Број индекса</label>
					<input type="text" class="form-control"  name="kor_ime"/>
				</div>
				<div class="form-group">
					<label for="">Шифра</label>
					<input type="password" class="form-control"  name="sifra"/>
				</div>
				<select name="status">
					<option value="student">Студент</option>
					<option value="profesor">Професор</option>
					<option value="ssluzba">Студентска служба</option>
			 </select>
				<input type="submit" name="submit" value="ПРИЈАВИ СЕ" class="login-button" />
			</form>
		</div>
	</div>
</div>
