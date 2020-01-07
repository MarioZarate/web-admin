<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Negocio};
use Carbon\Carbon;

class UtilController extends Controller
{
   	public function selectores(Request $request)
    {
        try {

           //code

        return response()->json([
            'status' => true,
            'message' => 'Success!',
            'resultado' => $resultado
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error!'
            ]);
        }
       
    }

}