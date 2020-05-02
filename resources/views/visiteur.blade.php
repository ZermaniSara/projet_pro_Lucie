@extends('layouts.app')

@section('content')
<html>
<body>
<div class="row backgrounding" id="box">
<div class="container">
    <div class="row justify-content-center">
       
                <div class="col-md-8">
                <h3 id="titre"> {{__('Welcome to the image satellite download site of the IRD GUYANE')}}  </h3>
               
                <div class="card-body  ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="titre1">
                    {{ __('Please wait !') }}
                    {{ __('the administrator will process your request.') }} 
                </div>
                <br>
                    <a href="#"><img src='wait.gif' alt="logo_wait" id="logowait" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
<style>
.backgrounding{
    background-image: url('spacex--p-KCm6xB9I-unsplash.jpg');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    
}
body,html{
    min-height: 100%;
}
#titre{
    padding-top: 5%;
text-align: center;
}
#titre1{
    text-align: center;
}
.card-body{
 
 position: relative;
 padding-top: 10%;
 background: rgba(20, 40, 40, 0.8);
 margin-bottom:  10%;
 


}
#box {

margin: 0 auto;
width: inherit;
color:white;

}
#logowait
{width:32%;
margin-left :30%;
}
</style>
@endsection
