@extends('layouts.app')

@section('content')
<body>
    <div class="row backgrounding" id="box">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 id="titre"> {{__('Welcome to the image satellite download site of the IRD GUYANE')}}  </h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }} ">
                            
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="sub-btn">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    
                                </div>
                                    
                                <div>
                           <br> 
                           {{__('Do not have an account yet?')}}
                                    <a   class="inscriptionLink" href="{{ route('register') }}">
                                        {{__('Register')}}</a>
                                       </div>
                            </div>
                        </form>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
#sub-btn{
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
.backgrounding{
        background-image: url('spacex--p-KCm6xB9I-unsplash.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        
      
    }

.card-body{
 
    position: relative;
  
    padding-top: 10%;
    background: rgba(20, 40, 40, 0.8);
    margin-bottom:  10%;
}
#box {
align-content: center;
margin: 0 auto;
width: inherit;
color:white;
}
#titre{
    padding-top: 5%;
text-align: center;
}
</style>
@endsection
