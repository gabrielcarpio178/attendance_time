<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Users</title>
</head>
<body>
    <section>
        <form action="{{route('store')}}" method="post">
            @csrf
            @method('post')
            <div class="fname">
                <input type="text" name="fname" id="fname" class="fname" placeholder="Enter your First Name" value="{{old('fname')}}">
                @error('fname')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="lname">
                 <input type="text" name="lname" id="lname" class="lname" placeholder="Enter your Last Name" value="{{old('lname')}}">
                 @error('lname')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="email">
                <input type="email" name="email" id="email" class="email" placeholder="Enter your Email" value="{{old('email')}}">
                @error('lname')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="birthday">
                <input type="date" name="birthday" id="birthday" class="birthday" placeholder="Enter your Birthday" value="{{old('birthday')}}">
                @error('birthday')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="gender">
                <select name="gender" id="gender">
                    <option value=""></option>
                    <option value="male" {{old('gender')==='male'?"selected":""}}>Male</option>
                    <option value="female" {{old('gender')==='female'?"selected":""}}>Female</option>
                </select>
                @error('gender')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <input type="hidden" name="user_type" id="user_type" class="user_type" value="user-info" value="{{old('user_type')}}">
            <div class="phone_number">
                <input type="number" name="phone_number" id="phone_number" class="phone_number" placeholder="Enter your Phone number">
                @error('phone_number')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="username">
                <input type="text" name="username" id="username" class="username" placeholder="Enter your Username" value="{{old('username')}}">
                @error('username')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <div class="password">
               <input type="password" name="password" id="password" class="password" placeholder="Enter your Password" value="{{old('password')}}">
               @error('password')
                <p class="message">this input required</p>
                @enderror
            </div>
            <div class="con_pass">
                <input type="password" name="password_confirmation" id="password_confirmation" class="password_confirmation" placeholder="Enter your confirm password" value="{{old('password_confirmation')}}">
                @error('password_confirmation')
                    <p class="message">this input required</p>
                @enderror
            </div>
            <input type="submit" value="Sumbit">
        </form>
    </section>
</body>
