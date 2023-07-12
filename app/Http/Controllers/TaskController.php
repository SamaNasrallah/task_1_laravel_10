<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.test')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.test');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        $driver=$request['driver'];
        $Quantity=$request['Quantity'];
        $amount=$request['amount'];
        $item=$request['item'];
        $stat=" تم الاستلام ";

        if ($amount == 'liter') {
            $Quantity= $Quantity.'لتر' ;
        } elseif ($amount == 'money') {
            $Quantity= $Quantity.'شيكل'  ;
        }

        $result= Task::create([
            "item"=>    $item,
            "Quantity"   =>$Quantity,
            'driver' =>  $driver,
            "stat"=>     $stat
        ]
        );

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->stat = 'تم الإيقاف';
        $task->save();
    
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
