@if ($errors->any())
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
@endif

@if (session('success'))
{{session('success')}}
@endif
<form action="{{ route('create') }}" method="post">
    @csrf
    <input type="text" name="title" />
    <button>New</button>
</form>


@foreach ($todos as $todo)
<li>
    {{ $todo->title }} | {{$todo->status}} |
    <form action="{{route('delete', $todo->id)}}" method="post" style="display: inline;">
        @csrf
        <button>X</button>
    </form>
    |
    <form action="{{route('toggle', $todo->id)}}" method="post" style="display: inline;">
        @csrf
        <button>{{$todo->status === 'Done' ? 'Mark not done' : 'Mark done'}}</button>
    </form>
</li>
@endforeach