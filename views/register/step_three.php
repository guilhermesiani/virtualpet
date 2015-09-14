VirtualPet
<br>
<br>
<form method="POST" action="<?php echo URL; ?>register/save">
	<fieldset>
		<legend>Espécie do pet</legend>
		<input type="radio" name="kind" value="flying"> Voador<br>
		<input type="radio" name="kind" value="marine"> Marinho<br>
		<input type="radio" name="kind" value="terrestrial"> Terrestre<br>
		<input type="submit" value="Cadastrar-se">
	</fieldset>
</form>