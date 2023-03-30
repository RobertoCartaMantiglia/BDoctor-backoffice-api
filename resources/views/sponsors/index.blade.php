@extends('layouts.app')
@section('content')
  
 <div class="container mt-4 pt-3 bg-white border rounded-4">
    <div class="row">
        <h1 class="text-center mb-5">Choose your Sponsorization Plan</h1>      
        <div class="col-12 d-flex justify-content-between">   
                @foreach ($sponsors as $sponsor)             
                    @if($sponsor->id != 1)
                    <div class="col-3 text-center custom-card blue">
                        <div class="doc-btn rounded-4 mb-4 font-weight-bold">
                            <h3 class="text-capitalize doc-btn rounded-4">{{ $sponsor->type }}</h3>
                        </div>
                        <div>
                           <span class="fs-2">
                            {{$sponsor->price}} &euro;/month
                           </span>
                        </div>
                        <div class="my-3">
                            <span class="text-capitalize">duration:</span> {{$sponsor->duration}} hours
                        </div>
                        <button   class="btn btn-primary doc-btn my-3 me-auto">
                            <a href="Acquista" class="text-white text-decoration-none">Acquista</a>
                        </button>
                    </div>
                    @endif
                
                @endforeach
             
        </div>
    </div>
    <button  class="btn btn-primary doc-btn my-4 me-auto">
        <a href="{{route('dashboard')}}" class="text-white text-decoration-none">Dashboard</a>
    </button>        
</div>
@endsection