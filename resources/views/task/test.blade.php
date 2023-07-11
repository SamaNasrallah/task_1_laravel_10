<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="{{asset('css/style.css')}}">
    <title>Task1</title>

</head>
<body>
<form action="{{ route('tasks.store') }}" method="POST">

<div class="container">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

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

        @foreach ($tasks as $task)
    <tr>
        <td >      <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-sm btn-danger my-custom-button">
                {{ $task->stat }}
            </button>
        </form>  </td>
        <td >{{ $task->driver }}</td>
        <td >{{ $task->Quantity }}</td>
        <td >{{ $task->item }}</td>
        <td >{{ $task->created_at->format('Y-m-d') }}</td>
        <td >{{ $task->id }}</td>
    </tr>
@endforeach

        </tbody>
    </table>


</body>
</html>

