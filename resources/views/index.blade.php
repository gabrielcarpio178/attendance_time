
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        body{
            background: linear-gradient(to bottom right, #009999 0%, #006699 100%);
            background-repeat: no-repeat;
            height: 937px;
            position: relative;
        }
        .box{
            border: 0.1px solid rgb(255, 255, 255);
            width: 550px;
            position: relative;
            left: 34%;
            top: 230px;
            align-items: center;
            height: 450px;
            border-radius: 10px;
            box-shadow: 5px 5px 20px rgb(21, 219, 203);
        }
        h1 {
            position: relative;
            text-align: center;
            font-size: 50px;
            top: -5%;
            animation-name: fadein;
            animation-duration: 4s;
            animation: fadeIn 2.5s ease-in-out forwards;
            color: white;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bolder;
        }
        h3{
            position: relative;
            text-align: center;
            font-size: 30px;
            color: hsl(246, 100%, 50%);
            font-weight: bolder;
            animation-name: fadein;
            animation-duration: 4s;
            animation: fadeIn 2.5s ease-in-out forwards;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bolder;
        }
        input[type=text] {
            width: 59%;
            position: relative;
            padding: 12px 30px;
            margin: 8px 0;
            left: 120px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 10px;
            font-size: 15px;
            animation-name: example;
            animation-duration: 4s;
            animation: fadeIn 2.5s ease-in-out forwards;
            opacity: 0.5;
            background-color: whitesmoke;
            top: 7px;
            border: none;
            }
        input[type=password]{
            width: 59%;
            position: relative;
            padding: 12px 30px;
            margin: 8px 0;
            left: 120px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 10px;
            font-size: 15px;
            animation-name: example;
            animation-duration: 4s;
            animation: fadeIn 2.5s ease-in-out forwards;
            opacity: 0.5;
            background-color: whitesmoke;
            top: 15px;
            }
        input[type=submit]{
            position: relative;
            height: 40px;
            width: 100px;
            top: 10px;
            background-color: hsl(119, 100%, 28%);
            border-radius: 10px;
            left: 230px;
            color: white;
            font-weight: bolder;
            font-size: 15px;
            border: none;
            animation-name: example;
            animation-duration: 4s;
            animation: fadeIn 2.5s ease-in-out forwards;
            opacity: 0.5;
        }

        @keyframes fadeIn {
            0% {
            opacity: 0;
            }
            100% {
            opacity: 1;
            }
        }
        p{
            color: red;
            text-align: center;
        }
    </style>
    <title>LOGIN FORM</title>
</head>
<body>
    <div class="box">
        <form action="{{route('progress')}}" method="post">
            <h1>LOGIN</h1>
            <h3>ATTENDANCE TIME TRACKER</h3>
            @csrf
            @method('post')
            <div class="username">
                <input type="text" name="username" id="username" class="username" placeholder="Enter your Username" value="{{old('username')}}">
                @error('username')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="password">
                <input type="password" name="password" id="password" class="password" placeholder="Enter  your Password" value="{{old('password')}}">
                @error('password')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="message-error">
                @if ($errors->has('error_message'))
                    <p>{{$errors->has('error_message')}}</p>
                @endif
                @if (@session()->has('error'))
                    <p>{{session('error')}}</p>
                @endif
            </div>
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>

