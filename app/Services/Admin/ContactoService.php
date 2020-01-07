<?php

namespace App\Services\Admin;

use App\Models\Contacto;

class ContactoService
{
    public function listar()
	{
        $contacto = Contacto::all();
		return $contacto;
	}

	public function registrar($request)
	{
       //
    }
    
    public function editar($id)
    {
        //
    }

	public function actualizar($request, $id)
	{
        //
	}

	public function eliminar($id)
	{
		Contacto::destroy($id);
	}
}