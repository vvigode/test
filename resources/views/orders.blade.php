@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новый заказ
                </div>
                <div class="panel-body">
                    @include('common.errors')
                    <form action="{{ url('order')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="phone-name" class="col-sm-3 control-label">Номер телефона</label>

                            <div class="col-sm-6">
                                <input type="number" name="phone" id="order-phone" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order-fio" class="col-sm-3 control-label">ФИО</label>

                            <div class="col-sm-6">
                                <input type="text" name="fio" id="order-fio" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order-summ" class="col-sm-3 control-label">Сумма заказа</label>

                            <div class="col-sm-6">
                                <input type="text" name="summ" id="order-summ" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order-address" class="col-sm-3 control-label">Адрес доставки</label>

                            <div class="col-sm-6">
                                <input type="text" name="address" id="order-address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Создать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($orders) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Текущие заказы
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped order-table">
                            <thead>
                                <th>ID</th>
                                <th>Телефон</th>
                                <th>ФИО</th>
                                <th>Сумма</th>
                                <th>Адрес</th>
                                <th>Дата</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <form action="{{ url('order/edit/'.$order->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <td class="table-text"><div>{{ $order->id }}</div></td>
                                            <td class="table-text"><div><input type="text" name="phone" class="form-control" value="{{ $order->phone }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11"></div></td>
                                            <td class="table-text"><div><input type="text" name="fio" class="form-control" value="{{ $order->fio }}"></div></td>
                                            <td class="table-text"><div><input type="text" name="summ" class="form-control" value="{{ $order->summ }}"></div></td>
                                            <td class="table-text"><div><input type="text" name="address" class="form-control" value="{{ $order->address }}"></div></td>
                                            <td class="table-text"><div>{{ $order->created_at }}</div></td>
                                            <td>
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-pencil"></i>Изменить
                                                </button>
                                            </td>
                                            <input type="hidden" name="id" class="form-control" value="{{ $order->id }}">
                                        </form>
                                        <td>
                                            <form action="{{ url('order/delete/'.$order->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection