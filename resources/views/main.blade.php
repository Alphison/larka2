@extends('layouts.index')

@section('page_title', 'home page')

@section('content')
    <div class="main">
        <div class="books">
            @foreach($books as $book)
                <div class="book">
                    <a href="/book/{{ $book['id'] }}" class="img_block">
                        <img src="{{ 'public' . Storage::url($book['img']) }}" />
                    </a>
                    <h3>{{ $book['name'] }}</h3>
                    <p>Автор: {{ $book->author()->username }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
