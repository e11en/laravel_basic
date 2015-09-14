@extends('app')

@section('header')
    @include('partials.pageheader', array('title' => 'Users'))
@stop

@section('content')

    <a class="btn btn-success pull-right" href="{{ action('UserController@create') }}">Add</a>

    <table class="table table-bordered">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{ action('UserController@edit', [$user->id]) }}">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection