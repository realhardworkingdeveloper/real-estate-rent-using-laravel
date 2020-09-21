@extends('layouts.backend.app')
@section('title')
    Landlord Dashboard
@endsection
<style>
    .welcome{
        padding: 10px;
    }
    .icon{
        color: rgb(235, 227, 227) !important;
        font-size:55px !important;
        padding-bottom: 20px;
    }


    .col-md-3{
        background-color: rgb(95, 93, 182);
        height: 200px;
        padding: 20px;
        margin: 20px 33px; 
    }
    .number{
        color:azure;
    }
    .boxs{
        margin-top: 30px;
    }

    .col-md-3:hover{
        background: rgb(94, 114, 158)
    }
 </style> 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 welcome text-center my-4">
            <h1 class="name">Welcome to Admin Panel - <span style="padding: 6px;color:white;background:grey;"> {{ Auth::user()->name }}</span></h1>  
        </div>
    </div>
    <div class="row text-center boxs">
        <div class="col-md-3">
            <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                <h3 class="number">Areas</h3>
                <h3 class="number"><span class="counter">{{ $areas->count() }}</span></h3>
        </div>
        <div class="col-md-3">
            <i class="fa fa-home icon" aria-hidden="true"></i>
            <h3 class="number">Houses</h3>
            <h3 class="number"><span class="counter">{{ $houses->count() }}</span></h3>
        </div>
        <div class="col-md-3">
            <i class="fas fa-users-cog icon"></i>
            <h3 class="number">Renters</h3>
            <h3 class="number"><span class="counter">{{ $renters->count() }}</span></h3>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/js/jquery.counterup.min.js') }}"></script>
<script>
    $('.counter').counterUp({
        delay: 100,
        time: 2000
    });
</script>
    
@endsection
