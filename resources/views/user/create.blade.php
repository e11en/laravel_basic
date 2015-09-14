@extends('app')

@section('header')
    @include('partials.pageheader', array('title' => 'Add user'))
@stop

@section('content')

    {!! Form::open(array('route' => array('user.store'), 'method' => 'POST')) !!}

    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation','Password') !!}
        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role','Role') !!}
        <select id="role" name="role" class="form-control">
            @foreach($roles as $role)
                <option value="{{$role->id}}">
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