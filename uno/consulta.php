<?php

$host="localhost";
$base="buscar_jquery";
$user="rodrigo";
$pass="rorro";

$conexion=new mysqli($host,$user,$pass,$base);

if($conexion -> connect_errno){
    die('Fallo la conexion:' ).$conexion->mysql_connect_errno();
}

$tabla="";
$query="select * from alumnos order by id";

/* cuando se pone la tecla */

if(isset($_POST['alumnos']))
{
    $con=$conexion->real_escape_string(($_POST['alumnos']));

    $query="select * from alumnos where
        id  like '%" .$con. "%' or
        nombre  like '%" .$con. "%' or
        ap  like '%" .$con. "%' or
        dir  like '%" .$con. "%'
    ";

}

$buscarAlu=$conexion->query($query);

    if($buscarAlu->num_rows > 0){
        $tabla.=
        '
            <table class="table">
                <tr class="bg-primary">
                <td>ID ALUMNO</td>
                <td>NOMBRE</td>
                <td>APELLIDOS</td>
                <td>DIRECCIÓN</td>                
                </tr>                  
        ';
        while($filaAlu=$buscarAlu->fetch_assoc())
        {
            $tabla.='
                <tr>
                    <td>'.$filaAlu['id'].'</td>
                    <td>'.$filaAlu['nombre'].'</td>
                    <td>'.$filaAlu['ap'].'</td>
                    <td>'.$filaAlu['dir'].'</td>
                
                </tr>
            ';
        }
        $tabla.='</table>';
    }
    else
    {
        $tabla="No se encontraron Registros";
    }

    echo $tabla;



?>