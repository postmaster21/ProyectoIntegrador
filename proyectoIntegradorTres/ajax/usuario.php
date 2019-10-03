<?php 
session_start();
require_once("../modelos/Usuario.php");

$usuario = new Usuario();

$idusuario = $_POST['idusuario'];
$nombre = $_POST['nombre'];
$tipo_documento = $_POST['tipo_documento'];
$num_documento = $_POST['num_documento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$login = $_POST['login'];
$clave = $_POST['clave'];
$imagen = $_POST['imagen'];

$idusuario = isset($idusuario)?limpiarCadena($idusuario):"";
$direccion = isset($direccion)?limpiarCadena($direccion):"";
$telefono = isset($telefono)?limpiarCadena($telefono):"";
$email = isset($email)?limpiarCadena($email):"";
$nombre = isset($nombre)?limpiarCadena($nombre):"";
$cargo = isset($cargo)?limpiarCadena($cargo):"";
$login = isset($login)?limpiarCadena($login):"";
$clave = isset($clave)?limpiarCadena($clave):"";
$imagen = isset($imagen)?limpiarCadena($imagen):"";

switch ($_GET['op']) {
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			$imagen = $_POST["imagenactual"];
		}else{
			$ext = explode(".", $_FILES['imagen']['name']);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/usuarios/" . $imagen);
			}
		}

		// Hash SHA256 en la contraseña
		//$clavehash = hash("SHA256",$clave);


		if ( empty($idusuario) ) {
			$rspta = $usuario->insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$_POST['permiso']);
			echo $rspta ? "Se registro el usuario" : "No se pudieron registrar todos los datos del usuario";
		}else{
			$rspta = $usuario->editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$_POST['permiso']);
			echo $rspta ? "Se edito al usuario" : "No se pudo editar al usuario";
		}
		break;

	case 'mostrar':
			$rspta = $usuario->mostrar( $idusuario );
			echo json_encode($rspta);
		break;

	case 'listar':
			$rspta = $usuario->listar();

			$data = Array();

			while ($reg = $rspta->fetch_object()) {
				$data[] = array(
					"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.'
						<button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
						'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.'
						<button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
					"1"=>$reg->nombre,
					"2"=>$reg->tipo_documento,
					"3"=>$reg->num_documento,
					"4"=>$reg->telefono,
					"5"=>$reg->email,
					"6"=>$reg->login,
					"7"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px'>",
					"8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
				);
			}
			$results = array(
				"sEcho"=>1, //informacion para el datatables
				"iTotalRecords"=>count($data),
				"iTotalDisplayRecords"=>count($data),
				"aaData"=>$data
			);

			echo json_encode($results);
			
		break;

		case 'permisos':

			require_once "../modelos/Permiso.php";
			$permiso = new Permiso();
			$rspta = $permiso->listar();

			// obtener los permisos asignados al usuario

			$id = $_GET['id'];
			$marcados = $usuario->listarmarcados($id);
			//Declaramos el array para almacenar todos los permisos marcados
			$valores = array();

			//Almacenar los permisos asignados al usuario en el array
			while ($per = $marcados->fetch_object()) {
				array_push($valores, $per->idpermiso);
			}

			//Mostramos la lista de permisos en la vista y si están o no marcados

			while ($reg = $rspta->fetch_object()) {

				$sw = in_array($reg->idpermiso, $valores)?'checked':'';
				echo '<li> <input type="checkbox" '.$sw.' name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
			}

		break;

		case 'verificar':
			$logina = $_POST['logina'];
			$clavea = $_POST['clavea'];

			//Hash SHA256 en la contraseña

			//$clavehash = hash("SHA256", $clavea);

			//$rspta = $usuario->verificar($logina, $clavehash);
			$rspta = $usuario->verificar($logina, $clavea);

			$fetch = $rspta->fetch_object();

			if (isset($fetch)) {
				//Declaramos las variables de sesion
				$_SESSION['idusuario'] = $fetch->idusuario;
				$_SESSION['nombre'] = $fetch->nombre;
				$_SESSION['imagen'] = $fetch->imagen;
				$_SESSION['login'] = $fetch->login;
			}

			// obtenemos los permisos del usuario

			$marcados = $usuario->listarmarcados($fetch->idusuario);

			// declaramos el array para almacenar todos los permisos marcados
			$valores = array();

			// almacenamos los permisos marcados en el array

			while ($per = $marcados->fetch_object()) {
				array_push($valores, $per->idpermiso);
			}

			// Determinamos los acceso del usuario
			in_array(1, $valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
			in_array(2, $valores)?$_SESSION['almacen']=1:$_SESSION['almacen']=0;
			in_array(3, $valores)?$_SESSION['compras']=1:$_SESSION['compras']=0;
			in_array(4, $valores)?$_SESSION['ventas']=1:$_SESSION['ventas']=0;
			in_array(5, $valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
			in_array(6, $valores)?$_SESSION['consultac']=1:$_SESSION['consultac']=0;
			in_array(7, $valores)?$_SESSION['consultav']=1:$_SESSION['consultav']=0;

			echo json_encode($fetch);

		break;

		case 'salir':
			//Limpiamos las variables de sesion
			session_unset();
			//Destruimos la sesion
			session_destroy();
			//Redireccionamos al login
			header('Location: ../index.php');

		break;

	
	default:
		# code...
		break;
}

?>