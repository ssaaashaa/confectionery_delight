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
            @foreach($tasting_events as $tasting_event)
                <div class="row">
                    <div class=" col-lg-12 card collapsed-card align-card">
                        <div class="card-header no-after">
                            <div>
                                <h3 class="card-title"><b>{{date('d.m.Y', strtotime($tasting_event["date"]))}} в {{$tasting_event["time"]}}</b></h3>
                                <br>
                                Цена: {{$tasting_event["price"]}}
                                <br>Осталось мест: {{$tasting_event["event_count"]-count($tasting_event["records"])}}
                            </div>
                            <div class="card-tools flex-card">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
<div>
    <a class="btn btn-primary btn-sm" href="{{route("admin.tasting.edit", $tasting_event['id'])}}">
        Изменить
    </a>
    <form action="{{route("admin.tasting.destroy", $tasting_event['id'])}}" method="POST"
          style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm delete-btn"
        >
            <i class="fas fa-trash">
            </i>
        </button>
    </form>
</div>


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
                                @foreach ($tasting_event["records"] as $record)
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
            @endforeach


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
