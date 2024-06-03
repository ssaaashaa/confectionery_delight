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
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Комментарий и статус заказа</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{route('admin.orders.update', $order['id'])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Комментарий</label>
                                    <textarea style="height: 200px; resize: none" type="text" name="comment" class="form-control" id="exampleInputPassword1"  required placeholder="Комментарий">{{$order['comment']}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Итого, руб.</label>
                                    <input   type="text" name="price" class="form-control" id="price"  required placeholder="Цена" value="{{$order['total_cost']}}">
                                </div>
                                <div class="form-group" data-select2-id="40">
                                    <label>Статус</label>
                                    <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" name="status" data-select2-id="9" tabindex="-1"
                                            aria-hidden="true">
                                        @if($order['status']==="Подтвержден")
                                            <option  value="Подтвержден" @if($order['status']==="Подтвержден") selected @endif>Подтвержден</option>
                                            <option  value="Выполнен">Выполнен</option>
                                            <option  value="Отменен">Отменен</option>                                        @endif

                                        @if($order['status']==="Ожидает подтверждения")
                                            <option  value="Ожидает подтверждения" @if($order['status']==="Ожидает подтверждения") selected @endif >Ожидает подтверждения</option>
                                            <option  value="Подтвержден" @if($order['status']==="Подтвержден") selected @endif>Подтвержден</option>
                                            <option  value="Отменен">Отменен</option>
                                        @endif
                                    </select><span
                                        class="select2 select2-container select2-container--default select2-container--below"
                                        dir="ltr" data-select2-id="10" style="width: 100%;">
                                            <span
                                                class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn-primary">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <script>
        // Получаем элемент текстового поля
        var price = document.getElementById("price");

        // Добавляем обработчик события ввода
        price.addEventListener("input", function (e) {
            // При вводе текста запускаем функцию толькоLettersSpacesDashes
            price.value = onlyLettersSpacesDashes(price.value);
        });

        function onlyLettersSpacesDashes(e) {
            // Допускаются только буквы, пробелы и тире
            var regex = /[^0-9.]/g;

            // Заменяем все недопустимые символы на пустую строку
            var result = e.replace(regex, "");

            // Возвращаем замененный результат
            return result;
        }
    </script>
    <!-- /.content -->
@endsection
