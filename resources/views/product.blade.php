@extends('layouts')
@section('content')



<div class="container">
    <div class="text-center h3"> Product Shop</div>

    <div class="py-2">
      
          <div class="row">
              <div class="col-lg-3 col-md-8 col-sm-12"></div>
              <div class="col-lg-6 col-md-8 col-sm-12">
                <form id="productForm">
                    <div class="mb-3">
                      <label for="ProductName" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="ProductName" required>
                     
                    </div>
                    <div class="mb-3">
                      <label for="Quantity" class="form-label">Quantity</label>
                      <input type="number" min="0" class="form-control" id="Quantity" required>
                    </div>

                    <div class="mb-3">
                        <label for="Price" class="form-label">Unit Price</label>
                        <input type="number" min="0" class="form-control" id="Price" required>
                      </div>
                   
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                  </form>
    
              </div>
              <div class="col-lg-3 col-md-8 col-sm-12"></div>
          </div>
          <div class="row py-5">
            <div class="col-lg-3 col-md-8 col-sm-12"></div>
            <div class="col-lg-6 col-md-8 col-sm-12">
               <table class="table" id="productTable">
                 <thead>
                   <tr>
                     <th>Product Name</th>
                     <th>Quantity</th>
                     <th>Unit Price</th>
                     <th>Datetime</th>
                     <th>total</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                   $data = file_get_contents('products.json');
					        	$data = json_decode($data);
                    $collection = collect($data);
                    $sorted  = $collection->sortDesc();
                    
                   ?>
                   @foreach ($sorted->values()->all() as $item)
                   <tr>
                     <td>{{$item->name}}</td>
                     <td>{{$item->quantity}}</td>
                     <td>{{$item->price}}</td>
                     <td>{{$item->datetime}}</td>
                     <td>{{$item->total}}</td>
                   </tr>
                       
                   @endforeach
                 </tbody>

               </table>
  
            </div>
            <div class="col-lg-3 col-md-8 col-sm-12"></div>
        </div>



           
        
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

  $('#productForm').on('submit',function(e){
      e.preventDefault();

      let name = $('#ProductName').val();
      let quantity = $('#Quantity').val();
      let price = $('#Price').val();
      document.getElementById("productForm").reset();
      $.ajax({
        url: "/product",
        type:"POST",
        data:{
          "_token": "{{ csrf_token() }}",
          name:name,
          quantity:quantity,
          price:price,
        },
        success:function(response){
          console.log(response);
          document.getElementById('productTable').load();
        },
        
       });
      });
    </script>
    
@endsection