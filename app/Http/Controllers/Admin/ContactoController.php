<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactoRequest;
use App\Http\Controllers\Controller;
use App\Services\Admin\ContactoService;

class ContactoController extends Controller
{
    private $service;

    public function __construct(ContactoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $elements = $this->service->listar();
        return view('admin.contacto-adm.index', compact('elements')); 
    }

    public function create()
    {
        //
    }

    public function store(ContactoRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(ContactoRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $this->service->eliminar($id);
        return redirect()->route('contacto-adm.index');
    }
}