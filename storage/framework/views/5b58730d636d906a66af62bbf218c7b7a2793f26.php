<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Новый заказ
                </div>
                <div class="panel-body">
                    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="<?php echo e(url('order')); ?>" method="POST" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

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
            <?php if(count($orders) > 0): ?>
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
                                <?php foreach($orders as $order): ?>
                                    <tr>
                                        <form action="<?php echo e(url('order/edit/'.$order->id)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <td class="table-text"><div><?php echo e($order->id); ?></div></td>
                                            <td class="table-text"><div><input type="text" name="phone" class="form-control" value="<?php echo e($order->phone); ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "11"></div></td>
                                            <td class="table-text"><div><input type="text" name="fio" class="form-control" value="<?php echo e($order->fio); ?>"></div></td>
                                            <td class="table-text"><div><input type="text" name="summ" class="form-control" value="<?php echo e($order->summ); ?>"></div></td>
                                            <td class="table-text"><div><input type="text" name="address" class="form-control" value="<?php echo e($order->address); ?>"></div></td>
                                            <td class="table-text"><div><?php echo e($order->created_at); ?></div></td>
                                            <td>
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-btn fa-pencil"></i>Изменить
                                                </button>
                                            </td>
                                            <input type="hidden" name="id" class="form-control" value="<?php echo e($order->id); ?>">
                                        </form>
                                        <td>
                                            <form action="<?php echo e(url('order/delete/'.$order->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>