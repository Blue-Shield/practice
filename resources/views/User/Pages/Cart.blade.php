@extends('User/Component/Layout')
@section('content')
@php
$Cart = Session::get('Cart');
$CartTotal = 0;
if(!$Cart)
{
   $Cart = [];
}
@endphp
<style type="text/css">
  .calculation-gif{
    display: none;
    height: 65px;
  }
  .cart-single-product{
      cursor:pointer;
  }
  .cart .shop-table td{
    padding: 1rem 2rem 2rem 0 !important;
  }
</style>
<main class="main cart">
      <div class="page-content pb-10">
        <!-- <div class=" pt-2 pb-2 pr-4 pl-4">
          <h3 class="title title-simple">Shopping Cart</h3>
          
        </div> -->
        <div class="row">
          <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li><a href="#">Cart</a></li>
          </ul>
        </div>
        <div class="container mt-8 mb-4">
          <div class="row gutter-lg">
            <div class="col-lg-8 col-md-12">
            <div class="spinner">
              <div class="cart-table">
                <table class="shop-table cart-table mt-2">
                <thead>
                  <tr>
                    <th><span>Product</span></th>
                    <th></th>
                    <th><span>Price</span></th>
                    <th><span>quantity</span></th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Cart as $Carts)
                  @php 
                  if($Carts['product_attribute_image'] == "")
                  {
                    $image = url('/')."/public/Admin/ProductImage/".$Carts['product_image'];
                  }
                  else
                  {
                    $image = $Carts['product_attribute_image'];
                  }
                  @endphp
                  <tr>
                    <td class="product-thumbnail">
                      <figure>
                        <a href="" class="cart-single-product">
                          <img src="{{ $image }}" width="80" height="80"
                          alt="product">
                        </a>
                        <a href="javascript:void(0)" class="product-remove" title="Remove this product" onclick="removeItemFromCartPage('{{ $Carts['product_id'] }}')">
                          <i class="fas fa-times"></i>
                        </a>
                      </figure>
                    </td>
                    <td class="product-name">
                      <div class="product-name-section">
                        <a href="#">{{ $Carts['product_name'] }}</a>
                      </div>
                    </td>
                    <td class="product-subtotal">
                      <span class="amount">£{{ $Carts['product_price'] }}</span>
                    </td>
                    <td class="product">
                      <div class="calculation calculation{{ $Carts['product_id'] }}">
                        <div class="input-group">
                          <button class="quantity-minus d-icon-minus" onclick="decreaseCart('{{ $Carts['product_id'] }}', '{{ $Carts['product_qty'] }}')"></button>
                          <input class=" form-control" value="{{ $Carts['product_qty'] }}">
                          <button class="quantity-plus d-icon-plus" onclick="increaseCart('{{ $Carts['product_id'] }}')"></button>
                        </div>
                      </div>
                      <div class="calculation-gif calculation-gif{{ $Carts['product_id'] }} ">
                        <img src="{{ url('/') }}/public/User/images/spinner.gif" />
                      </div>
                    </td>
                    <td class="product-price">
                      <span class="amount">£{{ $Carts['total_price'] }}</span>
                    </td>
                  </tr>
                  @php
                  $CartTotal = $CartTotal+$Carts['total_price'];
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div> 
          </div>
              <div class="cart-actions mb-6 pt-6">
                <div class="coupon">
                  <input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="Coupon code">
                  <button type="submit" class="btn btn-md">Apply Coupon</button>
                </div>
                <button type="submit" class="btn btn-md btn-icon-left"><i
                    class="d-icon-refresh"></i>Update Cart</button>
              </div>
            </div>
            <aside class="col-lg-4 sticky-sidebar-wrapper">
              <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                <div class="summary mb-4">
                  <h3 class="summary-title text-left">Cart Totals</h3>
                  <table class="shipping">
                    <tr class="summary-subtotal">
                      <td>
                        <h4 class="summary-subtitle">Subtotal</h4>
                      </td>
                      <td>
                        <span class="cart-total">
                          <p class="summary-subtotal-price">£{{ $CartTotal }}</p>
                        </span>
                      </td>                       
                    </tr>
                    <tr class="sumnary-shipping shipping-row-last">
                      <td colspan="2">
                        <h4 class="summary-subtitle">Shipping</h4>
                        <ul>
                          <!-- <li>
                            <div class="custom-radio">
                             
                              <label class="custom-control-label text-center" for="free-shipping">Option 3:</label>
                            </div>
                          </li>
                         <li>
                            <div class="custom-radio">
                             
                              <label class="custom-control-label" for="free-shipping" style="text-align: center; color: #e4ae09; font-weight: 600;">£300.00</label>
                            </div>
                          </li> -->
                          <li>
                            <div class="custom-radio">
                             
                              <label class="custom-control-label" for="free-shipping" style="text-align: center;">Shipping options will be updated during checkout</label>
                            </div>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  </table>
                  <!-- <div class="shipping-address pb-4">
                    <label>Shipping to CA.</label>
                    <div class="select-box">
                      <select name="country" class="form-control">
                        <option value="us" selected>United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="fr">France</option>
                        <option value="aus">Austria</option>
                      </select>
                    </div>
                    <div class="select-box">
                      <select name="country" class="form-control">
                        <option value="default" selected="selected">California</option>
                      </select>
                    </div>
                    <input type="text" class="form-control" name="code" placeholder="Town / city" />
                    <input type="text" class="form-control" name="code" placeholder="zip" />
                    <a href="#" class="btn btn-md">Update totals</a>
                  </div> -->
                  <table>
                    <tr class="summary-subtotal">
                      <td>
                        <h4 class="summary-subtitle">Total</h4>
                      </td>
                      <td>
                        <div class="sub-total">
                          <p class="summary-total-price">£{{ $CartTotal }}</p>
                        </div>
                      </td>                       
                    </tr>
                  </table>
                  <a href="{{ route('checkout') }}" class="btn btn-dark btn-checkout">Proceed to checkout</a>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </main>
    @endsection