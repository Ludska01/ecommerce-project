<div class="cart clearfix animate-effect">
    <div class="action">
      <ul class="list-unstyled">
        <li class="add-cart-button btn-group">
          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>

          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
        </li>
        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
       
      </ul>
    </div>
    <!-- /.action --> 
  </div>
  <!-- /.cart --> 