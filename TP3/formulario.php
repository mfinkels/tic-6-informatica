<?php
  require_once('funciones.php');

  $nombre = isset($info['nombre']) ? $info['nombre'] : '';
  $apellido = isset($info['apellido']) ? $info['apellido'] : '';
  $usuario = isset($info['usuario']) ? $info['usuario'] : '';
  $email = isset($info['email']) ? $info['email'] : '';
  $confirm_email = isset($info['confirm_email']) ? $info['confirm_email'] : '';
  $contrasena = isset($info['contrasena']) ? $info['contrasena'] : '';
  $confirm_contrasena = isset($info['confirm_contrasena']) ? $info['confirm_contrasena'] : '';
  $sexo = isset($type['sexo']) ? $info['sexo'] : '';
  $dia = isset($info['dia']) ? $info['dia'] : '';
  $mes = isset($info['mes']) ? $info['mes'] : '';
  $ano = isset($info['ano']) ? $info['ano'] : '';
  $bio = isset($info['bio']) ? $type['bio'] : '';
  $cats = isset($info['cats']) ? $info['cats'] : array();
  $terminos = isset($info['terminos']) ? $info['terminos'] : '';

if ($_POST){
  $error = ValidationError($_POST);
  if(count($error) == 0){
    header('location: felicitaciones.php');
    exit;
  } else if (count($error) > 0){
    echo '<div class="alert alert-danger" role="alert">';

      foreach($error as $e) {
        echo $e . "<br/>";
      }

    echo "</div>";
  }
}
?>
<form class="formulario" action="registracion.php" method="POST">

  <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre ?>" /><br/>
  <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo $apellido ?>" /><br/>
  <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" value="<?php echo $usuario ?>"/><br/>
  <input type="text" class="form-control" placeholder="Correo Electronico" name="email" value="<?php echo $email ?>"/><br/>
  <input type="text" class="form-control" placeholder="Corfirmacion Correo Electronico" name="confirm_email" value="<?php echo $confirm_email ?>"/><br/>
  <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" value="<?php echo $contrasena ?>" /><br/>
  <input type="password" class="form-control" placeholder="Confirmacion" name="confirm_contrasena" value="<?php echo $confirm_contrasena ?>"/><br/>
  Sexo: <input type="radio" name="sexo" value="Femenino" <?php if($sexo == "Femenino"){?> checked="checked" <?php } ?>/>Femenino <input type="radio" name="sexo" value="Masculino" <?php if($sexo == "Masculino"){?> checked="checked" <?php } ?> /> Masculino<br/>

  <div>
  Fecha de Nacimiento:
  <select name="dia">
    <option value="">Dia</option>
    <?php
      for($i =1; $i <=31; $i++)
      {
        if ($dia == $i){?>
        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
        <?php }else { ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
      <?php }
      } ?>

  </select>

  <select name="mes">
    <option value="">Mes</option>
    <?php
      for($i =1; $i <=12; $i++)
      {
        if ($mes == $i){?>
        <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
        <?php }else { ?>
        <option value="<?php echo $i;?>"><?php echo $i;?></option>
      <?php }
      } ?>
  </select>

  <select name="ano">
      <option value="">Año</option>
      <option value="">Año</option>
    <?php for($i = date('Y'); $i >= (date('Y') - 100); $i--) {
      if ($ano == $i){?>
      <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
      <?php }else { ?>

      <option value="<?php echo $i;?>"><?php echo $i;?></option>
      <?php }
      } ?>
  </select>
</div>

<textarea name="bio" class="form-ontrol" rows="5" cols="20"><?php echo $bio;?></textarea>

<div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="cats[]" value="1" <?php if (in_array(1, $cats)) { ?> checked="checked" <?php } ?> />Categoria 1
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="cats[]" value="2" <?php if (in_array(2, $cats)) { ?> checked="checked" <?php } ?> />Categoria 2
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="cats[]" value="3" <?php if (in_array(3, $cats)) { ?> checked="checked" <?php } ?> />Categoria 3
    </label>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="cats[]" value="4" <?php if (in_array(4, $cats)) { ?> checked="checked" <?php } ?> />Categoria 4
    </label>
  </div>
</div>

<div>
  <div class="checkbox">
    <label>
          <input type="checkbox" name="terminos" value="1" <?php if ($terminos==1) echo "checked"; ?> />Terminos y condiciones
    </label>
  </div>
</div>

<center>
  <input type="submit" class="btn btn-default" value="Enviar">
</center>
</form>
