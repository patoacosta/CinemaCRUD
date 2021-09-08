<?php

namespace App\Http\Controllers;

use App\Http\Model\PeliculaModel;
use Illuminate\Http\Request;


class PeliculaController extends Controller
{
    public function mostrar(){

    }

    public function registrar(Request $request){
        try {
            $model = new PeliculaModel();
            $datos = $model->registrarActualizar($request);

            return array(
                "Codigo: " => 201,
                "Datos: " => $datos,
                "Mensaje: " => "Registrado/Actualizado correctamente."
            );
        }catch(\Exception $exception){
            return array(
              "Codigo: " => 501,
              "Datos: " => $exception->getMessage(),
              "Mensaje: " => "Error al registrar/actualizar."
            );
        }
    }

    public function eliminar($id){
        try {
            $model = new PeliculaModel();
            $datos = $model->eliminarPelicula($id);

            return array(
                "Codigo: " => 201,
                "Datos: " => $datos,
                "Mensaje: " => "Eliminado correctamente."
            );
        }catch(\Exception $exception){
            return array(
                "Codigo: " => 501,
                "Datos: " => $exception->getMessage(),
                "Mensaje: " => "Error al eliminar."
            );
        }
    }

    public function listar(){
        try {
            $model = new PeliculaModel();
            $datos = $model->listarHorarios();
//            dd($datos);
            return json_encode(array(
                "codigo" => 201,
                "datos" => $datos,
                "mensaje" => "test."
            ));
        }catch(\Exception $exception){
            return array(
                "codigo: " => 501,
                "datos: " => $exception->getMessage(),
                "mensaje: " => "test."
            );
        }
    }

}
