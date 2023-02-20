@extends('layouts.index')
@section('page_title', 'add_page')

@section('content')
    <div class="wrapper">
        <h1>Add Book</h1>
        @if($errors->any())
            <div class="errors">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input value="{{old('name')}}" type="text" name="name" placeholder="name">
            <textarea class="textarea" placeholder="content" name="content">{{old('content')}}</textarea>
            <input type="file" name="file">
            <input type="submit" value="add">
        </form>
    </div>
@endsection
