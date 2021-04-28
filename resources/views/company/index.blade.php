


@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Įmonių sąrašas</h2>
                   <a href="{{route('company.index', ['sort' => 'name'])}}" class="sort text-danger" > Rušiuoti pagal abecėlę</a>
                   <a href="{{route('company.index')}}" class="sort text-danger"> Pagal nutylėjimą </a>
                </div>

                <div class="card-body">
                    <ul class="list-group">

                    @foreach ($companies as $company)
                        <li class="list-group-item list-line">
                            <div class="list-line__company__customer">
                                {{$company->name}} 
                                
                            </div>
                            <div class="list-line__buttons">
                                <a href="{{route('company.show',[$company])}}" class="btn btn-secondary">Informacija</a>
                                <a href="{{route('company.edit',[$company])}}" class="btn btn-success">Redaguoti</a>
                                <form method="POST" action="{{route('company.destroy', [$company])}}">
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
