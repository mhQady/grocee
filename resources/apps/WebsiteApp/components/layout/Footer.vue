<script setup>
import { computed } from 'vue'

const fullYear = computed(() => new Date().getFullYear())
</script>
<template>
    <footer>
        <div class="footer-services container">
            <div class="footer-services__service">
                <div class="footer-services__service-img">
                    <img src="@img/website/placeholders/service.png" alt="">
                </div>
                <div class="footer-services__service-bod">
                    <h4>shipping</h4>
                    <p>From handpicked sellers</p>
                </div>
            </div>
            <div class="footer-services__service">
                <div class="footer-services__service-img">
                    <img src="@img/website/placeholders/service.png" alt="">
                </div>
                <div class="footer-services__service-bod">
                    <h4>payment</h4>
                    <p>Visa, Paypal, Master</p>
                </div>
            </div>
            <div class="footer-services__service">
                <div class="footer-services__service-img">
                    <img src="@img/website/placeholders/service.png" alt="">
                </div>
                <div class="footer-services__service-bod">
                    <h4>return</h4>
                    <p>30 day guarantee</p>
                </div>
            </div>
            <div class="footer-services__service">
                <div class="footer-services__service-img">
                    <img src="@img/website/placeholders/service.png" alt="">
                </div>
                <div class="footer-services__service-bod">
                    <h4>support</h4>
                    <p>Support every time</p>
                </div>
            </div>
        </div>
        <div class="footer-body container">
            <div>
                <div class="footer-logo">
                    <a href="#">
                        <img src="@img/website/logo.png" alt="logo">
                    </a>
                </div>
                <p>
                    The variety of products available at our store at the moment is vast, but we still continue to widen our
                    assortment.
                </p>
                <ul class="social-icons">
                    <li>
                        <a href="#">
                            <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0 0 14.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.202h3.312z">
                                </path>
                            </svg></a>
                    </li>
                    <li>
                        <a href="#">
                            <svg class="social-icon" version="1.1" id="svg5" xmlns:svg="http://www.w3.org/2000/svg"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                y="0px" viewBox="0 0 1668.56 1221.19" xml:space="preserve">
                                <g id="layer1" transform="translate(52.390088,-25.058597)">
                                    <path id="path1009"
                                        d="M283.94,167.31l386.39,516.64L281.5,1104h87.51l340.42-367.76L984.48,1104h297.8L874.15,558.3l361.92-390.99
                                		h-87.51l-313.51,338.7l-253.31-338.7H283.94z M412.63,231.77h136.81l604.13,807.76h-136.81L412.63,231.77z" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li><a href="#">
                            <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z">
                                </path>
                                <circle cx="16.806" cy="7.207" r="1.078"></circle>
                                <path
                                    d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z">
                                </path>
                            </svg></a></li>
                </ul>
            </div>
            <div>
                <h4>information</h4>
                <ul class="footer-links">
                    <li><a href="#">about us</a></li>
                    <li><a href="#">contact us</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">portfolio</a></li>
                    <li><a href="#">privacy policy</a></li>
                    <li><a href="#">frequently</a></li>
                </ul>
            </div>
            <div>
                <h4>Categories</h4>
                <ul class="footer-links">
                    <li><a href="#">all products</a></li>
                    <li><a href="#">grocery & frozen</a></li>
                    <li><a href="#">fresh fruits</a></li>
                    <li><a href="#">package foods</a></li>
                    <li><a href="#">organic foods</a></li>
                    <li><a href="#">health & wellness</a></li>
                </ul>
            </div>
            <div>
                <h4>newsletter</h4>
                <p>Get updates by subscribe our weekly newsletter</p>
                <form>
                    <div class="input-group__subscribe">
                        <input type="email" placeholder="Enter your email">
                        <button class="btn btn-secondary" type="submit">subscribe</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="rights container">
            <p>Copyright © {{ fullYear }} Grocee. All Rights Reserved.Design By Grocee
            </p>
        </div>
    </footer>
</template>
<style scoped>
footer {
    background-color: var(--clr-gray100);
    margin-top: 4rem;
}

.footer-services {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--size-3xl);
    background-color: var(--clr-light);
    box-shadow: 0 -4px 27px rgba(62, 70, 120, 0.16);
    border-radius: 10px;
    padding: var(--size-4xl) var(--size-8xl) !important;
    transform: translateY(-50%);
    margin-top: 10rem;
}

.footer-services__service {
    display: flex;
    gap: var(--size-xs);
    align-items: center;
    flex: 1;
    min-width: 100%;
    max-width: 100%;
}

.footer-body {
    display: flex;
    justify-content: space-between;
    gap: var(--size-4xl);
    border-bottom: 2px solid var(--clr-light);
    padding-bottom: var(--size-5xl);
    margin-top: -120px;
}

.footer-body> :first-child,
.footer-body> :last-child {
    flex: 2;
    display: flex;
    flex-direction: column;
    gap: var(--size-2xl);
}

.footer-body> :not(:first-child):not(:last-child) {
    flex: 1;
}

.footer-logo {
    max-width: -moz-fit-content;
    max-width: fit-content;
}

.footer-logo>img {
    width: 100%;
    object-fit: cover;
}

.footer-body h4 {
    margin-bottom: var(--size-2xl);
    text-transform: capitalize;
}

.footer-links {
    display: flex;
    flex-direction: column;
    gap: var(--size-xxs);
}

.input-group__subscribe {
    width: 100%;
    display: flex;
}

.input-group__subscribe input {
    border-top-left-radius: 25px;
    border-bottom-left-radius: 25px;
    padding: 0 5px 0 18px;
    background-color: var(--clr-light);
    border: 1px solid var(--clr-light);
    outline: 0px;
    min-width: 55%;
}

.input-group__subscribe input:focus {
    border-color: var(--clr-green);
}

.rights {
    width: 100%;
    text-align: center;
    padding: var(--size-xl) 0;
}

@media (min-width: 640px) {

    .footer-services__service {
        flex: 1 0 calc(48% - 10px);
        min-width: calc(48% - 10px);
        max-width: calc(48% - 10px);
    }

    .footer-services {
        margin-top: 0px;
    }
}

@media (min-width: 768px) {
    .footer-body {
        margin-top: -52px;
    }

    .footer-services {
        gap: var(--size-xxs);
    }

    .footer-services__service {
        flex: 1 0 calc(24% - 10px);
        min-width: calc(24% - 10px);
        min-width: calc(24% - 10px);
    }
}

@media (min-width: 1024px) {
    .footer-body {
        margin-top: -15px;
    }

    .footer-services {
        border-radius: 65px;
    }
}
</style>
