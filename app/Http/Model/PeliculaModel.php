<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class PeliculaModel extends Model
{
    public function registrarActualizar($request){

        if($request->id){
            $registro = DB::table('m_pelicula')
                ->where('idPelicula','=',$request->id)
                ->update([
                    'idpelicula' => $request->id,
                    'nombrePelicula' => $request->nombre,
                    'imagenPelicula' => $request->url,
                    'duracionPelicula' => $request->duracion,
                    'clasificacionPelicula' => $request->clasificacion
                ]);

            DB::table('r_peliculahorario')
                ->where('idPelicula', '=', $request->id)
                ->delete();

            // bloque para recorrer y guardar los horarios
            $horarios = $request->horarios;

            foreach ($horarios as &$item){
                $array = DB::table('r_peliculahorario')
                    ->insert(array(
                        'idPelicula' => $request->id,
                        'idHorario' => $item
                    ));
            }
                return "Pelicula ".$request->nombre." actualizada.";
        }else{
            // guardar pelicula
            $registro = DB::table('m_pelicula')
                ->insertGetId([
                    'nombrePelicula' => $request->nombre,
                    'imagenPelicula' => $request->url,
                    'duracionPelicula' => $request->duracion,
                    'clasificacionPelicula' => $request->clasificacion
                ]);

            // bloque para recorrer y guardar los horarios
            $horarios = $request->horarios;

            foreach ($horarios as &$item){
                $array = DB::table('r_peliculahorario')
                    ->insert(array(
                        'idPelicula' => $registro,
                        'idHorario' => $item
                    ));
            }
            return "Pelicula ".$request->nombre." guardada.";
        }
    }

    public function eliminarPelicula($id){
            DB::table('m_pelicula')
                ->where('idPelicula', '=', $id)
                ->delete();

            DB::table('r_peliculahorario')
                ->where('idPelicula', '=', $id)
                ->delete();

            return "La pelicula ha sido eliminada correctamente.";
    }

    public function listarHorarios(){
        $listarTodo = DB::table('m_pelicula')
            ->join('r_peliculahorario', 'r_peliculahorario.idPelicula', '=', 'm_pelicula.idPelicula')
            ->join('c_horario', 'c_horario.idHorario','=','r_peliculahorario.idHorario')
            ->select('m_pelicula.idPelicula',
                'm_pelicula.nombrePelicula',
                'm_pelicula.imagenPelicula',
                'm_pelicula.duracionPelicula',
                'm_pelicula.clasificacionPelicula',
                'c_horario.idHorario',
                'c_horario.horarioInicio',
                'c_horario.horarioFin')
            ->get();


        $peliculas = array();
        foreach ($listarTodo as $item) {
            $pelicula = array(
                "idPelicula" => $item->idPelicula,
                "nombrePelicula" => $item->nombrePelicula,
                "imagenPelicula" => $item->imagenPelicula,
                "duracionPelicula" => $item->duracionPelicula,
                "clasificacionPelicula" => $item->clasificacionPelicula

            );
            if(!in_array($pelicula, $peliculas)) {
                array_push($peliculas, $pelicula);
            }
        }

        $respuesta = array();
        foreach ($peliculas as $item){
            $horarios = array();
            foreach ($listarTodo as $it){
                if($item["idPelicula"] == $it->idPelicula){
                    $horario = array(
                        'idHorario' => $it->idHorario,
                        'horarioInicio' => $it->horarioInicio,
                        'horarioFin' => $it->horarioFin
                    );
                    array_push($horarios, $horario);
                }
                $item["horarios"] = $horarios;
            }
            array_push($respuesta,$item);
        }
        return $respuesta;

    }

}
