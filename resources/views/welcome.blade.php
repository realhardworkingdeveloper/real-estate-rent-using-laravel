@extends('layouts.frontend.app')

@section('title')
    House Rent - Homepage
@endsection
    
@section('content')
    <div id="search">
        <div class="container-fluid">
            <div class="row justify-content-center py-4">
                <h2><strong>Search a house of your choice</strong></h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="row justify-content-center">
                            @if(session('search'))
                                <div class="alert alert-danger mt-3" id="alert" roles="alert">
                                    {{ session('search') }} 
                                </div> 
                            @endif 
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" name="address" placeholder="search an area" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="room" placeholder="room" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="bathroom" placeholder="bathroom" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="rent" placeholder="rent" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="content">
       <div class="container">
        <div class="row justify-content-center py-5">
            <h1><strong>Available Houses</strong></h1>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-9">
                
                   <div class="row">
                        @forelse ($houses as $house)
                            <div class="col-md-4">
                                <div class="card my-3">
                                    <div class="">
                                        <img  src="{{ asset('storage/featured_house/'. $house->featured_image) }}" class="img-fluid" alt="Card image">
                                    </div>
                                    <div class="card-body">
                                        <p>Area: {{ $house->area->name }}</p>
                                        <p>Address: {{ $house->address }}</p>
                                        <p>Rent: {{ $house->rent }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ route('house.details', $house->id) }}" class="btn btn-info">Details</a>
                                            </div>
                                            <div>
                                                {{-- <a class="btn btn-warning">Apply for booking</a> --}}
                                            </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        @empty 
                            <h2 class="m-auto py-2 text-white bg-dark p-3">House Not Available right now</h2>
                        @endforelse
                   </div>
                   
                   <div class="panel-heading my-4" style="display:flex; justify-content:center;align-items:center;">
                        {{ $houses->links() }}
                    </div>
                   
            </div>
            <div class="col-md-3">
                <ul class="list-group sort">
                    <li class="list-group-item bg-dark text-light"><strong>Search By Range</strong></li>
                    <form action="{{ route('searchByRange') }}" method="get" class="mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control" required name="digit1" placeholder="enter range (lower value)">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required name="digit2" placeholder="enter range (upper value)">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-success btn-block">Search</button>
                        </div>
                    </form>
                </ul>




                    <ul class="list-group sort">
                        <li class="list-group-item bg-dark text-light"><strong>Sort By Price</strong></li>
                        <li class="list-group-item"><a href="{{ route('highToLow') }}">High to low</a></li>
                        <li class="list-group-item"><a href="{{ route('lowToHigh') }}">Low to High</a></li>
                        <li class="list-group-item"><a href="{{ route('welcome') }}">Normal Order</a></li>
                    </ul>



                    <ul class="list-group area-show">
                        <li class="list-group-item bg-dark text-light"><strong>Areas</strong></li>
                        @forelse ($areas as $area)
                            <li class="list-group-item">
                                <a href="{{ route('available.area.house', $area->id) }}" class="area-name">{{ $area->name }} <strong>({{ $area->houses->count() }})</strong></a>
                            </li>
                        @empty  
                            <li class="list-group-item">Area not found</li>
                        @endforelse
                        
                    </ul>
            </div>
        </div>
       </div>
    </div>



@endsection