@extends('layouts.app', ['title' => 'DELIGHT |  Страница не найдена'])

@section('content')
    <div class="section container">
        <div class="section__body">
            <div class="not_found">
                <h1>
                    404
                </h1>
                <h3>
                    Упс...Страница не найдена!
                </h3>
                <a href="{{route('home')}}">
                    <button class="category-card__button button">
                        На главную
                    </button>
                </a>
            </div>
        </div>
    </div>
    <script src="/js/field_name.js"></script>
@endsection





