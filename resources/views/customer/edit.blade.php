

@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h2>Kliento redagavimas</h2>
                </div>

               <div class="card-body">
                <form method="POST" action="{{route('customer.update',[$customer])}}">
                    <div class="form-group">
                        <label class="list-line__company__customer">Vardas</label>
                        <input type="text" name="customer_name"  class="form-control" value="{{old('customer_name',$customer->name)}}">
                        <small class="bg-warning">Įveskite kliento vardą.</small>
                    </div>
                    <div class="form-group">
                        <label class="list-line__company__customer">Pavardė</label>
                        <input type="text" name="customer_surname"  class="form-control" value="{{old('customer_surname',$customer->surname)}}">
                        <small class="bg-warning">Įveskite kliento pavardę.</small>
                    </div>
                    <div class="form-group">
                        <label class="list-line__company__customer">Telefono numeris</label>
                        <input type="text" name="customer_phone"  class="form-control" value="{{old('customer_phone',$customer->phone)}}">
                        <small class="bg-warning">Įveskite kliento telefono numerį.</small>
                    </div>
                    <div class="form-group">
                        <label class="list-line__company__customer">El. pašto adresas</label>
                        <input type="text" name="customer_email"  class="form-control" value="{{old('customer_email',$customer->email)}}">
                        <small class="bg-warning">Įveskite kliento el. pašto adresą.</small>
                    </div>
                    <div class="form-group">
                        <label  class="list-line__company__customer">Apie klientą</label>
                        <textarea name="customer_comment" id="summernote">{{$customer->comment}}</textarea>
                        <small class="bg-warning">Parašykite apie klientą</small>
                      </div>
                    
                      <div class="form-group">
                        <label class="list-line__company__customer">Pasirinkite įmonę</label>
                   
                    <select name="company_id" class="dropdown_blade" >
                       
                        @foreach ($companies as $company)
                       
                            <option value="{{$company->id}}" @if($company->id == $customer->company_id) selected @endif>
                                {{$company->name}} 
                            </option>
                        @endforeach
                    </select>
                    @csrf
                     </div>
                    <div class="list-line__buttons">
                        <button type="submit" class="btn btn-success">Patvirtinti</button>
                    </div>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });
    </script>
@endsection


