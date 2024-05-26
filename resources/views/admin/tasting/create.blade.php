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
                @if (session('nosuccess'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h6>{{ session('nosuccess') }}</h6>
                    </div>
                @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row admin-create">
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Добавить дегустацию</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{route('admin.tasting.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="date">Дата</label>
                                    {{--                                    <input type="date"  name="date" value="{{date('d.m.Y', strtotime($event['date']))}}"  min="{{date('d.m.Y')}}" max="2024-12-31" class="form-control" id="date"  required placeholder="Дата">--}}
                                    <input type="text" name="date" class="form-control" id="date"  required placeholder="Дата" name="trip-start"/>
                                </div>
                                <div class="form-group">
                                    <label for="time">Время</label>
                                    <input type="text"  name="time" class="form-control" id="time"  required placeholder="Время">
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена, BYN</label>
                                    <input type="text"  name="price" class="form-control" id="price"  required placeholder="Цена">
                                </div>
                                <div class="form-group">
                                    <label for="count">Количество мест</label>
                                    <input type="text"  name="count" class="form-control" id="count"  required placeholder="Количество мест">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
