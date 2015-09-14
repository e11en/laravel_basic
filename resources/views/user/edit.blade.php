@extends('app')

@section('header')
    @include('partials.pageheader', array('title' => 'Edit user'))
@stop

@section('content')

    {!! Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('pass_new','Password') !!}
        {!! Form::password('pass_new', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role','Role') !!}
        <select id="role" name="role" class="form-control">
            @foreach($roles as $role)
                <option @if($user->hasRole($role->name)) selected @endif value="{{$role->id}}">
                    {{$role->display_name}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>

    {!! Form::close() !!}

@endsection