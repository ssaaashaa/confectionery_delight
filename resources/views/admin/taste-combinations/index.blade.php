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
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Вкусы</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <tbody>
                                @foreach ($biscuits as $biscuit)
                                    <tr>
                                        <td> {{ $biscuit['name'] }}</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.taste-combinations.edit',$biscuit['id'])}}">
                                                Изменить
                                            </a>
                                            <form action="{{ route('admin.biscuit.destroy', $biscuit['id']) }}" method="POST"
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
                    <div class="card card-primary">
                        <form action="{{route("admin.fill.store")}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="fill" class="form-control" id="date" required
                                           placeholder="Вкус" name="trip-start"/>
                                </div>
                                Сочетается с:
                            @foreach($fills as $fill)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input custom-control-input-danger"
                                               type="checkbox"
                                               name="state"
                                               id="fill-{{$fill['id']}}"
                                              >
                                        >
                                        <label for="fill-{{$fill['id']}}"
                                               class="custom-control-label">{{$fill['name']}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn-primary" style="float: right">Добавить вкус</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Начинки</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <tbody>
                                @foreach ($fills as $fill)
                                    <tr>
                                        <td> {{ $fill['name'] }}</td>
                                        <td class="project-actions text-right">
                                            <form action="{{ route('admin.fill.destroy', $fill['id']) }}" method="POST"
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
                    <div class="card card-primary">
                        <form action="{{route("admin.fill.store")}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="fill" class="form-control" id="date" required
                                           placeholder="Начинка" name="trip-start"/>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn-primary" style="float: right">Добавить начинку</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
