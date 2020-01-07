<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HomeRequest;
use App\Http\Controllers\Controller;
use App\Services\Admin\HomeService;

class HomeController extends Controller
{
    private $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        $element = $this->service->listar();

        if($element)
            return view('admin.home-adm.edit', compact('element')); 

        return view('admin.home-adm.edit');
    }

    public function create()
    {
        //
    }

    public function store(HomeRequest $request)
    {
        $this->service->registrar($request);
        session()->flash('success', '¡Información registrada con éxito!');
        return redirect()->route('home-adm.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(HomeRequest $request, $id)
    {
        $this->service->actualizar($request, $id);
        session()->flash('success', '¡Información actualizada con éxito!');
        return redirect()->route('home-adm.index');
    }

    public function destroy($id)
    {
        //
    }
}