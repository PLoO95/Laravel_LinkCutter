@extends('layouts.app')

@section('content')
    

    <div id='container' style="text-align:center;">
    @if (isset($links))
        @foreach ($links as $link)

        <form method='POST' action="/link/{{ $link->smallUrl }}">
            <input type="hidden" name="_method" value="DELETE" />
            @csrf   
            Name: <b>{{ $link->smallUrl }}</b>
            <a class="btn btn-primary" href="/link/{{ $link->smallUrl }}">Open</a>
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
        </br>
        @endforeach
    @else
        <p>No link in databese</p>
    @endif
    </div>
@endsection