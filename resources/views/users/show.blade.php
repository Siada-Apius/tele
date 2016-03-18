@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="container">
            {{ $user->alias }}
        </div> <!-- /.container -->
    </div> <!-- .content -->
@endsection