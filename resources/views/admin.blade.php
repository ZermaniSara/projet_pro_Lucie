@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                                </div>
                        @endif
                        Hello Admin
                        Congratulation you're logged!
                    </div>
                </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="connecter" value="" onclick="location.href='{{url('/ajaxproducts')}}'">Acceder au panel
                            </button>

                            <button type="submit" class="btn btn-danger" id="connecter" value= "">/!\ Maintenance du site
                                </button>
                                </div>

                                
                                    
                                            </div>
                
            </div>
        </div>
    </div>
</div>
 @endsection
<style>
    #connecter{
        margin: 5%;
    }
</style>