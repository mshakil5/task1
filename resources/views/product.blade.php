<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">

        <h1>All Product Order Report</h1>
    </div>
    <div class="container">
        <a href="{{route('product.store')}}" class="btn btn-secondary">Upload Data</a>
        <a href="{{route('home')}}" class="btn btn-secondary">back</a>
    </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3> Report </h3>
                    </div>
                    <div class="card-body">
                            <div class="container">


                                <table class="table table-bordered table-hover" id="example">
                                    <thead>
                                    <tr>
                                      <th>Sl</th>
                                      <th>Name</th>
                                      <th>Order No</th>
                                      <th>Phone</th>
                                      <th>Product Code</th>
                                      <th>Product Name</th>
                                      <th>Product Quantity</th>
                                      <th>Product Price</th>
                                      <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                          $totalQty = 0;
                                          $totalGrossAmount = 0;
                                          $totalAmount = 0;
                                        @endphp
                                          @foreach (\App\Models\Product::orderby('product_price','DESC')->get() as $key => $data)
                                          <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->order_no}}</td>
                                            <td>{{$data->user_phone}}</td>
                                            <td>{{$data->product_code}}</td>
                                            <td>{{$data->product_name}}</td>
                                            <td>{{$data->purchase_quantity}}</td>
                                            <?php $totalQty = $totalQty + $data->purchase_quantity;?>

                                            <td>{{$data->product_price}}</td>
                                            <?php $totalGrossAmount = $totalGrossAmount + $data->product_price;?>

                                            <td>{{$data->purchase_quantity * $data->product_price}}</td>
                                            <?php $totalAmount = $totalAmount + $data->purchase_quantity * $data->product_price;?>

                                          </tr>
                                          @endforeach

                                          <tr>
                                            <td colspan="6" style="text-align: right">Gross Total</td>
                                            <td>{{$totalQty}}</td>
                                            <td>{{$totalGrossAmount}}</td>
                                            <td>{{$totalAmount}}</td>
                                          </tr>
                                            
                                      </tbody> 
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>