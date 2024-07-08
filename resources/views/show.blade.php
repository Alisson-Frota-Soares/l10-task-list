@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{route('tasks.index')}}" class="font-medium text-gray-700 underline decoration-pink-500"><- Go back to the task list!</a>
    </div>

    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>Created: {{ $task->created_at->diffForHumans() }}</p>
    <p>Updated: {{ $task->updated_at->diffForHumans() }}</p>

    <p>
        @if ($task->completed)
            Completed
        @else
            Not Completed
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
    </div>

    <form action="{{ route('tasks.toggle-complete', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit"> Mark as {{ $task->completed ? 'not completed' : 'completed' }} </button>
    </form>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
