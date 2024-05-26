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
                        <div class="card-body table-responsive p-0" style="height: fit-content; margin-bottom: -16px;">
                            <table class="table table-head-fixed text-nowrap">
                                <tbody>
                                @foreach ($biscuits as $biscuit)

                                    <form action="{{route('admin.taste-combinations.update', $biscuit['id'])}}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card collapsed-card">
                                            <div class="card-header">
                                                <h5 class="card-title">{{ $biscuit['name'] }}</h5>
                                                <div class="card-tools" style="">
                                                    <button class="btn btn-primary btn-sm" type="submit">
                                                        Сохранить изменения
                                                    </button>
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse"
                                                            title="Collapse">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @foreach ($fills as $fill)
                                                    <div style="margin-bottom: 10px">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="biscuit-{{$biscuit['id']}}" type="checkbox"
                                                                   name="fill-{{$biscuit['id']}}[]"
                                                                   id="fill-{{$fill['id']}}" value="{{$fill['id']}}"
                                                                   @foreach($biscuit->tastes as $taste)
                                                                       @if($fill['id'] === $taste['fill_id']) checked @endif
                                                                @endforeach>
                                                            <label for="fill-{{$fill['id']}}">{{$fill['name']}}</label>
                                                        </div>
                                                        <div>

{{--                                                            <label for="img">--}}
{{--                                                                @foreach($biscuit->tastes as $taste)--}}
{{--                                                                    @if($fill['id'] === $taste['fill_id']) {{$taste['img']}}--}}
{{--                                                                    @endif--}}
{{--                                                                @endforeach--}}
{{--                                                            <div>--}}
{{--                                                                <label style="cursor: pointer" for="load_img">Загрузить фото</label>--}}
{{--                                                                <input type="file" id="load_img" name="biscuit_img">--}}
{{--                                                                <br><br>--}}
{{--                                                            </div>--}}
{{--</label>--}}
{{--                                                            <input id="img" type="file" value="{{$taste['img']}}">--}}
                                                            <div class="example-2">
                                                                <label for="ratio" style="font-weight: 400">Весовой
                                                                    коэфф.</label>
                                                                <input type="number" style="border: 1px solid #ced4da; border-radius: .25rem; width: 50px; outline: none"
                                                                       id="tentacles" name="tentacles" min="1"
                                                                       max="1.5" step="0.1"
                                                                       @foreach($biscuit->tastes as $taste)
                                                                           @if($fill['id'] === $taste['fill_id']) value={{$taste['ratio']}}
                                                                       @endif
                                                                       @endforeach
                                                                   value="1"
                                                                       required/>
                                                                <div style="display: flex; flex-direction: row">

                                                                    <img style="margin-top: -20px; margin-right: 5px" src="
                                                                      @foreach($biscuit->tastes as $taste)
                                                                        @if($fill['id'] === $taste['fill_id'])/storage/biscuits/{{$taste['img']}}
                                                                        @endif
                                                                    @endforeach"
                                                                         alt=""
                                                                         width="auto" height="50px" loading="lazy">
                                                                    <input type="file" name="file" id="file" class="input-file">
                                                                    <label for="file" class="btn btn-tertiary js-labelFile">
                                                                        <span class="js-fileName" style="font-weight: 500">Загрузить файл</span>
                                                                    </label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                                {{--                                    </form>--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->


                    </div>
                    <div class="card card-primary">
                        <form action="{{route("admin.biscuit.store")}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="biscuit" class="form-control" id="date" required
                                           placeholder="Вкус" name="trip-start"/>
                                    <br>
                                    Сочетается с:
                                </div>
                                @foreach ($fills as $fill)
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input class="biscuit" type="checkbox"
                                                   name="biscuit"
                                                   id="fill-{{$fill['id']}}" value="{{$fill['id']}}">
                                            <label for="fill-{{$fill['id']}}">{{$fill['name']}}</label>
                                            <div>
                                                <label for="ratio" style="font-weight: 400">Весовой
                                                    коэфф.</label>
                                                <input type="number" id="tentacles" name="tentacles" min="1"
                                                       max="1.5" step="0.1"
                                                       @foreach($biscuit->tastes as $taste)
                                                           @if($fill['id'] === $taste['fill_id']) value={{$taste['ratio']}}
                                                                       @endif
                                                                       @endforeach
                                                                   value="1"
                                                       required/>
                                            </div>
                                        </div>
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
