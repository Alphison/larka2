@extends('layouts.index')

@section('page_title', 'home page')

@section('content')
    <div class="main">
        <div class="books">
            @foreach($books as $book)
                <div class="book">
                    <div class="img_block">
                        <img src="{{ $book['img'] }}" />
                    </div>
                    <h3>{{ $book['name'] }}</h3>
                    <p>Автор: {{ $book->author()->username }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
