<div>
    <ol>
        @forelse ($tasks as $item)
            <li>{{ $item->title }} <a href="{{ route('tasks.show', [ 'id' => $item->id]) }}">ver</a> </li>
        @empty
            <div>There are no tasks!</div>
        @endforelse
    </ol>
</div>


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
