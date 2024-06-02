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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Изменение информации о дегустации</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{route('admin.tasting.update', $event['id'])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="date">Дата</label>
                                    {{--                                    <input type="date"  name="date" value="{{date('d.m.Y', strtotime($event['date']))}}"  min="{{date('d.m.Y')}}" max="2024-12-31" class="form-control" id="date"  required placeholder="Дата">--}}
                                    <input type="date" min="{{date('Y-m-d', strtotime(today().'+ 1 days'))}}"
                                           name="date" class="form-control" id="date" required placeholder="Дата"
                                           value="{{$event['date']}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="time">Время</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            name="time" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                        <option value="12:00" @if($event['time'] === '12:00') selected @endif>12:00
                                        </option>
                                        <option value="16:00" @if($event['time'] === '16:00') selected @endif>16:00
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена, BYN</label>
                                    <input type="number" min="0" name="price" value="{{$event['price']}}"
                                           class="form-control" id="price" required placeholder="Входной билет">
                                </div>
                                <div class="form-group">
                                    <label for="count">Количество мест</label>
                                    <input type="number" min="0" name="count" value="{{$event['event_count']}}"
                                           class="form-control" id="count" required placeholder="Количество мест">
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
        const picker = document.getElementById('date');
        picker.addEventListener('input', function (e) {
            const dayOfWeek = new Date(this.value).getUTCDay();
            if ([1, 2, 3, 4, 5].includes(dayOfWeek)) {
                e.preventDefault();
                this.value = '';
                alert('Разрешен выбор только выходных дней!');
            }
        });
    </script>
    <!-- /.content -->
@endsection
