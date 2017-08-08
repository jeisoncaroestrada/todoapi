<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateTaskForm;
use Lang;
use App\Task;
use JWTAuth;
use App\User;
use JWTAuthException;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //se obtiene el usuario logueado
        $user = JWTAuth::toUser($request->token);
        $tasks = User::find($user['id'])->tasks()->get();

        //Retorna las tareas creadas por el usuario logueado
        return response()->json($tasks, 200);

    }

    /**
     * Crear una nueva tarea
     *
     */
    public function create(CreateTaskForm $request)
    {
        //se obtiene el usuario logueado
        $user = JWTAuth::toUser($request->token);

        //Guarda el registro en la base de datos
        Task::create([
          'name' => $request->get('name'),
          'priority' => $request->get('priority'),
          'due_date' => $request->get('due_date'),
          'user_id' => $user['id']
        ]);

        //Retorna mensaje de éxito según el idioma seleccionado
        return response()->json(['success'=>Lang::get('tasks.create_success', ['name' => $request->get('name')])], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTaskForm $request, $id)
    {
        //se obtiene el usuario logueado
        $user = JWTAuth::toUser($request->token);
        $task = Task::find($id);

        //se valida que solo el usuario que creo la tarea pueda actualizarla
        if ($user['id'] == $task['user_id']) {
            $task->name = $request->get('name');
            $task->priority = $request->get('priority');
            $task->due_date = $request->get('due_date');

            $task->save();
            return response()->json(['success'=>Lang::get('tasks.update_success', ['name' => $task['name']])], 200);
            
        }else{

            return response()->json(['unauthorized'=>Lang::get('tasks.unauthorized')], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //se obtiene el usuario logueado
        $user = JWTAuth::toUser($request->token);
        $task = Task::find($id);

        //se valida que solo el usuario que creo la tarea pueda eliminarla
        if ($user['id'] == $task['user_id']) {
            
            $task->delete();
            return response()->json(['success'=>Lang::get('tasks.delete_success', ['name' => $task['name']])], 200);
        }else{

            return response()->json(['unauthorized'=>Lang::get('tasks.unauthorized')], 401);
        }

    }
}
