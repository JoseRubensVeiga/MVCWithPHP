<div class="container">
	<div class="row justify-content-center">
		<div style="margin-top: 45px;" class="jumbotron col-md-5">
			<h1 class="display-3 text-center">Login</h1>
			<p class="text-center">Insira login e senha para entrar</p>

			<form action="./login" method="POST">
				<div class="form-group">
					<label >Login</label>
					<input class="form-control" type="text" name="login" required />
				</div>
				<div class="form-group">
					<label>Senha</label>
					<input class="form-control" type="password" name="password" required />
				</div>
				<div class="form-check form-group">
				  <input class="form-check-input" type="checkbox" value="" id="checkbox-pdv" required >
				  <label class="form-check-label" for="checkbox-pdv">
				    Aceito as <a href="./politica-de-privacidade">Políticas de Privacidade</a>
				  </label>
				</div>
				<input class="btn btn-primary btn-block" type="submit" value="Entrar" name="submit">

				<p class="float-left mt-4"><a href="./politica-de-privacidade">Política de Privacidade</a></p>
				<p class="float-right mt-4"><a href="./recovery-password">Esqueci minha senha</a></p>
			</form>
		</div>	
	</div>
</div>

