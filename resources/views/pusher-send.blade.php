@extends('layouts.app')
@section('content')
<form action="{{route('send_details')}}" method="POST">
    @csrf
    <input type="text" name="text">
    <button type="submit">Save</button>
</form>
@endsection