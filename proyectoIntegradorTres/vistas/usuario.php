<?php
// Activamos el almacenamiento en el buffer
ob_start();
session_start();



  require('header.php');


?>

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <!-- <div class="box-header with-border">
                          <h1 class="box-title">Usuario <button class="btn btn-success" id="btnagregar" onclick="mostrarForm(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div> -->
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive"id="listadoregistros">

                      <?php
                          if( isset($_SESSION['user']['name'])){
                      ?>
                        <h2>Datos de Usuario</h2>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            
                              <table class="table table-bordered table-striped">
                                  <tr>
                                    <td>Nombre : </td>
                                    <td><?php echo $_SESSION['user']['name'] . '<br>';?></td>
                                  </tr>
                                  <tr>
                                    <td>Apellido : </td>
                                    <td><?php echo $_SESSION['user']['lastName'] . '<br>';?></td>
                                  </tr>
                                  <tr>
                                    <td>Correo : </td>
                                    <td><?php echo $_SESSION['user']['email'] . '<br>';?></td>
                                  </tr>
                                  
                              </table>
                          </div>
                        </div>
                      <?php }?>
                    </div>

                    <div class="panel-body" style="height: 750px;" id="formularioregistros">
                        <form method="POST" name="formulario" id="formulario">
                          <div class="form-group col-sm-12">
                            <label for="">Nombre(*) :</label>
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" maxlength="100" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Tipo Documento(*) :</label>
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                            	<option value="DNI">DNI</option>
                            	<option value="RUC">RUC</option>
                            	<option value="CEDULA">CEDULA</option>
                            </select>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Número(*) :</label>
                            <input type="text" class="form-control" name="num_documento" id="num_documento" placeholder="Documento" maxlength="20" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Dirección :</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70" placeholder="Dirección">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Teléfono :</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" maxlength="20">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Email :</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" maxlength="50" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Cargo :</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo" maxlength="20">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Login(*) :</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Login" maxlength="20" required>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="">Clave(*) :</label>
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="Clave" maxlength="20" required>
                          </div>

                         <!--  <div style="visibility: none;" class="form-group col-sm-6">
                           <label for="">Permisos :</label>
                           <ul style="list-style: none;" id="permisos">
                             
                           </ul>
                         </div>
                         
                         <div class="form-group col-sm-6">
                           <label for="">Imagen :</label>
                           <input type="file" class="form-control" name="imagen" id="imagen">
                           <input type="hidden" name="imagenactual" id="imagenactual">
                           <img src="" width="150px" height="120px" id="imagenmuestra">
                         </div> -->
                          <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-primary" id="btnGuardar"><i class="fa fa-save"></i>Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i>Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
  require('footer.php');
?>
<script src="scripts/usuario.js"></script>

<?php 
ob_end_flush();
?>