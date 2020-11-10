@extends('layouts.app')

@section('content')
<div class="container" style="text-align:center;">
    <form class="form-group" method="POST" action="/link">
        @csrf
        <label for="Link">Link to cut</label>
        <input type="url" class="form-control" id="bigUrl" name="bigUrl">
        </br>
        <button type="submit" class="btn btn-primary">Cut</button>
    </form>
</div>
@endsection