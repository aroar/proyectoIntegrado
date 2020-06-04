<?php
    include "conexionbd.php";
    $mysqli = conexion();
// me quedo con la categoría a insertar y según sea lanzo un código u otro
    $tabla=$_REQUEST["tabla"];
    session_start();

    if($tabla == "Sala"){

        $butacas= $_REQUEST["butacas"];
        $tiposala= $_REQUEST["tiposala"];

        if($mysqli->query( "INSERT INTO Sala(Butacas,Tipo) VALUES ('".$butacas."','".$tiposala."')")){
            echo "Sala insertada correctamente".$butacas; 

        }

    }else if($tabla == "Tarifa"){
        $definicion=$_REQUEST['definicion'];
        $precio=$_REQUEST['precio'];
        if($mysqli->query( "INSERT INTO Tarifa(Definicion,Precio) VALUES ('".$definicion."',".$precio.")")){
            echo "Tarifa insertada correctamente"; 

        }


    }else if($tabla == "Pelicula"){
        $titulo=$_REQUEST['titulo'];
        $anio=$_REQUEST['año'];
        $duracion=$_REQUEST['duracion'];
        $calificacion=$_REQUEST['calificacion'];
        $estreno=$_REQUEST['estreno'];
        $genero=$_REQUEST['genero'];
        $pais=$_REQUEST['pais'];
        $sinopsis=$_REQUEST['sinopsis'];
        if($mysqli->query( "INSERT INTO Pelicula(Año,Título,País,Género,Duración,FechadeEstreno,Calificación,Sinopsis)
         VALUES ('".$anio."','".$titulo."','".$pais."','".$genero."','".$duracion."','".$estreno."','".$calificacion."','".$sinopsis."')")){
            echo "Pelicula insertada correctamente";      

         }
    }else if($tabla=="Proyeccion"){

        $sala=$_POST['salas'];
        $pelicula=$_POST['peliculas'];
        $tarifa=$_POST['tarifas'];
        $fecha=$_POST['Fecha'];
        $hora=$_POST['Hora'];
        if($mysqli->query( "INSERT INTO Proyeccion(idSala,idPelicula,idTipo,Fecha,Hora)
         VALUES (".$sala.",".$pelicula.",".$tarifa.",'".$fecha."','".$hora."')")){
            echo "Proyeccion insertada correctamente";      

         }else{
            printf("Errormessage: %s\n", $mysqli->error);
         }

    }else if($tabla=="Valoracion"){
        $valoracion=$_POST['options'];
        if($valoracion>0){
            $peli=$_POST['idpeli'];
            $usuario= $_SESSION['idusuario'];
            $mysqli->query("INSERT INTO Valoración (idUsuario, idPelicula, Valoración) VALUES ('" . $usuario . "','" . $_POST['idpeli'] . "'," . $_POST['options'] . ")");
            echo "Valoracion añadida correctamente";
        }else{
            echo "Elija una valoración del 1 al 5";
        }

    }
