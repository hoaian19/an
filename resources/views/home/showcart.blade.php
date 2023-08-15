<!DOCTYPE html>
<html>
   <head>

      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="homepage/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="homepage/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="homepage/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="homepage/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="homepage/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
        .center{
            margin: auto;
            text-align: center;
            width: 50%;
            padding: 30px;  
        }
        table,th,td{
            border: 2px solid gray;

        }
        .th_deg{
            font-size: 20px;
            padding: 5px;
            background: skyblue;
            padding: 30px;
        }
        .img_deg{
            height: 200px;
            width: 200px;

        }
        .total_deg{
            font-size: 20px;
            padding: 40px;
        }
      </style>
   </head>
   <body>
    
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
    {{-- <div class="hero_area">   
    </div> --}}
      <div class="center">

        <table >
            <tr>
                <th class="th_deg">Product title</th>
                <th class="th_deg">Product quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalprice=0;?>
            @foreach($cart as $cart)
            <tr>
                <td>{{ $cart->product_title }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->price }}</td>
                <td><img class="img_deg" src="product/{{ $cart->image }}" alt=""></td>
                <td><a onclick="return confirm('Are you sure to remove this product?')" class="btn btn-danger" href="{{ url('/remove_cart',$cart->id) }}">Remove Product</a></td>
            </tr>
            <?php $totalprice=$totalprice+$cart->price ?>
            @endforeach
        </table>
        <div>
            <h1 class="total_deg">
                Total Price: {{ $totalprice }}
            </h1>
        </div>




      </div>
      <!-- why section -->
         {{-- @include('home.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="homepage/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="homepage/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="homepage/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="homepage/js/custom.js"></script>
   </body>
</html>