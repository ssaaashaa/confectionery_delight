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
                <div class="card-body p-0">
                    <div class="card-header">
                        <h3 class="card-title">Все администраторы</h3>
                    </div>
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                ID
                            </th>
                            <th>
                                Имя
                            </th>
                            <th>
                                Почта
                            </th>
                            <th>
                                Пароль
                            </th>
                            <th style="width: 30%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>
                                    {{ $admin['id'] }}
                                </td>
                                <td>
                                    {{ $admin['name'] }}
                                </td>
                                <td>
                                    {{ $admin['email'] }}
                                </td>
                                <td>
                                    Недоступен
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.admin.edit', $admin['id']) }}">
                                      Изменить пароль
                                    </a>
                                    <form action="{{ route('admin.admin.destroy', $admin['id']) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn"
                                        @if(Auth::user()->id==$admin['id'])
                                            disabled
                                            @endif
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
