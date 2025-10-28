  <!-- cart mini area start -->
  <div class="cartmini__area">
      <div class="cartmini__wrapper d-flex justify-content-between flex-column">
          <div class="cartmini__top-wrapper ">
              <div class="cartmini__top p-relative">
                  <div class="cartmini__title">
                      <h4>Shopping cart</h4>
                  </div>
                  <div class="cartmini__close">
                      <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                              class="fal fa-times"></i></button>
                  </div>
              </div>
              <div class="cartmini__widget">
                  <div class="cartmini__widget-item">
                      <div class="cartmini__thumb">
                          <a href="shop-details.html">
                              <img src="<?php echo get_template_directory_uri();?>/assets/img/product/product-4.jpg"
                                  alt="">
                          </a>
                      </div>
                      <div class="cartmini__content">
                          <h5><a href="shop-details.html">Level Bolt Smart Lock</a></h5>
                          <div class="cartmini__price-wrapper">
                              <span class="cartmini__price">$46.00</span>
                              <span class="cartmini__quantity">x2</span>
                          </div>
                      </div>
                      <button class="cartmini__del"><i class="fal fa-times"></i></button>
                  </div>
                  <div class="cartmini__widget-item">
                      <div class="cartmini__thumb">
                          <a href="shop-details.html">
                              <img src="<?php echo get_template_directory_uri();?>/assets/img/product/product-2.jpg"
                                  alt="">
                          </a>
                      </div>
                      <div class="cartmini__content">
                          <h5><a href="shop-details.html">Trademil for younger</a></h5>
                          <div class="cartmini__price-wrapper">
                              <span class="cartmini__price">$78.00</span>
                              <span class="cartmini__quantity">x1</span>
                          </div>
                      </div>
                      <button class="cartmini__del"><i class="fal fa-times"></i></button>
                  </div>
                  <div class="cartmini__widget-item">
                      <div class="cartmini__thumb">
                          <a href="shop-details.html">
                              <img src="<?php echo get_template_directory_uri();?>/assets/img/product/product-3.jpg"
                                  alt="">
                          </a>
                      </div>
                      <div class="cartmini__content">
                          <h5><a href="shop-details.html">ViewSonic VP2756-2K</a></h5>
                          <div class="cartmini__price-wrapper">
                              <span class="cartmini__price">$98.00</span>
                              <span class="cartmini__quantity">x3</span>
                          </div>
                      </div>
                      <button class="cartmini__del"><i class="fal fa-times"></i></button>
                  </div>
              </div>
              <!-- for wp -->
              <!-- if no item in cart -->
              <div class="cartmini__empty text-center d-none">
                  <img src="<?php echo get_template_directory_uri();?>/assets/img/product/cart/empty-cart.png" alt="">
                  <p>Your Cart is empty</p>
                  <a href="shop.html" class="tp-btn">Go to Shop</a>
              </div>
          </div>
          <div class="cartmini__checkout">
              <div class="cartmini__checkout-title mb-30">
                  <h4>Subtotal:</h4>
                  <span>$113.00</span>
              </div>
              <div class="cartmini__checkout-btn">
                  <a href="cart.html" class="tp-btn justify-content-center mb-10 w-100"> view cart</a>
                  <a href="checkout.html" class="tp-btn justify-content-center tp-btn-border w-100">checkout</a>
              </div>
          </div>
      </div>
  </div>
  <!-- cart mini area end -->