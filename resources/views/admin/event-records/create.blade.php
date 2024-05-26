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
                @if(request("event_type")==="1")
                    <div class="col-lg-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Запись на презентацию</h3>
                            </div>
                            <!-- form start -->
                            <form action="{{route('admin.event-records.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Имя</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                               {{--                                           @isset(request()->route('name'))--}}

                                               value="{{request('name')}}"
                                               {{--                                           @endisset--}}
                                               placeholder="Имя" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Телефон</label>
                                        <input type="text" name="telephone" class="form-control phone-mask"
                                               value="{{request('telephone')}}"
                                               id="exampleInputPassword1" required placeholder="Телефон">
                                    </div>
                                    <input name="id" value="{{request('id')}}" style="display: none">
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn-primary">Записать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(request("event_type")==="2")
                    <div class="col-lg-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Запись на дегустацию</h3>
                            </div>
                            <!-- form start -->
                            <form action="{{route('admin.event-records.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Имя</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                               {{--                                           @isset(request()->route('name'))--}}

                                               value="{{request('name')}}"
                                               {{--                                           @endisset--}}
                                               placeholder="Имя" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Телефон</label>
                                        <input type="text" name="telephone" class="form-control phone-mask"
                                               value="{{request('telephone')}}"
                                               id="exampleInputPassword1" required placeholder="Телефон">
                                    </div>
                                    <div class="form-group" data-select2-id="40">
                                        <label>Время</label>
                                        <select class="form-control select2 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="9" tabindex="-1"
                                                aria-hidden="true">
                                            @foreach($tasting_dates as $tasting_date)
                                                @if(($tasting_date["event_count"]-$tasting_date["records"])!=0)
                                                    <option value="{{$tasting_date["id"]}}">{{date('d.m.Y', strtotime($tasting_date["date"]))}} в {{$tasting_date["time"]}}
                                                        Осталось мест : {{$tasting_date["event_count"]-$tasting_date["records"]}} </option>
                                                @endif
                                            @endforeach
                                        </select><span
                                            class="select2 select2-container select2-container--default select2-container--below"
                                            dir="ltr" data-select2-id="10" style="width: 100%;">
                                            <span
                                                class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>
                                    </div>
                                    <input name="id" value="{{request('id')}}" style="display: none">
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn-primary">Записать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
