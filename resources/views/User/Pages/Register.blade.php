@extends('User/Component/Layout')
@section('content')
<style type="text/css">
   .calculation-gif{
   display: none;
   height: 65px;
   }
   .gif{
   margin-left: 150px;
   }
   input[type=text], input[type=password], input[type=email], input[type=number] {
   width: 100%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   box-sizing: border-box;
   }
   button {
   background-color: #129bf4;
   color: white;
   padding: 12px 16px;
   margin: 8px auto;
   border: none;
   cursor: pointer;
   width: 30%;
   display: block;
   font-size: 16px;
   }
   .label{
      font-size: 24px; color: #000; font-weight: 600;
   }
</style>
<main class="main checkout">
   <div class="page-content  pb-10">
      <div class="row">
         <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li><a href="#">login</a></li>
            
         </ul>
      </div>
      <div class="container mt-8">
         <div class="row">
            <h2 class="text-center">LOGIN</h2>
            <div class="text-center">
                 @if ($message = Session::get('error-message'))
                <strong>{{ $message }}</strong>
                @endif
             </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
               <form class="modal-content animate" method="post" action="{{ route('user-registration') }}">
                  @csrf
                  <div class="imgcontainer">
                  </div>
                  <div class="container">
                     <label for="uname" class="label">   Name
                     </label>
                     <input type="text" placeholder="Enter Username" name="name" required>
                     <input type="hidden" name="user_type" value="user" >
                     <label for="uname" class="label">   Mobile
                     </label>
                     <input type="number" placeholder="Enter Mobile" name="mobile" required>
                     <label for="uname" class="label">   Email
                     </label>
                     <input type="email" placeholder="Enter Email" name="email" required>
                     <br> 
                     <label for="psw" class="label">Password</label>
                     <input type="password" placeholder="Enter Password" name="password" required>
                     <br>
                     <button type="submit">Register</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection