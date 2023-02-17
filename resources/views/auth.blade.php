@extends('layouts.index')
@section('page_title', 'auth_page')

@section('content')
    <div class="wrapper">
        <h1>Auth</h1>
        @if($errors->any())
            <div class="errors">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('signin') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input value="{{old('username')}}" type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            <input type="submit" value="sign in">
        </form>
    </div>
@endsection
