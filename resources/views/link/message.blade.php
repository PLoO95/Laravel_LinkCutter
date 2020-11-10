@extends('layouts.app')

@section('content')
    

    <div id='container' style="text-align:center;">
    @if (isset($error))
        <p class="text-danger h1">{{ $error }}</p>
    @endif
    @if (isset($success))
        <p class="text-primary h1">{{ $success }}</p>
    @endif
    </div>
@endsection