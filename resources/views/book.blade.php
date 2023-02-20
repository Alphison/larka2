@extends('layouts.index')
@section('page_title', 'book_page')

@section('content')
    <div class="book_main">
        <div class="img_book">
            <img src="{{ '../public' . Storage::url($book['img']) }}" alt="">
        </div>
        <div class="text_block">
            <p class="text_book">Название: {{ $book['name'] }}</p>
            <p class="text_book">Описание: {{ $book['content'] }}</p>
            <p class="text_book">Автор: {{ $book->author()->username}}</p>
        </div>
        <div class="block_btns">
            @if($book->user_has_actions)
                <a href="/delete/{{ $book['id'] }}" class="btn">Удалить</a>
                <a href="{{ route('update', $book )}}" class="btn">Изменить</a>
            @endif
        </div>
    </div>
@endsection
