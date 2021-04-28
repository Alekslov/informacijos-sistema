
 

 @extends('layouts.app')

 @section('content')
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Įmonės pavadinimas</h2>
                 </div>
 
                <div class="card-body">
                 <form method="POST" action="{{route('company.store')}}">
                     <div class="form-group">
                         <label class="list-line__company__customer">Pavadinimas</label>
                         <input type="text" name="company_name"  class="form-control" value="{{old('company_name')}}">
                         <small class="bg-warning">Įveskite įmonės pavadinimą</small>
                     </div>
                     <div class="form-group">
                         <label class="list-line__company__customer">Adresas</label>
                         <input type="text" name="company_adress"  class="form-control"  value="{{old('company_adress')}}">
                         <small class="bg-warning">Įveskite įmonės adresą</small>
                     </div>
                    
                     @csrf
                     <button type="submit" class="btn btn-success">Pridėti</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 
 @endsection
 
 