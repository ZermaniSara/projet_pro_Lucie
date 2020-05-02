@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
        <style>
            html, body {
                height: 100%;
                background-color: black
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 36px;
            }
            /* CSS login register  */
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center
 {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

/* ird */
#logoird {
}


            </style>
        </head>
    <body>



<div class="flex-center position-ref full-height">


    <div class="row backgrounding">

            <div class="container contact-form " id="tt">

                <div class="row" id ="blockG">

                   <div class="col-md-6 "   id ="blockGG">
                    <div class="row backgrounding">
                         <img class=img-responsive src='irdT.png'style=width:50%/ />

                    </div>
                   </div>

                   <div class="col-md-6" id="blockD">

                    @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                   </div>

                </div>

            </div>


    </div>

</div>
<style>
    #tt
{
    background: url(https://source.unsplash.com/TV2gg2kZD1o);
    background-repeat: no-repeat;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 60%;
  height: 60%;
 
  transform: translate(-50%, -50%);
 text-align: center;
 color: white;
 margin-bottom: 1%;
  margin-top: 5%;
  
}

 #blockGG   {
    background: rgba(20, 40, 40, 0.8);
    margin:auto;
    text-align: center;
}

#blockD   {
    background: rgba(20, 40, 40, 0.8);
    transition: .2s;
}

.signupForm {
  width: 70%;
  padding: 30px 0;
  background: rgba(20, 40, 40, 0.8);
  transition: .2s;
}
.signupForm h2 {
  font-weight: 300;
}

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid #0ab4b4;
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, 0.2);
  color: white;
  outline: none;
}

.noBullet {
  list-style-type: none;
  padding: 0;
}

#sub-btn {
  border: 1px solid #0ab4b4;
  background: rgba(20, 20, 20, 0.6);
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
}
#sub-btn:hover {
  background: rgba(20, 20, 20, 0.8);
  padding: 10px 80px;
}
                                             input, #pet-select {
                                                display: inline-block;
                                                width: 200px;
                                                border: 1px solid gray;
                                                border-radius: 4px;
                                                font-size: 16px;
                                                margin: 10px 10px;
                                                width:60%;



                                                    }
                                            #formulo{
                                                    display: inline-block;
                                                    width: 6.25rem;
                                                    text-align: left;
                                                    color:#0ab4b4;
                                                    }



    .backgrounding{
        background-image: url('deux.jpg'); */
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
    }
</style>
    </body>
</html>
@endsection
