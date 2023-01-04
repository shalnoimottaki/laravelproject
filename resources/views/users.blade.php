<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        // php code..
    @endphp

    {{__('Hello World')}}

    {{-- <h1>Hello {!!$name!!}</h1> --}}
    {{-- <h1>Hello {{$name}}</h1> --}}
    <h1>Hello @{{$name}}</h1>

    <script>
        // var app = @json($json);
        // console.log(app);
    </script>

    {{-- @if ()

    @else

    @endif

    @switch($type)
        @case(1)
            first case ..
            @break
        @case(2)
            second case ..
            @break
        @default
            default case ..
    @endswitch

    @isset($record)

    @endisset

    @empty($record)

    @endempty

    @for ($i = 0; $i < $count; $i++)
        $loop->index
        $loop->iteration
        $loop->remaining
        $loop->count
        $loop->first, last
        $loop->even, odd
        $loop->depth
        $loop->parent
    @endfor

    @foreach ($collection as $item)
        @continue($user->id >1)
        @break($user->id >10)
    @endforeach

    @while ()

    @endwhile --}}
</body>
</html>
