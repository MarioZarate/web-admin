@component('emails.templateContactoGracias')
    @slot('title')
        ¡Gracias por contactarnos!
    @endslot

	@slot('body', [
        'Nombres' => $contacto->nombres,
        'Apellidos' => $contacto->apellidos,
        'Teléfono' => $contacto->telefono,
        'Dirección' => $contacto->direccion,
        'Mensaje' => $contacto->mensaje,
        'Fecha' => $contacto->fecha
        
        
	])
@endcomponent