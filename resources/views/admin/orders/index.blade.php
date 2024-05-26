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
                    <h3 class="card-title"><b>Ожидают подтверждения</b></h3>

                </div>
                <div class="card-body p-0">
                    @foreach ($new_orders as $order)
                        <div class="card collapsed-card box-shadow-none">
                            <div class="card-header no-after border-bottom"
                                 style="display: flex!important; flex-direction: row!important; align-items: flex-end!important; align-content: space-between!important;">
                                <div style="display: flex!important; flex-direction: column!important;">
                                    <div
                                        style="display: flex!important; flex-direction: row!important; align-items: flex-start!important; column-gap:25px!important;align-content: space-between!important;">
                                        <h3 class="card-title">Заказ №{{$order->id}}
                                        </h3>
                                    </div>
                                    <p style="font-size: 15px!important; margin-top: 10px!important;">
                                        Дата готовности: {{date('d.m.Y', strtotime($order->date))}}
                                        <br>
                                        Заказчик: {{$order->user->name}}
                                        <br>
                                        Телефон: {{$order->user->telephone}}
                                    </p>
                                    <p>
                                        Комментарий: {{ $order->comment }}
                                    </p>
                                    <b style="margin-top: 5px!important;">Итого: {{$order->total_cost}} BYN</b>

                                </div>
                                <div class="card-tools" style="display: flex;  padding-bottom: 10px; flex-direction: column; align-items: flex-end; row-gap: 25px;">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.orders.edit',$order->id)}}">
                                        Изменить
                                    </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped projects"
                                       style="border-bottom: 1px solid rgba(0,0,0,.125)">
                                    <thead>
                                    <tr>
                                        <th style="width: 250px">
                                            Название
                                        </th>
                                        <th>
                                            Картинка
                                        </th>
                                        <th>
                                            Количество
                                        </th>
                                        <th>
                                            Вкус
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}, {{$product->count}}
                                            </td>
                                            <td>
                                                <img src="/storage/designs/{{$product->img}}" alt=""
                                                     class="user-orders__accordion-image"
                                                     width="200" height="200" loading="lazy"
                                                >
                                            </td>
                                            <td>
                                                {{ $product->quantity }} шт
                                            </td>
                                            <td>
                                                Вкус: {{ $product->biscuit_name }}
                                                <br>
                                                Начинка: {{ $product->fill_name }}
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Подтверждены</b></h3>

                </div>
                <div class="card-body p-0">
                    @foreach ($accept_orders as $order)
                        <div class="card collapsed-card box-shadow-none">
                            <div class="card-header no-after border-bottom"
                                 style="display: flex!important; flex-direction: row!important; align-items: flex-end!important; align-content: space-between!important;">
                                <div style="display: flex!important; flex-direction: column!important;">
                                    <div
                                        style="display: flex!important; flex-direction: row!important; align-items: flex-start!important; column-gap:25px!important;align-content: space-between!important;">
                                        <h3 class="card-title">Заказ №{{$order->id}}
                                        </h3>
                                    </div>
                                    <p style="font-size: 15px!important; margin-top: 10px!important;">
                                        Дата готовности: {{date('d.m.Y', strtotime($order->date))}}
                                        <br>
                                        Заказчик: {{$order->user->name}}
                                        <br>
                                        Телефон: {{$order->user->telephone}}
                                    </p>
                                    <p>
                                        Комментарий: {{ $order->comment }}
                                    </p>
                                    <b style="margin-top: 5px!important;">Итого: {{$order->total_cost}} BYN</b>

                                </div>
                                <div class="card-tools" style="display: flex;  padding-bottom: 10px; flex-direction: column; align-items: flex-end; row-gap: 25px;">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.orders.edit',$order->id)}}">
                                        Изменить
                                    </a>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body p-0 grey-line">
                                <table class="table table-striped projects "
                                       style="border-bottom: 1px solid rgba(0,0,0,.125)">
                                    <thead>
                                    <tr>
                                        <th style="width: 250px">
                                            Название
                                        </th>
                                        <th>
                                            Картинка
                                        </th>
                                        <th>
                                            Количество
                                        </th>
                                        <th>
                                            Вкус
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}, {{$product->count}}
                                            </td>
                                            <td>
                                                <img src="/storage/designs/{{$product->img}}" alt=""
                                                     class="user-orders__accordion-image"
                                                     width="200" height="200" loading="lazy"
                                                >
                                            </td>
                                            <td>
                                                {{ $product->quantity }} шт
                                            </td>
                                            <td>
                                                Вкус: {{ $product->biscuit_name }}
                                                <br>
                                                Начинка: {{ $product->fill_name }}
                                            </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>
            <div class="card collapsed-card">
                <div class="card-header">
                    <h3 class="card-title"><b>Выполнены</b></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                title="Collapse">
                            <i class="fas fa-plus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body p-0">
                    @foreach ($completed_orders as $order)
                        <div class="card collapsed-card box-shadow-none">
                            <div class="card-header no-after border-bottom"
                                 style="display: flex!important; flex-direction: row!important; align-items: center!important; align-content: space-between!important;">
                                <div style="display: flex!important; flex-direction: column!important;">
                                    <div
                                        style="display: flex!important; flex-direction: row!important; align-items: flex-start!important; column-gap:25px!important;align-content: space-between!important;">
                                        <h3 class="card-title">Заказ №{{$order->id}}
                                        </h3>
                                    </div>
                                    <p style="font-size: 15px!important; margin-top: 10px!important;">
                                        Дата готовности: {{date('d.m.Y', strtotime($order->date))}}
                                        <br>
                                        Заказчик: {{$order->user->name}}
                                        <br>
                                        Телефон: {{$order->user->telephone}}
                                    </p>
                                    <p>
                                        Комментарий: {{ $order->comment }}
                                    </p>
                                    <b style="margin-top: 5px!important;">Итого: {{$order->total_cost}} BYN</b>

                                </div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body p-0 grey-line">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 250px">
                                            Название
                                        </th>
                                        <th>
                                            Картинка
                                        </th>
                                        <th>
                                            Количество
                                        </th>
                                        <th>
                                            Вкус
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}, {{$product->count}}
                                            </td>
                                            <td>
                                                <img src="/storage/designs/{{$product->img}}" alt=""
                                                     class="user-orders__accordion-image"
                                                     width="200" height="200" loading="lazy"
                                                >
                                            </td>
                                            <td>
                                                {{ $product->quantity }} шт
                                            </td>
                                            <td>
                                                Вкус: {{ $product->biscuit_name }}
                                                <br>
                                                Начинка: {{ $product->fill_name }}
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                    @endforeach

                </div>
                <!-- /.card-body -->
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
