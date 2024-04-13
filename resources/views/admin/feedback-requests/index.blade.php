@extends('layouts.admin', ['title' => 'DELIGHT | Главная'])

@section('content')
    <section class="section container">
        <h2>
            Панель администратора
        </h2>
        <div class="section__body">
            <h3>
                Заявки с форм обратной связи
            </h3>
        </div>
        <br>


        @foreach($requests as $request)
            <tr>
                <td>{{$request->request_type}}</td>
                <td>{{$request->name}}</td>
                <td>{{$request->telephone}}</td>
                <td>{{$request->telephone}}</td>
                <td>{{$request->admin_comment}}</td>
                <td>
                    <a href="{{ route('admin.feedback-requests.edit',$request->id)}}">
                        <button class="button">
                            Редактировать
                        </button>
                    </a>
                    <form method="POST" action="{{ route('admin.feedback-requests.destroy',$request->id)}}">
                        @csrf

                        @method('DELETE')
                        <button type="submit" class="button">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
            <BR>
        @endforeach
    </section>
@endsection
