<?php

namespace App\Services\Admin;

use App\Models\Home;

class HomeService
{
    public function listar()
	{
        $home = Home::first();
		return $home;
	}

	public function registrar($request)
	{
        //arrayB2
		$columnas_item1 = array(0 => 'archA', 1 => 'nomA', 2 => 'desA');
		$a_item1 = array();
		array_push($a_item1, $request->archA ) ;
		array_push($a_item1, $request->nomA ) ;
		array_push($a_item1, $request->desA ) ;
        if($a_item1[0] != null)
            $arrayB2 = \Helper::parseArray($a_item1, $columnas_item1);
		else
            $arrayB2 = null;

        $home = Home::create([
            'imagenB2' => $request->imagenB2,
            'tituloB2' => $request->tituloB2,
            'descripcionB2' => $request->descripcionB2,
            'arrayB2' => $arrayB2
		]);

		$home->save();
    }
    
    public function editar($id)
    {
        //
    }

	public function actualizar($request, $id)
	{        
        $home = Home::find($id);

        //arrayB2
		$columnas_item1 = array(0 => 'archA', 1 => 'nomA', 2 => 'desA');
		$a_item1 = array();
		array_push($a_item1, $request->archA ) ;
		array_push($a_item1, $request->nomA ) ;
		array_push($a_item1, $request->desA ) ;
        if($a_item1[0] != null)
            $arrayB2 = \Helper::parseArray($a_item1, $columnas_item1);
		else
            $arrayB2 = null;

		$home->fill([
            'imagenB2' => $request->imagenB2,
            'tituloB2' => $request->tituloB2,
            'descripcionB2' => $request->descripcionB2,
            'arrayB2' => $arrayB2
		], $id);
        
       $home->save();
	}

	public function eliminar($id)
	{
		//
	}
}