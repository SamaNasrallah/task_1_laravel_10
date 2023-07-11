<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="<?php echo e(asset('css/style.css')); ?>">
    <title>Task1</title>

</head>
<body>
<form action="<?php echo e(route('tasks.store')); ?>" method="POST">

<div class="container">
<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

<input type="submit" class="btn btn-success" value="اعتماد">

<div class="wor" >
        <h3 style="display: inline; "  >  السائق </h3>
            <br>
            <select style="font-size: 20px;" name="driver" id="driv" >
                <option >محمد احمد</option>
                <option >محمد رياض الخضري </option>
                <option > ايمن محمد الديراوي</option>

            </select>
        </div>

        <div class="wor2">
            <br>
    <h3 style="display: inline;"> الكمية </h3> <br>
    <label >
        <input type="number" name="Quantity"  id="Quantity"  >
    </label>
    <br>
    <label >
        <input type="radio" name="amount" id="liter" value="liter">لترات
    </label>
    <br>
    <label >
        <input type="radio" name="amount" id="money" value="money">مبلغ
    </label>
</div>

        <div class="wor3">
         <h3 style="display: inline; "> الصنف  </h3></h3> <br>
            <select  style="font-size: 20px;" name="item" id="item">
                <option>سولار</option>
                <option>بنزين</option>
            </select>
        </div>


    </div>
    </form>
    <hr>

    <h1 style="margin-left:85%; " >الطلبات السابقة </h1>

    <table>
        <thead>
          <tr>
            <th>الحالة</th>
            <th>السائق</th>
            <th>الكمية</th>
            <th>الصنف</th>
            <th>التاريخ</th>
            <th>رقم الطلب</th>
          </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td >      <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <button type="submit" class="btn btn-sm btn-danger my-custom-button">
                <?php echo e($task->stat); ?>

            </button>
        </form>  </td>
        <td ><?php echo e($task->driver); ?></td>
        <td ><?php echo e($task->Quantity); ?></td>
        <td ><?php echo e($task->item); ?></td>
        <td ><?php echo e($task->created_at->format('Y-m-d')); ?></td>
        <td ><?php echo e($task->id); ?></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>


</body>
</html>

<?php /**PATH C:\Users\MI\Desktop\laravel\task1\resources\views/task/test.blade.php ENDPATH**/ ?>