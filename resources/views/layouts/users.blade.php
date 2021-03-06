@extends('layouts.app')

@section('content')
<div style="display: flex; flex-direction:column; margin-top:100px; " class="container">
@foreach($users as $user)
<div style="display: flex;margin-top:20px; background-color: slategray; padding:10px; border-radius:10px; color:whitesmoke">
<h4 style="margin: auto"> {{$user->name}} </h4>
<form action="" method="post">
    {!! csrf_field() !!}
    <button style="margin: auto"  type="submit" class="btn btn-success"> تعيين كمدير </button>
</form>
</div>
@endforeach
</div>
@endsection
