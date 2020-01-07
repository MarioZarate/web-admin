<?php

namespace App\Services\Admin;

use App\Models\Banner;

class BannerService
{
    public function listar()
	{
		$banner = Banner::orderBy('orden', 'ASC')->get();
        return $banner;
	}

	public function registrar($request)
	{
        $banner = Banner::create($request->only(
			'titulo',
            'descripcion',
            'fondoDesktop',
            'fondoMobile',
            'textoBtn',
			'enlaceBtn',
			'orden',
			'visible'
        )); 
        
		$banner->save();
	}

	public function editar($id)
	{
		$banner = Banner::find($id);
		return $banner;
	}

	public function actualizar($request, $id)
	{
        $banner = Banner::find($id);

        $banner->fill($request->only(
			'titulo',
            'descripcion',
            'fondoDesktop',
            'fondoMobile',
            'textoBtn',
			'enlaceBtn',
			'orden',
			'visible'
		), $id);		

		$banner->save();
	}

	public function eliminar($id)
	{
		Banner::destroy($id);
	}

	public function ddlVisible()
	{
		$array = array();
		$array[1] = 'Sí';
        $array[0] = 'No';
        

        return $array;
	}
	
	public function activarBanner($request)
	{
		$element = Banner::find($request->id);
        
        if($request->checked == 'true') {
            $element->visible = 1;
        } else if($request->checked == 'false') {
            $element->visible = 0;
        }
        $element->save();
        return response()->json($element);
	}
}