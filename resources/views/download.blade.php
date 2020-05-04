<!DOCTYPE html>
<html>
<head>
    <title>IRD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    
        <!-- Scripts -->
       
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 
   

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">  
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 

   
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
               <img src='ird.png' alt="logo_IRD" id="logoird" /></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        @if (Route::has('register'))
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li> --}}
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
        



@toastr_css

               
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="admin.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">  {{ Auth::user()->name }}</h4>
        <p class="font-weight-light text-muted mb-0">Admin</p>
      </div>
    </div>
  </div>



  
  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                {{__('Users management' )}}
            </a>
    </li>
    <li class="nav-item">
      <a href="#news" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                {{__(   'News')}}
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('contact.user') }}"  class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Send a Message')}}
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('contact.index') }}" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Messages received')}}
            </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('contact.show') }}" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Messages sent')}}
            </a>
    </li>
  
  </ul>


  </div>



  <div class="row backgrounding" id="box">
    <div class="container" id="contenu">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <h3 id="titre"> {{__('Welcome to the download platform')}}  </h3>
                  <div class="card-body">
                    <h5> {{__('Please fill in the fields' )}}</h5><br>
                <form action=/post >
                  @csrf
                   
                  <div class="form-group row">
                    
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                    <div class="col-md-6">
                        <input id="dateD" type="date"  name="DateD"  required >

                        
                    </div>
                </div>


                <div class="form-group row">
                    
                  <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                  <div class="col-md-6">
                      <input id="dateF" type="date"  name="DateF"  required >

                      
                  </div>
              </div>
              <div class="form-group row">
                    
                <label for="Mode" class="col-md-4 col-form-label text-md-right">{{ __('Mode') }}</label>

                <div class="col-md-6">
                  <select name="Mode" id="pet-select">
                    <option value="" required>--Choissisez votre Mode--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                </select>
                    
                </div>
            </div>
      
            <div class="form-group row">
                    
              <label for="Canal" class="col-md-4 col-form-label text-md-right">{{ __(' Channel') }}</label>

              <div class="col-md-6">
                
                  <select name="Canal" id="pet-select">
                    <option value="">--Choissisez votre Canal--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
            </select>
             
                  
              </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary" id="sub-btn">
                    {{ __('Downlaod') }}
                </button>
                        
                             
                                
            </div>
          </div>          
                          
                </form>



               </div>

            </div>

        </div>
  </div>    




 <style>
 
#contenu{
    margin-left:16rem;
}

#sidebar.active {
  margin-left: -20rem;
}

#content.active {
  width: 100%;
  margin: 0;
}

.vertical-nav {
  
  width: 15rem;
  height:100%;
  position: absolute;

  
  
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.4s;
}
.backgrounding{
        background-image: url('spacex--p-KCm6xB9I-unsplash.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        
      
    }

    #box {
align-content: center;
margin: 0 auto;
width: inherit;
color:white;
}

.card-body{
 
 position: relative;

 padding-top: 10%;
 background: rgba(20, 40, 40, 0.8);
 margin-bottom:  10%;
}

#titre{
    padding-top: 5%;
text-align: center;
}

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

  </style>
 </body>
    </html>

  @if (session('status'))
          <div class="alert alert-success" role="alert">
                  {{ session('status') }}
          </div>
  @endif


@jquery
@toastr_js
@toastr_render

