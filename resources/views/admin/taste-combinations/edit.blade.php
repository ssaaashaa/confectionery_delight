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
            <div class="row admin-create">
                <div class="col-lg-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$biscuit['name']}} вкус и его сочетание с начинками</h3>
                            <br>
                            <br>
                            *фото подгружается автоматически при создании сочетания
                        </div>
                        <!-- form start -->
                        <div class="form-group">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 20%">
                                        Начинка
                                    </th>
                                    <th style="width: 20%">
                                        Фото
                                    </th>
                                    <th style="width: 15%">
                                        Весовой коэф.
                                    </th>
                                    <th style="width: 20%">
                                        Изменить
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($fills as $fill)
                                    <tr>
                                        <form action="{{route("admin.taste-combinations.update", $biscuit['id'])}}"
                                              method="POST">
                                            @csrf
                                            @method('PUT')
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input custom-control-input-danger"
                                                           type="checkbox"
                                                           name="state"
                                                           id="fill-{{$fill['id']}}"
                                                           @foreach($biscuit->tastes as $taste)
                                                               @if($fill['id'] === $taste['fill_id']) checked
                                                           value="1" @endif
                                                        @endforeach>
                                                    >
                                                    <label for="fill-{{$fill['id']}}"
                                                           class="custom-control-label">{{$fill['name']}}</label>
                                                </div>
                                                <input type="hidden" name="fill" value="{{$fill['id']}}">
                                            </td>
                                            <td>
                                                @foreach($biscuit->tastes as $taste)
                                                    @if($fill['id'] === $taste['fill_id'])
                                                <div
                                                    style="display: flex; flex-direction: column; align-items: center; width: fit-content">

                                                    <img src="
                                                                                       /storage/biscuits/{{$taste['img']}}

                                                                                        "
                                                         alt="" id="taste-{{$taste['id']}}_img"
                                                         width="200px" height="auto" loading="lazy">
                                                    <input type="file" name="file" class="input-file load_taste_img"
                                                           style="display: none" id="{{$taste['id']}}" >
                                                    <label style="margin-bottom: 0; padding-bottom: 0" for="{{$taste['id']}}"
                                                           class="btn btn-tertiary js-labelFile">
                                                    <span class="js-fileName"
                                                          style="font-weight: 500">Изменить фото</span>
                                                    </label>
                                                </div>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <input type="number"
                                                       id="tentacles" name="ratio" min="1"
                                                       max="1.5" step="0.05"
                                                       @foreach($biscuit->tastes as $taste)
                                                           @if($fill['id'] === $taste['fill_id']) value={{$taste['ratio']}}
                                                                                       @endif
                                                                                       @endforeach
                                                                                   value="1.00"
                                                       required/>
                                            </td>
                                            <td class="project-actions">
                                                <button type="submit" class="btn-primary">Сохранить</button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                            {{--                                                                        @foreach ($fills as $fill)--}}
                            {{--                                        <div class="custom-control custom-checkbox" style="margin-left: 25px">--}}
                            {{--                                            <input--}}
                            {{--                                                class="biscuit-{{$biscuit['id']}} custom-control-input custom-control-input-danger"--}}
                            {{--                                                type="checkbox"--}}
                            {{--                                                name="fill-{{$biscuit['id']}}[]"--}}
                            {{--                                                id="fill-{{$fill['id']}}" value="{{$fill['id']}}"--}}
                            {{--                                                @foreach($biscuit->tastes as $taste)--}}
                            {{--                                                    @if($fill['id'] === $taste['fill_id']) checked @endif--}}
                            {{--                                                @endforeach>--}}
                            {{--                                            <label for="fill-{{$fill['id']}}"--}}
                            {{--                                                   class="custom-control-label">{{$fill['name']}}</label>--}}
                            {{--                                        </div>--}}

                            {{--                                        <div class="form-group row ">--}}
                            {{--                                            <label for="ratio">Весовой--}}
                            {{--                                                коэфф.</label>--}}
                            {{--                                           --}}
                            {{--                                        </div>--}}
                            {{--                                    @endforeach--}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            {{--                <div class="col-lg-8">--}}
            {{--                    <div class="card card-primary">--}}
            {{--                        <div class="card-header">--}}
            {{--                            <h3 class="card-title">Вкус и его сочетание с начинками</h3>--}}
            {{--                        </div>--}}
            {{--                        <!-- form start -->--}}
            {{--                        <form action="{{route('admin.taste-combinations.update', $biscuit['id'])}}" method="POST">--}}
            {{--                            @csrf--}}
            {{--                            @method('PUT')--}}
            {{--                            <div class="card collapsed-card">--}}
            {{--                                <div class="card-header">--}}
            {{--                                    <h5 class="card-title">{{ $biscuit['name'] }}</h5>--}}
            {{--                                </div>--}}
            {{--                                <div class="card-body">--}}
            {{--                                    @foreach ($fills as $fill)--}}
            {{--                                        <div style="margin-bottom: 10px">--}}
            {{--                                            <div class="custom-control custom-checkbox">--}}
            {{--                                                                <input class="biscuit-{{$biscuit['id']}}" type="checkbox"--}}
            {{--                                                                       name="fill-{{$biscuit['id']}}[]"--}}
            {{--                                                                       id="fill-{{$fill['id']}}" value="{{$fill['id']}}"--}}
            {{--                                                                       @foreach($biscuit->tastes as $taste)--}}
            {{--                                                                           @if($fill['id'] === $taste['fill_id']) checked @endif--}}
            {{--                                                                    @endforeach>--}}
            {{--                                                                <label for="fill-{{$fill['id']}}">{{$fill['name']}}</label>--}}
            {{--                                                            </div>--}}
            {{--                                            <div>--}}

            {{--                                                                <label for="img">--}}
            {{--                                                                    @foreach($biscuit->tastes as $taste)--}}
            {{--                                                                        @if($fill['id'] === $taste['fill_id'])--}}
            {{--                                                                            {{$taste['img']}}--}}
            {{--                                                                        @endif--}}
            {{--                                                                    @endforeach--}}
            {{--                                                                    <div>--}}
            {{--                                                                        <label style="cursor: pointer" for="load_img">Загрузить--}}
            {{--                                                                            фото</label>--}}
            {{--                                                                        <input type="file" id="load_img" name="biscuit_img">--}}
            {{--                                                                        <br><br>--}}
            {{--                                                                    </div>--}}
            {{--                                                                </label>--}}
            {{--                                                                <input id="img" type="file" value="{{$taste['img']}}">--}}
            {{--                                                <div class="example-2">--}}
            {{--                                                                    <label for="ratio" style="font-weight: 400">Весовой--}}
            {{--                                                                        коэфф.</label>--}}
            {{--                                                                    <input type="number"--}}
            {{--                                                                           style="border: 1px solid #ced4da; border-radius: .25rem; width: 50px; outline: none"--}}
            {{--                                                                           id="tentacles" name="tentacles" min="1"--}}
            {{--                                                                           max="1.5" step="0.1"--}}
            {{--                                                                           @foreach($biscuit->tastes as $taste)--}}
            {{--                                                                               @if($fill['id'] === $taste['fill_id']) value={{$taste['ratio']}}--}}
            {{--                                                                                       @endif--}}
            {{--                                                                                       @endforeach--}}
            {{--                                                                                   value="1"--}}
            {{--                                                                           required/>--}}
            {{--                                                                    <div style="display: flex; flex-direction: row">--}}

            {{--                                                                        <img style="margin-top: -20px; margin-right: 5px" src="--}}
            {{--                                                                                      @foreach($biscuit->tastes as $taste)--}}
            {{--                                                                                        @if($fill['id'] === $taste['fill_id'])/storage/biscuits/{{$taste['img']}}--}}
            {{--                                                                                        @endif--}}
            {{--                                                                                    @endforeach"--}}
            {{--                                                                             alt=""--}}
            {{--                                                                             width="auto" height="50px" loading="lazy">--}}
            {{--                                                                        <input type="file" name="file" id="file" class="input-file">--}}
            {{--                                                                        <label for="file" class="btn btn-tertiary js-labelFile">--}}
            {{--                                                                            <span class="js-fileName" style="font-weight: 500">Загрузить файл</span>--}}
            {{--                                                                        </label>--}}

            {{--                                                                    </div>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}

            {{--                                    @endforeach--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <div class="card-footer">--}}
            {{--                                <button type="submit" class="btn-primary">Сохранить изменения</button>--}}
            {{--                            </div>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
        </div><!-- /.container-fluid -->
    </section>
    <script src="/js/taste.js"></script>
    <!-- /.content -->
@endsection
