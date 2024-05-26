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
            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Заявки на дегустацию </h3>

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
                            <th style="width: 15%">
                                Имя
                            </th>
                            <th style="width: 15%">
                                Телефон
                            </th>
                            <th style="width: 25%">
                                Комментарий
                            </th>
                            <th style="width: 45%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($taste_requests as $request)
                            <tr>
                                <td>
                                    {{ $request['name'] }}
                                </td>
                                <td>
                                    {{ $request['telephone'] }}
                                </td>
                                <td>
                                    {{ $request['admin_comment'] }}
                                </td>
                                <td class="project-actions text-right">

                                    <a class="btn btn-info btn-sm" href="{{route('admin.event-records.create', ["id"=>$request['id'], "event_type"=>"2", "name"=>$request['name'], "telephone"=>$request['telephone']])}}">
                                        Записать на дегустацию
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.feedback-requests.edit',$request['id'])}}">
                                        Изменить
                                    </a>
                                    <form action="{{route('admin.feedback-requests.destroy',$request['id'])}}" method="POST"
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Заявки на презентацию. Осталось мест: {{$count}}</h3>

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
                            <th style="width: 10%">
                                Имя
                            </th>
                            <th style="width: 20%">
                                Телефон
                            </th>
                            <th style="width: 25%">
                                Комментарий
                            </th>
                            <th style="width: 45%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($presentation_requests as $request)
                            <tr>
                                <td>
                                    {{ $request['name'] }}
                                </td>
                                <td>
                                    {{ $request['telephone'] }}
                                </td>
                                <td>
                                    {{ $request['admin_comment'] }}
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('admin.event-records.create', ["id"=>$request['id'],"event_type"=>"1", "name"=>$request['name'], "telephone"=>$request['telephone']])}}">
                                        Записать на презентацию
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.feedback-requests.edit',$request['id'])}}">
                                        Изменить
                                    </a>
                                    <form action="{{route('admin.feedback-requests.destroy',$request['id'])}}" method="POST"
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

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
