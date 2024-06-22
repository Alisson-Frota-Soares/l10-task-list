@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    {{-- {{ $errors }} --}}
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                Title
                <input type="text" name="title" id="title" value="{{$task->title}}" @error('title') aria-invalid="true" @enderror>
                @error('title')
                    <small id="invalid-helper">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div>
            <label for="description">
                Description
                <textarea name="description" id="description" @error('description') aria-invalid="true" @enderror>{{$task->description}}</textarea>
                @error('description')
                    <small id="invalid-helper">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div>
            <label for="long_description">
                Long Description
                <textarea name="long_description" id="long_description" @error('long_description') aria-invalid="true" @enderror>{{$task->long_description}}</textarea>
                @error('long_description')
                    <small id="invalid-helper">{{ $message }}</small>
                @enderror
            </label>
        </div>
        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>
@endsection
