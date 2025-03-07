<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10) //get() returns all data
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    //New laravel you just place the Task type in the var and it identify that is a query to fetch a single element of model
    // $task = Task::findOrFail($id);

    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    //New laravel you just place the Task type in the var and it identify that is a query to fetch a single element of model
    // $task = Task::findOrFail($id);


    return view('edit', ['task' => $task]);
})->name('tasks.edit');


Route::post('/tasks', function (TaskRequest $request) {

    //New, if the same validation are bering made in other places you can create a custom request to validate it all
    //just use the make:request NameRequest to create it
    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required',
    // ]);

    //in this case you just validate like this:
    // $data = $request->validate();

    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->completed = false;
    // $task->save();
    //this can be replace also by the following below:
    $task = Task::create($request->validated());


    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created syccessfully!'); //with cria uma variavel de sessão com o nome escolhido


})->name('tasks.store');


Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {

    //New, if the same validation are bering made in other places you can create a custom request to validate it all
    //just use the make:request NameRequest to create it
    // $data = $request->validate([
    //     'title' => 'required|max:255',
    //     'description' => 'required',
    //     'long_description' => 'required',
    // ]);

    //in this case you just validate like this:
    // $data = $request->validate();

    //New laravel you just place the Task type in the var and it identify that is a query to fetch a single element of model
    // $task = Task::findOrFail($id);

    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->completed = false;
    // $task->save();
    //this can be replace also by the following below:

    $task->update($request->validated());
    

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated syccessfully!'); //with cria uma variavel de sessão com o nome escolhido


})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!'); 
})->name('tasks.destroy');



Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated succesfully');
})->name('tasks.toggle-complete');


// Route::get('/taks/{id}', function ($id) use($tasks) {
//     $task = collect($tasks)->firstWhere('id', $id);
    

//     if (!$task) {
//         abort(Response::HTTP_NOT_FOUND);
//     }

//     return view('show', [ 'task' => $task]);
// })->name('tasks.show');


// Route::get('/greet/{name}', function ($name){
//     return 'Hello '.$name;
// })->name('greets');
