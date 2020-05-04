

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
      <a href="{{ route('message.user') }}"  class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Send a Message')}}
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('message.index') }}" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Messages received')}}
            </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('message.show') }}" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Messages sent')}}
            </a>
    </li>
  
  </ul>

  </div>
<!-- End vertical navbar -->


<!-- Page content holder -->

<div class="row backgrounding" id="box">

<div class="container"id="contenu">
    <h3 id="titre">{{__('Welcome to messages sent area')}}</h3>
    {{-- <a class="btn btn-warning" href="#" id="modeadmin"> {{__('Change To Maintenance Mode')}}</a> --}}
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> {{__('Send a New Message')}}</a>
   
    <br>
     
     

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th >{{__('Name')}}</th>
                <th>{{__('Mail')}}</th>
                <th>{{__('Subject')}}</th>
                <th>{{__('Sent at')}}</th>
                <th >{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>




<!-- response  message  -->

<!-- Create message  -->
<div class="modal fade" id="createModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="create_id" id="create_id">
                   <div class="form-group"  id="choose">
                        <label for="name" class="col-sm-12 control-label">Choose User*</label>
                    <div class="col-sm-12">
                            <select class="form-control" name="user" id="user" >
                                                @foreach($users as $user)
                                                @if($user->role =="user")
                                                    <option   value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endif
                                                @endforeach
                                                
                             </select >
                    </div>
                   
                   
                     </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Subject*</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="subject" name="subject"  value=""  required=""  rows="5" >
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Message*</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="messageH" name="messageH"  value=""  required=""  rows="5" >
                            </textarea>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">{{__('Send')}}
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>   
<!--  -->

 <!-- Afficher Table + Edit et delete  -->



  
   <div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm1" name="productForm1" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">

               
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="message" name="message"  value="" maxlength="50" required="" readonly>
                        </div>
                    </div>

                    <!-- <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn1" value="create">{{__('Response')}}
                     </button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
    </div>
</div>   
 


</div>
</div>
</body>
    

   <style>
body{
    /* overflow: hidden !important;  */
    min-height:100vh ;
    min-width:100vh ;
}

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
        width:100% !important;
     
        
    }
    #titre{
        color:white;
    }
    thead{
        background: rgba(20, 40, 40, 0.8);
        color: white;
    }
   </style>


</html>


<script type="text/javascript">
 
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});

    $(function () {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('message.show') }}",
          columns: [
             // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'subject', name: 'subject'},
              {data: 'created_at', name: 'created_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
       

       
 

    $('#createNewProduct').click(function () {
        
        
           $('#saveBtn').val("create-product");
           $('#create_id').val('');
           $('#productForm').trigger("reset");
           $('#createHeading').html("New Message");
           $('#createModel').modal('show');
           
            
         
         
        
      });
   
      $('body').on('click', '.editProduct', function () {
        var product_id = $(this).data('id');
    
        $.get("{{ route('message.index') }}" +'/' + product_id +'/edit', function (data) {
            $('#modelHeading').html(data.subject);
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#message').val(data.message);
           
   
          
        })
        
           });
     
    
      
           $('#saveBtn1').click(function (e) {
           
           
            
            $('#saveBtn2').val("create-product");
          $('#response_id').val('');
        
       


       $('#modelHeading').html("Response");
            $('#ajaxModel').modal('hide');
            $('#responseModel').modal('show');
            // $('#response_id').val('#produt_id');
            // $('#user').val('#user');
            // $('#subject').val('#subject');
         
        

            e.preventDefault();
            $(this).html('Sending..');


            });


            $('#saveBtn2').click(function (e) {
 

                var pi=($('input#product_id').val());
               
               $('#userR').val(pi);

              
               $('#response_id').val();  

 $.ajax({
     
    
data: $('#productFormR').serialize(),
   url: "{{ route('message.store2') }}",
   type: "POST",
   dataType: 'json',
   
   success: function (data) {
      
       $('#productFormR').trigger("reset");
       $('#ResponseModel').modal('hide');
       table.draw();
       
   },
   error: function (data) {
       

       console.log('Error:', data);
       $('#saveBtn2').html('Save Changes');
   }
});
});


      
      $('#saveBtn').click(function (e) {
 
          e.preventDefault();
          $(this).html('Sending..');
         
          $.ajax({
              
             
         data: $('#productForm').serialize(),
            url: "{{ route('message.store') }}",
            type: "POST",
            dataType: 'json',
            
            success: function (data) {
               
                $('#productForm').trigger("reset");
                $('#createModel').modal('hide');
                table.draw();
                
            },
            error: function (data) {
                
       
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
      
      $('body').on('click', '.deleteProduct', function () {
       
          var product_id = $(this).data("id");
         if( confirm("Are You sure want to delete !")){
        
          $.ajax({
              type: "DELETE",
              url: "{{ route('message.store') }}"+'/'+product_id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });}
     
         });
        });
  </script>

  
