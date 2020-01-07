<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Contacto};
use Carbon\Carbon;
use App\Mail\{FormContactoGracias, FormContacto};

class ContactoController extends Controller
{

    public function guardarContacto(Request $request){
        try {
           
            $fecha = Carbon::now()->format('Y-m-d'); //obtiene la fecha actual de la máquina
            $info = Info::first();
            $check = 1;

            //Registrar contacto
            $contacto = Contacto::create([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'correo' => $request->correo,
                'telefono' => $request->telefono,                
                'direccion' => $request->direccion,
                'mensaje' => $request->mensaje,
                'check' => $check,
                'fecha' => $fecha
            ]);            
            
            $contacto->save();
            

            $correo = array_map('trim', explode(',', $contacto->correo));
                \Mail::to($correo)->send(new FormContactoGracias($contacto)); //envía correo al contacto (agradecimiento)

            $correo2 = array_map('trim', explode(',', $info->emailForm));
                \Mail::to($correo2)->send(new FormContacto($contacto)); //envía correo a la empresa (nuevo lead)

            return response()->json([
                'status' => true,
                'message' => 'Success!',
            ]);

        } catch (\Exception $e) {
            dd($e);
        }
    }
}