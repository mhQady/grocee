<script setup>
import SocialHeader from '@web/components/layout/SocialHeader.vue';
import Header from '@web/components/layout/Header.vue';
import Footer from '@web/components/layout/Footer.vue';
</script>
<template>
    <SocialHeader />
    <Header />
    <main>

        <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>

    </main>
    <Footer />
    <div id="scroll-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            style="rotate: -90deg;" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14M12 5l7 7-7 7" />
        </svg>
    </div>

    <div class="search-modal" data-modal="search-modal">
        <form action="#">
            <div class="search-modal__body container">
                <h3>Search products</h3>
                <div class="input-group__search container">
                    <input type="text" placeholder="type to search">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <path
                                d="M 21 3 C 11.654545 3 4 10.654545 4 20 C 4 29.345455 11.654545 37 21 37 C 24.701287 37 28.127393 35.786719 30.927734 33.755859 L 44.085938 46.914062 L 46.914062 44.085938 L 33.875 31.046875 C 36.43682 28.068316 38 24.210207 38 20 C 38 10.654545 30.345455 3 21 3 z M 21 5 C 29.254545 5 36 11.745455 36 20 C 36 28.254545 29.254545 35 21 35 C 12.745455 35 6 28.254545 6 20 C 6 11.745455 12.745455 5 21 5 z">
                            </path>
                        </svg></button>
                </div>
            </div>
        </form>
        <svg class="modal__dismiss_btn" data-modal-btn-dismiss="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </div>

    <div class="cart-modal" data-modal="cart-modal">
        <div class="cart-modal__header">
            <h3>Shopping Cart</h3>
            <p>The organic foods products are limited</p>
        </div>
        <div class="cart-modal__body">
            <div class="cart-modal__product-card">
                <div class="cart-modal__product-img">
                    <img src="@img/placeholders/product.png" alt="product">
                </div>
                <div class="cart-modal__product-content">
                    <a href="#">
                        <h4>The is Garden Vegetable.</h4>
                    </a>
                    <span>color: green</span>
                    <div class="product-card__prices">
                        <span class="current-price">$29.00</span>
                        <span class="old-price">$39.00</span>
                    </div>
                    <div class="cart-modal__product-footer">
                        <div class="product-card__quantity-wrapper">
                            <button>-</button>
                            <input type="number" min="1" value="1">
                            <button>+</button>
                        </div>
                        <button class="btn-remove">remove</button>
                    </div>
                </div>
            </div>
            <div class="cart-modal__product-card">
                <div class="cart-modal__product-img">
                    <img src="@img/placeholders/product.png" alt="product">
                </div>
                <div class="cart-modal__product-content">
                    <a href="#">
                        <h4>The is Garden Vegetable.</h4>
                    </a>
                    <span>color: green</span>
                    <div class="product-card__prices">
                        <span class="current-price">$29.00</span>
                        <span class="old-price">$39.00</span>
                    </div>
                    <div class="cart-modal__product-footer">
                        <div class="product-card__quantity-wrapper">
                            <button>-</button>
                            <input type="number" min="1" value="1">
                            <button>+</button>
                        </div>
                        <button class="btn-remove">remove</button>
                    </div>
                </div>
            </div>
            <div class="cart-modal__product-card">
                <div class="cart-modal__product-img">
                    <img src="@img/placeholders/product.png" alt="product">
                </div>
                <div class="cart-modal__product-content">
                    <a href="#">
                        <h4>The is Garden Vegetable.</h4>
                    </a>
                    <span>color: green</span>
                    <div class="product-card__prices">
                        <span class="current-price">$29.00</span>
                        <span class="old-price">$39.00</span>
                    </div>
                    <div class="cart-modal__product-footer">
                        <div class="product-card__quantity-wrapper">
                            <button>-</button>
                            <input type="number" min="1" value="1">
                            <button>+</button>
                        </div>
                        <button class="btn-remove">remove</button>
                    </div>
                </div>
            </div>
            <div class="cart-modal__product-card">
                <div class="cart-modal__product-img">
                    <img src="@img/placeholders/product.png" alt="product">
                </div>
                <div class="cart-modal__product-content">
                    <a href="#">
                        <h4>The is Garden Vegetable.</h4>
                    </a>
                    <span>color: green</span>
                    <div class="product-card__prices">
                        <span class="current-price">$29.00</span>
                        <span class="old-price">$39.00</span>
                    </div>
                    <div class="cart-modal__product-footer">
                        <div class="product-card__quantity-wrapper">
                            <button>-</button>
                            <input type="number" min="1" value="1">
                            <button>+</button>
                        </div>
                        <button class="btn-remove">remove</button>
                    </div>
                </div>
            </div>
            <div class="card-model__calcs">
                <div>
                    <span>subtotal:</span>
                    <span>15</span>
                </div>
                <div>
                    <span>total:</span>
                    <span>20</span>
                </div>
            </div>
        </div>
        <div class="cart-modal__footer">
            <button class="btn btn-primary">view cart</button>
            <button class="btn btn-primary">checkout</button>
        </div>
        <svg class="modal__dismiss_btn" data-modal-btn-dismiss="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </div>
</template>
