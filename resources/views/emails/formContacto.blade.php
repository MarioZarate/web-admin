@component('emails.templateContacto')
    @slot('title')
        Información de Contacto
    @endslot

	@slot('body', [
        'Nombres' => $contacto->nombres,
        'Apellidos' => $contacto->apellidos,
        'Teléfono' => $contacto->telefono,
        'Correo' => $contacto->correo,
        'Dirección' => $contacto->direccion,        
        'Mensaje' => $contacto->mensaje,
        'Fecha' => $contacto->fecha
	])
@endcomponent