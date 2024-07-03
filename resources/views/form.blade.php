@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    {{-- {{ $errors }} --}}
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">
                Title
                <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                    @error('title') aria-invalid="true" @enderror>
                @error('title')
                    <small id="invalid-helper">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div>
            <label for="description">
                Description
                <textarea name="description" id="description" @error('description') aria-invalid="true" @enderror>{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <small id="invalid-helper">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div>
            <label for="long_description">
                Long Description
                <textarea name="long_description" id="long_description" @error('long_description') aria-invalid="true" @enderror>{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <small id="invalid-helper">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div>
            <button type="submit">
                @isset($task)
                Update Task
                @else
                Add Task
                @endisset
            </button>
        </div>
    </form>
@endsection
