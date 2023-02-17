@extends('layouts.index')
@section('page_title', 'reg_page')

@section('content')
    <div class="wrapper">
        <h1>Register</h1>
        @if($errors->any())
            <div class="errors">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input value="{{old('username')}}" type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            <input type="text" name="password2" placeholder="password2">
            <input type="submit" value="sign up">
        </form>
    </div>
@endsection
