VirtualPet
<br>
<br>
<a href="<?php echo URL; ?>pet/logout">Logout</a>
<hr />
Nome: <?php echo $this->pet->name; ?><br>
Idade: <?php echo $this->pet->age; ?><br>
Fome: <progress value="<?php echo $this->pet->hunger; ?>" max="100"></progress><br>
Stress: <progress value="<?php echo $this->pet->stress; ?>" max="100"></progress><br>
<a href="<?php URL; ?>action/feed/strawberry">alimentar</a>
<a href="<?php URL; ?>action/play/ball">brincar</a>