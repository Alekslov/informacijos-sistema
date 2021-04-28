@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Įmonės informacija</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item list-line">
                    
                            <div class="list-line__company__customer">
                                Įmonės pavadinimas:
                                <div class="list-line__company__type">  
                            {{$company->name}}
                            </div>
                        </div>
                    </li>
                        
                        <li class="list-group-item list-line">
                            <div class="list-line__company__customer">
                                Įmonės adresas:
                                <div class="list-line__company__type">  
                            {{$company->adress}}
                            </div>
                        </div>
                    </li>
 
                            <div class="list-line__buttons">
                                <a href="{{route('company.edit',[$company])}}" class="btn btn-success">Redaguoti</a>
                                <a href="{{route('company.index',[$company])}}" class="btn btn-secondary">Atgal</a>
                            </div>
                        
                     </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection