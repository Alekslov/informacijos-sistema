

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Klientų sąrašas</h2>
                   <div class="make-inline">
                    <form action="{{route('customer.index')}}" method="get" class="make-inline">
                        <div class="form-group make-inline">
                            <label>Įmonė: </label>
                            <select class="form-control dropdown_blade" name="company_id">
                                <option value="0" disabled @if($filterBy==0) selected @endif>Pasirinkite</option>
                                @foreach ($companies as $company)
                                <option value="{{$company->id}}" @if($filterBy==$company->id) selected @endif>
                                    {{$company->name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-warning">Filter</button>
                    </form>
                    <a href="{{route('customer.index')}}" class="btn btn-warning">Clear filter</a>
                   
                </div>

               <div class="card-body">
                <ul class="list-group">
                @foreach ($customers as $customer)
                <li class="list-group-item list-line">
                    <div class="list-line__company__customer">
                        {{$customer->name}} {{$customer->surname}}
                        
                        <div class="list-line__company__type"> 
                            <label class="list-line_label"> Kliento darbovietes pavadinimas: </label>
                            {{$customer->customerCompany->name}}
                        </div>
                        
                    </div>
                    <div class="list-line__buttons">
                        <a href="{{route('customer.show',[$customer])}}" class="btn btn-secondary">Informacija</a>
                        <a href="{{route('customer.edit',[$customer])}}" class="btn btn-success">Redaguoti </a>
                        <form method="POST" action="{{route('customer.destroy', [$customer])}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Ištrinti</button>
                        </form>
                    </div>
                </li>
              @endforeach
            </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
