<div class="login-box">
  <div class="login-logo">
      <!--modificamos cabecera-->
    <a href="#"><b>Clinica Galeno</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!--modificamos subtitulo-->
    <p class="login-box-msg">Ingresar como Administrador</p>

    <form method="post">
      <div class="form-group has-feedback">
        <!--modificamos parte de usuario-->
        <input type="text" class="form-control" name="usuario-Ing" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <!--modificamos parte de contraseña-->
        <input type="password" class="form-control" name="clave-Ing" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
            <!--modificamos parte de tamaño de columnas-->
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <?php
      
        $ingreso = new adminC();
        $ingreso->IngresarAdminC();

      ?>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>