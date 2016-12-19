@extends('layouts.master')

@section('content')
    <form action="{{url('login')}}" method="post">
        {{csrf_field()}}
        @include('partials.flash')
        <p><label for="email">Email</label>
            <input type="text" name="email" value="{{old('email')}}">
            @if($errors->has('email')) <span>{{$errors->first('email')}}</span>@endif
        </p>
        <p><label for="password">Password</label>
            <input type="password" name="password">
            @if($errors->has('password')) <span>{{$errors->first('password')}}</span>@endif
        <p>
            <input type="checkbox" class="filled-in" id="filled-in-box" value="remember" />
            <label for="filled-in-box">Se souvenir de moi ?</label>
        </p>
        </p>
        <p><input class="waves-effect waves-light btn" type="submit"></p>
    </form>

@endsection