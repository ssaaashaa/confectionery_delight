@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- /.row -->
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
            <div class="card card-info">
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="card-body">
                        <div class="form-group row row-align">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Название:</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ $presentation['title']}}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row row-align">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Описание:</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ $presentation['description'] }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row row-align">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Дата:</label>
                            <div class="col-sm-10">
                                <p>
                                    {{date('d.m.Y', strtotime($presentation['date']))}}

                                </p>
                            </div>
                        </div>
                        <div class="form-group row row-align">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Время:</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ $presentation['time'] }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row row-align">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Входной билет:</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ $presentation['price'] }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row row-align">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Количество мест:</label>
                            <div class="col-sm-10">
                                <p>
                                    {{ $presentation['event_count'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary btn-sm" style="float: right"
                           href="{{route("admin.presentation.edit", $presentation['id'])}}">
                            Изменить
                        </a>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer -->
                </form>
            </div>
            <div class="row">
                <div class=" col-lg-12 card">
                    <div class="card-header">
                        <h3 class="card-title">Участники({{count($presentation_records)}})</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>
                                    Имя
                                </th>
                                <th>
                                    Телефон
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($presentation_records as $record)
                                <tr>
                                    <td>
                                        {{ $record['name'] }}
                                    </td>
                                    <td>
                                        {{ $record['telephone'] }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="{{route("admin.event-records.destroy", $record['id'])}}" method="POST"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn"
                                            >
                                                <i class="fas fa-trash">
                                                </i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
