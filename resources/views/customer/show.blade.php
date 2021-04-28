@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Kliento informacija</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-line">
                    
                            <div class="list-line__customer__company">
                                Kliento vardas: 
                                <div class="list-line__customer__type">  
                            {{$customer->name}}
                            </div>
                        </div>
                    </li>
                        
                        <li class="list-group-item list-line">
                            <div class="list-line__customer__company">
                                Kliento pavardė
                                <div class="list-line__customer__type">  
                            {{$customer->surname}}
                            </div>
                        </div>
                    </li>
                                
                        
                        <li class="list-group-item list-line">
                            <div class="list-line__customer__company">
                                Kliento telefono numeris 
                                <div class="list-line__customer__type"> 
                            {{$customer->phone}}
                             </div>
                            </div>
                        </li> 
                        <li class="list-group-item list-line">
                            <div class="list-line__customer__company">
                                Kliento el. pašto adresas 
                                <div class="list-line__customer__type"> 
                            {{$customer->email}}
                             </div>
                            </div>
                        </li> 
                        
                        <li class="list-group-item list-line">
                            <div  class="list-line__customer__company">
                                Apie klientą 
                                <div class="list-line__customer__type"> 
                            {!!$customer->comment!!}
                             </div>
                            </div>
                        </li>
                        <li class="list-group-item list-line">
                            <div  class="list-line__customer__company">
                                Įmonė kurioje dirba klientas
                                <div class="list-line__customer__type">
                            {{$customer->customerCompany->name}}
                        </div>
                            </div>
                        </li>
                    
    
                            <div class="list-line__buttons">
                                <a href="{{route('customer.edit',[$customer])}}" class="btn btn-success">Redaguoti</a>
                                <a href="{{route('customer.index',[$customer])}}" class="btn btn-secondary">Atgal</a>
                            </div>
                        
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection