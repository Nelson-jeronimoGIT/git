<?php
if (!empty($_POST)){
    $txt_id =  utf8_decode($_POST["txt_id"]);
    $txt_codigo =  utf8_decode($_POST["txt_codigo"]);
    $txt_nombres =  utf8_decode($_POST["txt_nombres"]);
    $txt_apellidos =  utf8_decode($_POST["txt_apellidos"]);
    $txt_dirección =  utf8_decode($_POST["txt_dirección"]);
    $txt_telefono =  utf8_decode($_POST["txt_telefono"]);
    $drop_Puesto =  utf8_decode($_POST["drop_Puesto"]);
    $txt_fn =  utf8_decode($_POST["txt_fn"]);

    $sql ="";

    if (isset($_POST["btn_agregar"])) {
        $sql = "INSERT INTO empleados(Codigo,Nombres,Apellidos,Dirección,Telefono,fecha_nacimiento,id_Puesto)VALUES('" . $txt_codigo . "','" . $txt_nombres . "','" . $txt_apellidos . "','" . $txt_dirección . "','" . $txt_telefono . "','" . $txt_fn . "'," . $drop_Puesto . ");";
    }    
    if( isset($_POST['btn_modificar'])  ){
        $sql = "update empleados set codigo='". $txt_codigo ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',dirección='". $txt_dirección ."',telefono='". $txt_telefono ."',fecha_nacimiento='". $txt_fn ."',id_Puesto=". $drop_Puesto ." where id_empleados = ". $txt_id.";";
    }
    if( isset($_POST['btn_eliminar'])  ){
        $sql = "delete from empleados where id_empleados = ". $txt_id.";";
    }

        include("datos_conexion.php");
                $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);

                
                if ($db_conexion->query($sql) === true) {
                    $db_conexion->close();
                    echo"Exito";
                    header("Location: /empresa_php");
                } else {
                    echo "Error" . $sql . "<br>" . $db_conexion->error;
                }
        
}

