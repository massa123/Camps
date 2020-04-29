<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración Medicos - CAMPS</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA?>/css/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" type="image.png" href="fotos/favicon_CAMPS.png">
    <script src="<?php echo RUTA?>/js/scripts.js"></script>
    <script src="https://kit.fontawesome.com/aa681c14be.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <script>
    </script>
    <?php require 'header.php'?>
  <div class="titulo_medicos administracion">
    <h2>Panel de Administracion</h2>
    <div class="botones_panel">
      <a class="botonestitulo botones_cards">Agregar especialidad</a>
      <a href="nuevo.php" class="botonestitulo botones_cards">Agregar medico</a>
      <a href="editar.php" class="botonestitulo botones_cards">Editar Medico</a>
    </div>
   </div>
  <section class="wrapper_especialidades">
    <div class="titulo_medicos">
      <h2>Saca tu turno</h2>
      <form action="medicos.php" method="get" class="buscar">
        <input type="text" placeholder="Buscar..." name="buscar">
      </form>
    </div>
      <?php foreach($especialidades as $especialidad):?>
        <div class="especialidad">
          <div class="separador">
            <h2><?php echo $especialidad['especialidad'];?></h2>  
          </div>
          <div class="wrapper_medicos">
            <?php $medicos = obtenerMedicos($conexion, $especialidad); ?>
            <?php foreach($medicos as $medico):?>
              <div class="medico">
                <img src="<?php echo RUTA;?>/fotos/user.jpg" class="foto_medico" alt="">
                <div class="info_medico">
                  <h4><?php echo $medico['nombre'];?></h4>
                  <p><?php echo $medico['especialidad'];?></p>
                  <p><?php echo $medico['horario de atencion'];?></p>
                </div>
                <div class="editar_borrar">
                  <form action="editar.php" method="get">
                    <input type="submit"><i class="far fa-edit"><a href="editar.php?id=<?php echo $medico['id']; ?>"><?php echo $medico['nombre'] ?></i>
                  </form>
                  <form action="borrar.php" method="get">
                    <input type="submit"><i class="fas fa-trash-alt"></a></i>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach;?>
    </section>
    <?php require '../views/footer.php'?>
  </body>
</html>

