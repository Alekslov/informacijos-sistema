@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                 <h2>Įmonės duomenų redagavimas</h2>
                </div>

               <div class="card-body">
                <form method="POST" action="{{route('company.update',[$company->id])}}">
                    <div class="form-group">
                        <label class="list-line__company__customer">Pavadinimas</label>
                        <input type="text" name="company_name"  class="form-control" value="{{old('company_name',$company->name)}}">
                        <small class="bg-warning">Įveskite įmonės pavadinimą</small>
                    </div>
                    <div class="form-group">
                        <label class="list-line__company__customer">Įmonės adresas</label>
                        <input type="text" name="company_adress"  class="form-control" value="{{old('company_adress',$company->adress)}}">
                        <small class="bg-warning">Įveskite įmonės adresą</small>
                    </div>
                    
                    @csrf
                    <button type="submit" class="btn btn-success">Patvirtinti</button>
                 </form>
                
               </div>
           </div>
       </div>
   </div>
</div>

@endsection

