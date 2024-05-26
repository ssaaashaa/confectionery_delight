@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-check"></i>{{ session('success') }}</h6>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Изменение информации о презентации</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{route('admin.presentation.update', $event['id'])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text"  name="title" value="{{$event['title']}}" class="form-control" id="title"  required placeholder="Название">
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea type="text" style="height: 200px; resize: none" name="description"  class="form-control" id="description"  required placeholder="Описание">{{$event['description']}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date">Дата</label>
{{--                                    <input type="date"  name="date" value="{{date('d.m.Y', strtotime($event['date']))}}"  min="{{date('d.m.Y')}}" max="2024-12-31" class="form-control" id="date"  required placeholder="Дата">--}}
                                    <input type="text" name="date" class="form-control" id="date"  required placeholder="Дата" name="trip-start" value="{{$event['date']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="time">Время</label>
                                    <input type="text"  name="time" value="{{$event['time']}}" class="form-control" id="time"  required placeholder="Время">
                                </div>
                                <div class="form-group">
                                    <label for="price">Входной билет</label>
                                    <input type="text"  name="price" value="{{$event['price']}}" class="form-control" id="price"  required placeholder="Входной билет">
                                </div>
                                <div class="form-group">
                                    <label for="count">Количество мест</label>
                                    <input type="text"  name="count" value="{{$event['event_count']}}" class="form-control" id="count"  required placeholder="Количество мест">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn-primary">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
