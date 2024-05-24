<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #C1C1C1;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #EEEEEE;
            border-radius: 20px;
            box-shadow: 10px 10px 10px #5E5B5B;
            margin-top: 200px;

        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #0019FF;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-left: 5px;
            margin-bottom: 50px;
        }

        th{
            background-color: #000000;
            color: whitesmoke;
            padding: 20px;
            margin-left: 5px;
        }
        button{
            background-color: #fc031c;
        }
    </style>
    <title>Time Tracker System</title>

</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5">ATTENDANCE TIME TRACKER</h1>
    <div id="table-history">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1
                @endphp
                @php
                    $t = false;
                @endphp
                @php
                    $last_number=1;
                @endphp
                @foreach ($students as $student)
                    @if(is_null($student->time_out))
                        @php
                            $t = true;
                        @endphp
                    @else
                        @php
                            $t = false;
                        @endphp
                    @endif

                    @php
                        $last_number=$student->id;
                    @endphp
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$student->date}}</td>
                        <td>{{$student->time_in}}</td>
                        <td>{{$student->time_out}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            @if (!$t)
                <form action="{{ route('time_in', ['user_id'=>Session::get('user_id')]) }}" method="POST" id="timeButton">
                    @csrf
                    <button>Time In</button>
                </form>
            @else
                <form action="{{ route('time_out', ['user_id'=>$last_number]) }}" method="POST">
                    @csrf
                    <button>Time out</button>
                </form>
            @endif
        </div>
    </div>
  </div>

</body>
</html>


