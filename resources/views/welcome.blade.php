@extends('layouts')
@section('content')



<div class="container">
    <div class="text-center h3"> Product Shop</div>

    <div class="py-2">
      
          <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-12"></div>
              <div class="col-lg-6 col-md-4 col-sm-12">
                <form>
                    <div class="mb-3">
                      <label for="ProductName" class="form-label">Product Name</label>
                      <input type="email" class="form-control" id="ProductName" required>
                     
                    </div>
                    <div class="mb-3">
                      <label for="Quantity" class="form-label">Quantity</label>
                      <input type="number" min="0" class="form-control" id="Quantity" required>
                    </div>

                    <div class="mb-3">
                        <label for="Price" class="form-label">Unit Price</label>
                        <input type="number" min="0" name="price" class="form-control" id="Price" required>
                      </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
    
              </div>
              <div class="col-lg-3 col-md-4 col-sm-12"></div>
          </div>
           
        
    </div>
</div>

 
    
@endsection