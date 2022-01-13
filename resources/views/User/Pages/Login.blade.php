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
   input[type=text], input[type=password] {
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
   .register{
    text-align: center;
    color: #00a8cf;
    font-size: 15px;
    font-weight: bold;
   }
   .message{
       text-align:center;
       color:red;
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
              @if ($message = Session::get('error-message'))
                    <div class="message">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            <h2 class="text-center">LOGIN</h2>
            <div class="col-md-3"></div>
            <div class="col-md-6">
               <form class="modal-content animate" action="{{ route('user-signin') }}" method="post">
                @csrf
                  <div class="imgcontainer">
                  </div>
                  <div class="container">
                     <label for="uname" style="font-size: 24px; color: #000; font-weight: 600;">Username</label>
                     <input type="text" placeholder="Enter Username" name="email" required>
                     <input type="hidden"  name="user_type" value="user" required>
                     <br> 
                     <label for="psw" style="font-size: 24px; color: #000; font-weight: 600;">Password</label>
                     <input type="password" placeholder="Enter Password" name="password" required>
                     <br>
                     <button type="submit">Login</button>
                     <div class="register">
                       <a href="{{ route('user-register') }}">Register</a>
                     </div>
                  </div>
               </form>
               <!-- <div class="gif" style="display: none">
                  <img src="{{ url('/') }}/User/images/spinner.gif">
               </div> -->
            </div>
         </div>
      </div>
   </div>
</main>
@endsection