@extends('layouts.app')

@section('title', 'The list of Tasks')

@section('content')

    <div>
        <a href="{{ route('tasks.create') }}">Add task</a>
    </div>

    <div>
        <ol>
            @forelse ($tasks as $item)
                <li @class(['line-through' => $item->completed]) >{{ $item->title }} <a href="{{ route('tasks.show', ['task' => $item->id]) }}">ver</a> </li>
            @empty
                <div>There are no tasks!</div>
            @endforelse
        </ol>
    </div>

    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif


    {{-- <div>
    @if (count($tasks))
        <ol>
            @foreach ($tasks as $item)
                <li>{{ $item->title }} <a href="{{route('tasks.show', [$item->id])}}">ver</a> </li>
            @endforeach
        </ol>
    @else
        <div>There are no tasks!</div>
    @endif
</div> --}}

@endsection
