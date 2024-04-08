<?php

namespace App\Http\Controllers;

use App\Models\Puerta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PuertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View /* Oleg - Retorno Ruta de la Vista */
    {
        // Oleg - Primera vista inicial
        // return view('puertas/index');
        
        // // Oleg - Todos los datos de la tabla - Descendentemente (del último al primero)
        // $puertas = Puerta::latest()->get();
        $puertas = Puerta::get();

        // Oleg - Datos con Paginador - con 3 elementos - Descendente
        // $puertas = Puerta::latest()->paginate(3);
        $puertas = Puerta::paginate(3);

        // Oleg- Carga vista Inicial + Pasar las Tareas a la vista Index
        return view('puertas/index', ['puertas' => $puertas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('puertas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse  /* Oleg - Retorno de Respuesta con Validación */
    {
        
        // Mostrar datos: dump+die
        //dd($request->all());

        // Validación de lo que venga del $request del formulario
        $request->validate([
            'nombre' => 'required'
        ]);

        // Create
        Puerta::create($request->all());
        // Redirección
        return redirect()->route('puertas.index')->with('success', 'Creada nueva puerta');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puerta $puerta): View
    {
        // return redirect()->route('puertas.show');

        return view('puertas/show', ['puerta' => $puerta]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Puerta $puerta): View
    public function edit($id): View
    {
        // Mostrar la tarea completa - URL: localhost:80000/puertas/1/edit
        // dd(Puerta::find($id));

        $puerta = Puerta::find($id);
        return view("puertas/edit", ["puerta" => $puerta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puerta $puerta): RedirectResponse
    {
        // Mostrar la tarea completa - URL: localhost:80000/puertas/1/edit
        // dd($request->all());

        // Validación de lo que venga del $request del formulario
        $request->validate([
            'nombre' => 'required'
        ]);

        // Update
        $puerta->update($request->all());
        // Redirect
        return redirect()->route('puertas.index')->with('success', 'Actualizada tarea');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puerta $puerta): RedirectResponse
    {
        //dd($puerta);
        $puerta->delete();
        return redirect()->route('puertas.index')->with('success', 'Eliminada tarea');
    }
}
