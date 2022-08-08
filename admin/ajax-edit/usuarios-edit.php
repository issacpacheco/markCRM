<?php
include('../class/allClass.php');

$regresar   = filter_input(INPUT_POST, 'regresar',      FILTER_SANITIZE_SPECIAL_CHARS);
$postload   = filter_input(INPUT_POST, 'returnpage',    FILTER_SANITIZE_SPECIAL_CHARS);
$div        = filter_input(INPUT_POST, 'load',          FILTER_SANITIZE_SPECIAL_CHARS);
$id         = filter_input(INPUT_POST, 'id',            FILTER_SANITIZE_NUMBER_INT);

use nsusuarios\usuarios;
use nsfunciones\funciones;

$info   = new usuarios();
$fn     = new funciones();



$usuario    = $info     -> obtener_usuario($id);
$area       = $info     -> obtener_grupos();
$subareas   = $info     -> obtener_subareas();
$niveles    = $info     -> nivelesusuarios();
$carea      = $fn       -> cuentarray($area);
$cniveles   = $fn       -> cuentarray($niveles);
$csubareas  = $fn       -> cuentarray($subareas);
?>

<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            Editar usuario
        </div>
        <div class="panel-body">
            <div class="profile-avatar-container">
                <div  id="crop-avatar" class="profile-avatar">
                    <!-- Current avatar -->
                    <div class="avatar-view" title="Cambiar imagen de perfil">
                        <div class="ih-item square effect6 from_top_and_bottom" style="width: 165px; height: 204px; margin: 0 auto;border:0;box-shadow: none">			
                            <a href="javascript: void(0)">
                                <div class="img">
                                    <?php 
                                    if (file_exists('../images/usuarios/'.$usuario['id'][0].'/foto.jpg')){
                                        $img = 'images/usuarios/'.$usuario['id'][0].'/foto.jpg?v='.rand();
                                    }else{
                                        $img = 'images/avatar.png';
                                    }
                                    ?>
                                    <img src="<?php echo $img ?>" title="Cambiar imagen" >
                                    <div class="info">
                                        <h3>Cambiar imagen</h3>
                                        <p><?php echo $usuario['nombre'][0];?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>		
                    <br>

                    <!-- Cropping modal -->
                    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1" >
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form class="avatar-form" action="ajax-save/crop-avatar" enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" id="avatar-modal-label">Cambiar imagen de perfil</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="avatar-body">
                                            <!-- Upload image and data -->
                                            <div class="avatar-upload">
                                                <input type="hidden" class="avatar-src" name="avatar_src">
                                                <input type="hidden" class="avatar-data" name="avatar_data">
                                                <input type="hidden" name="idusuario_foto" value="<?php echo $usuario['id'][0]; ?>">
                                                <label for="avatarInput">Subir imagen</label>
                                                <input type="file" class="avatar-input" id="avatarInput" name="avatar_file" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <!-- Crop and preview -->
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="avatar-wrapper"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="avatar-preview preview-lg"></div>
                                                </div>
                                            </div>
                                            <div class="row avatar-btns">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success btn-block btn-lg avatar-save"><i class="fa fa-save"></i> Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal -->

                    <!-- Loading state -->
                    <div class="loading" aria-label="Cargando..." role="img" tabindex="-1"></div>
                </div>
            </div>
            <form id="frmRegistro">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id; ?>">
                <input type="hidden" name="edicionPerfil" id="edicionPerfil" value="2">
                <div class="row">
                    <div class="form-wrapper col-sm-4">
                        <label>Nombre</label>
                        <div class="form-group">
                            <input type="text" class="form-control validar" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $usuario['nombre'][0]; ?>">
                        </div>
                    </div>

                    <div class="form-wrapper col-sm-4">
                        <label>Correo</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="correo" id="correo" placeholder="<?php echo $usuario['correo'][0]; ?>" value="<?php echo $usuario['correo'][0]; ?>">
                        </div>
                    </div>

                    <div class="form-wrapper col-sm-4">
                        <label>Contraseña</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="contrasena_personal" id="contrasena_personal" value="<?php echo $usuario['pass'][0]; ?>" autocomplete="nope">
                        </div>
                        <div style="margin-top:15px;">
                            <input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
                            &nbsp;&nbsp;Mostrar Contraseñas
                        </div>
                    </div>
                    <?php if($_SESSION['nivel'] == 99){ ?>
                    <div class="form-wrapper col-sm-4">
                        <label>Area</label>
                        <div class="form-group">
                            <select name="id_area" id="id_area" class="form-control">
                                <option value="0" selected>Selecciona un area</option>
                                <?php for($i = 0; $i < $carea; $i++){ ?>
                                <option value="<?php echo $area['id'][$i] ?>" <?php if($usuario['id_area'][0] == $area['id'][$i]){ echo  'selected'; } ?>><?php echo $area['nombre'][$i]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-wrapper col-sm-4">
                        <label>SubAreas</label>
                        <div class="form-group">
                            <select name="id_subarea" id="id_subarea" class="form-control">
                                <option value="0" selected>Selecciona una subarea</option>
                                <?php for($i = 0; $i < $csubareas; $i++){ ?>
                                <option value="<?php echo $subareas['id'][$i] ?>" <?php if($usuario['id_subarea'][0] == $subareas['id'][$i]){ echo  'selected'; } ?>><?php echo $subareas['nombre'][$i]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-wrapper col-sm-4">
                        <label class="left full mtop">Nivel de usuario</label>
                        <div class="form-group">
                            <select name="niveles" id="niveles" class="form-control left full">
                                <option value="0" selected>Selecciona un nivel</option>
                                <?php for($i = 0; $i < $cniveles; $i++){ ?>
                                <option value="<?php echo $niveles['id'][$i] ?>" <?php if($usuario['nivel'][0] == $niveles['id'][$i]){ echo  'selected'; } ?>><?php echo $niveles['nombre'][$i] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mright textright">
                    <button type="button" class="btnRegresar right btngral" onclick="saveInfo('usuario-edit', 'pr-usuarios', this);">
                        <span class="letrablanca font14">Guardar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--cropper-->
<script src="plugins/cropper-master/dist/cropper.min.js"></script>
<script src="js/crop_avatar.js"></script>
<script>
    $(document).ready(function () {
        $('#mostrar_contrasena').click(function () {
            if ($('#mostrar_contrasena').is(':checked')) {
                $('#contrasena_personal').attr('type', 'text');
            } else {
                $('#contrasena_personal').attr('type', 'password');
            }
        });
    });
</script>