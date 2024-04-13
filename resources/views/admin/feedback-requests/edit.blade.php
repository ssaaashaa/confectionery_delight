@extends('layouts.admin', ['title' => 'DELIGHT | Главная'])

@section('content')

    <section class="section container">
        <h2>
            Панель администратора
        </h2>
        <div class="section__body">
            <h3>
                Заявки с форм обратной связи | Редактирование записи
            </h3>
        </div>
        <br>
    <div>
        <h3>{{ "Редактировать статью ID {$feedbackRequest->id}"}}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form method="POST" action="{{ route("admin.feedback-requests.update", $feedbackRequest->id) }}">
                @csrf

                    @if(isset($feedbackRequest))
                    @method('PUT')
                @endif

                <input name="admin_comment" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('admin_comment') border-red-500 @enderror" placeholder="Название" value="{{ $feedbackRequest->admin_comment}}" />

                @error('admin_comment')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="button">Сохранить</button>
            </form>
        </div>
    </div>
    </section>
@endsection
