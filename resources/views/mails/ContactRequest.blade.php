<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Việt Nhân</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
            width: 100%;
        }

        .title {
            font-size: 20px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .table {
            width: 100%;
        }
        .table td {
            border: 1px solid grey;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">A New Contact Request has been sent at {{ $time }}</div>
        <table class="table">
            <tbody>
            <tr>
                <td>Name</td>
                <td>{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $data['phone'] }}</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>{{ $data['message'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>