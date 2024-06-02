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
                            <h3 class="card-title">Добавить администратора</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{route('admin.admin.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="admin">Имя</label>
                                    <input type="text" name="name" class="form-control" id="admin"
                                           placeholder="Имя" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Адрес электронной почты</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" required placeholder="Адрес электронной почты">
                                </div>
                                @error('email')
                                <p>{{ $message }}</p>
                                @enderror
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
    <script>
        var admin = document.getElementById("admin");

        // Добавляем обработчик события ввода
        admin.addEventListener("input", function (e) {
            // При вводе текста запускаем функцию толькоLettersSpacesDashes
            admin.value = onlyLettersSpacesDashes(admin.value);
        });

        function onlyLettersSpacesDashes(e) {
            // Допускаются только буквы, пробелы и тире
            var regex = /[^a-zA-Zа-яА-Я-]/g;

            // Заменяем все недопустимые символы на пустую строку
            var result = e.replace(regex, "");

            // Возвращаем замененный результат
            return result;
        }
    </script>
@endsection
