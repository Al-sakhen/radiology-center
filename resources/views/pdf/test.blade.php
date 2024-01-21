<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal&display=swap');

    </style>

</head>

<body style="padding:30px">
    <div style="border-bottom:3px solid #ccc;text-align:center">
        <h1>{{ $data->center_name }}</h1>
        <p style="font-size:30px;">{{ $data->center_description }}</p>
        <p style="font-size:20px;">{{ $admin->name }}</p>
        <p style="font-size:15px;">{{ $data->center_address }}</p>
        <h2 style="font-size:12px;"> تلفون : <span>{{ $data->center_phone }}</span></h2>
    </div>
    <div>
        <h2 style="font-size:20px;text-align:center;margin-top:30px;padding:30px">X-RAY Report</h2>
        <table style="border:1px solid #000;border-collapse:collapse;width:100%;text-align:left">
            <tr  style="border:1px solid #000" >
                <td   style="border:1px solid #000;padding:5px"> Name : </td>
                <td colspan="3" style="border:1px solid #000;text-align:left;padding:5px" >{{ $pateint->name }}</td>
            </tr>

            <tr  style="border:1px solid #000">
                <td  style="border:1px solid #000;padding:5px">Referring physician</td>
                <td  style="border:1px solid #000;padding:5px">{{ $data->doctor_name }}</td>
                <td  style="border:1px solid #000;padding:5px">  sex : </td>
                <td  style="border:1px solid #000;padding:5px"> </td>
            </tr>

            <tr  style="border:1px solid #000">
                <td  style="border:1px solid #000;padding:5px"> Date : </td>
                <td  style="border:1px solid #000;padding:5px">{{$data->created_at}}</td>
                <td  style="border:1px solid #000;padding:5px">  Age :  </td>
                <td  style="border:1px solid #000;padding:5px">{{ App\Http\Controllers\PatientController::getAge($pateint->DOB) }}</td>
            </tr>

        </table>
    </div>




   <div style="direction: ltr">

    {!! $data->description !!}
   </div>

</body>

</html>
