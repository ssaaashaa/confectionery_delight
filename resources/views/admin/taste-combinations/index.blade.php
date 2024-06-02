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
                                        <td> {{ $biscuit['name'] }} </td>
                                        <td>
                                            <img src="/storage/biscuits/{{ $biscuit['img'] }}" alt="" width="150px" height="auto" loading="lazy">
                                        </td>
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
                        <form action="{{route("admin.biscuit.store")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="biscuit" class="form-control" id="biscuit" required
                                           placeholder="Вкус"/>
                                </div>
{{--                                <input type="file" name="file" class="input-file load_taste_img"--}}
{{--                                       style="margin-bottom: 10px" id="new_biscuit_img" required>--}}
{{--                                <label style="margin-bottom: 10px; padding: 0" for="new_biscuit_img"--}}
{{--                                       class="btn btn-tertiary js-labelFile">--}}
{{--                                </label>--}}
                                <div class="form-group">

                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="new_biscuit" required>
                                        <label id="custom-file-label"  class="custom-file-label" for="new_biscuit"></label>
                                    </div>
                                </div>

                                <span>
                                    Сочетается с:
                                </span>
                            @foreach($fills as $fill)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input custom-control-input-danger"
                                               type="checkbox"
                                               name="fills[]"
                                               value="{{$fill['id']}}"
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
                                    <input type="text" name="fill" class="form-control" id="fill" required
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
    <script>
        var biscuit = document.getElementById("biscuit");
        var fill = document.getElementById("fill");
        // Добавляем обработчик события ввода
        biscuit.addEventListener("input", function (e) {
            // При вводе текста запускаем функцию толькоLettersSpacesDashes
            biscuit.value = onlyLettersSpacesDashes(biscuit.value);
        });
        fill.addEventListener("input", function (e) {
            // При вводе текста запускаем функцию толькоLettersSpacesDashes
            fill.value = onlyLettersSpacesDashes(fill.value);
        });

        function onlyLettersSpacesDashes(e) {
            // Допускаются только буквы, пробелы и тире
            var regex = /[^а-яА-Я\s]/g;

            // Заменяем все недопустимые символы на пустую строку
            var result = e.replace(regex, "");

            // Возвращаем замененный результат
            return result;
        }
    </script>
    <!-- /.content -->
@endsection
