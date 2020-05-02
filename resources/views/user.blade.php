@extends('layouts.app')

@section('content')
<div class="row backgrounding" id="box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                        <div class="card-header">User Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Congratulation you're logged!
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
        @endsection
