<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //almaceno todas las tareas en $tasks y las traigo en orden con el latest
        //con el paginate declaro la cantidad de datos que quiero paginar
        //$tasks = Task::latest()->get();
        $tasks = Task::latest()->paginate(5);
        //las paso a la vista index
        return view('index', ['tasks' => $tasks]);
    }
    /**
     * Va a mostrame la vista create
     * el metodo store para ejecutar la logica para almacenar el nuevo registro
     * con los datos provenientes del formulario
     */
    public function create(): View
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description'=> 'required'
        ]);
        Task::create($request->all());
        //redirigime a index
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea creada Exitonsamente!!');
    }

    public function show(Task $task)
    {
    }

    // mostramos el formulario y en el update tenemos la logica
    public function edit(Task $task): View
    {
        //le paso task a la vista
                             //mando la tarea a la vista, asi la puedo usar
                   // tasks/1/edit es la url a usar              
        return view('edit', ['task' => $task]);
        //dd($task);
        }

        // Aca tenemos la logica para modificar y con edit lo mostramos
    public function update(Request $request, Task $task): RedirectResponse
    {
        //validar datos
        $request->validate([
            'title' => 'required',
            'description'=> 'required'
        ]);
        //a $task lo quiero actualizar con los datos que vienen en la query ($request)
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea Actualizada Exitonsamente!!');
    }
    //remover la task
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Nueva tarea ELIMINADA Exitonsamente!!');
    }
}
