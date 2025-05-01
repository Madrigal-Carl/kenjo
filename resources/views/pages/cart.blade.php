<x-app>
    <section id="whole-container"
        class="pt-20 md:pt-40 lg:pt-50 px-2 md:px-10 lg:px-40 flex flex-col gap-5 md:gap-10 md:pb-10 font-poppins">
        <div id="container" class="hidden">
            <h1 class="text-2xl md:text-4xl font-bold pl-5">Your Bag</h1>

            <div class="flex flex-col justify-between lg:grid lg:grid-cols-3 gap-2 lg:gap-5">

                <div id="cart-container"
                    class="lg:col-span-2 flex flex-col gap-2 lg:gap-5 overflow-y-auto overflow-x-hidden pr-2 lg:pr-5 h-115 md:h-130 lg:h-150">
                </div>

                <div class="w-full">
                    <div class="w-full bg-card rounded-4xl px-5 py-5 lg:px-10 lg:py-10 flex flex-col gap-4">
                        <div class="flex justify-between items-center w-full">
                            <h1 class="font-semibold text:lg md:text-xl">Subtotal</h1>
                            <p class="text:lg md:text-xl text-gray-500 subtotal-amount">Php 0.00</p>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <h1 class="font-semibold text:lg md:text-xl">Shipping</h1>
                            <p class="text:lg md:text-xl text-gray-500 shipping-amount">Php 0.00</p>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <h1 class="font-semibold text:lg md:text-xl">Tax</h1>
                            <p class="text:lg md:text-xl text-gray-500 tax-amount">Php 0.00</p>
                        </div>

                        <hr class="border-1 border-gray-300">

                        <div class="flex justify-between items-center w-full">
                            <h1 class="font-semibold text-xl md:text-3xl">Total</h1>
                            <p class="text-xl md:text-3xl font-semibold text-caramel total-amount">Php 0.00</p>
                        </div>

                        <button id="buy-now-btn"
                            class="flex items-center justify-center gap-4 bg-darkbrown cursor-pointer text-white px-3 md:px-4 py-3 md:py-4 w-full text-md md:text-lg font-semibold hover:bg-caramel rounded-xl shadow-lg/10">
                            <span id="loading" class="hidden animate-spin">
                                <img class="w-6" src="{{ asset('assets/images/loading.png') }}" alt="Loading">
                            </span>
                            <span id="buy-text">Buy Now</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <script src="{{ asset('js/cart.js') }}"></script> --}}
</x-app>

<script>
    function loadCartItems() {
        fetch('/cart/data')
            .then(res => res.json())
            .then(data => {
                const cartItems = data.products;
                const cartContainer = document.getElementById('cart-container');
                const container = document.getElementById('container');
                const wholeContainer = document.getElementById('whole-container');
                cartContainer.innerHTML = '';

                let subtotal = 0;

                if (cartItems.length == 0) {
                    wholeContainer.innerHTML = `
                    <div class="animate-bounce flex flex-col justify-center items-center gap-8 lg:py-18 py-62">
                        <img src="assets/images/emptybag.png" class="lg:w-50 w-36" alt="">
                        <p class="font-semibold lg:text-2xl text-lg">No product added to cart</p>
                    </div>
                `;
                    return
                }

                container.classList.remove('hidden');

                cartItems.forEach(product => {
                    const price = parseFloat(product.price);
                    const quantity = parseInt(product.quantity);
                    const totalItemPrice = price * quantity;

                    subtotal += totalItemPrice;

                    cartContainer.innerHTML += `
                    <div class="cart-item flex items-center bg-card rounded-4xl p-5 gap-5" data-id="${product.id}">
                        <img class="aspect-square w-20 md:w-40 rounded-3xl" src="${product.image}" alt="">
                        <div class="flex justify-between w-full h-full">
                            <div class="flex flex-col justify-between h-full w-35 md:w-60 lg:w-100">
                                <div class="flex flex-col gap-0 md:gap-1 lg:gap-2">
                                    <h1 class="text-lg md:text-3xl font-semibold">${product.name}</h1>
                                    <p class="text-gray-500 w-30 md:w-100 text-xs truncate md:text-balance">${product.details}</p>
                                </div>
                                <p class="text-md md:text-2xl font-semibold text-caramel self-start">Php ${price.toFixed(2)}</p>
                            </div>
                            <div class="h-full flex flex-col items-end justify-between">
                                <button class="remove-btn cursor-pointer scale-75 md:scale-100 hover:text-caramel" data-id="${product.id}">
                                    <span class="material-symbols-rounded">delete</span>
                                </button>
                                <div class="flex gap-2 items-center quantity">
                                    <button class="qty-btn cursor-pointer dec w-6 md:w-10 flex items-center justify-center md:scale-75 p-1 bg-gray-300 hover:text-white hover:bg-darkbrown aspect-square rounded-md" data-id="${product.id}" data-qty="${quantity}">
                                        <span class="material-symbols-rounded add-sub">remove</span>
                                    </button>
                                    <p class="md:text-xl text-sm w-8 md:w-15 text-center border-b-2 border-gray-300">${quantity}</p>
                                    <button class="qty-btn cursor-pointer inc w-6 md:w-10 flex items-center justify-center md:scale-75 p-1 bg-gray-300 hover:text-white hover:bg-darkbrown aspect-square rounded-md" data-id="${product.id}" data-qty="${quantity}">
                                        <span class="material-symbols-rounded add-sub">add</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                });

                const shipping = 20;
                const tax = 0.1 * subtotal;
                const total = subtotal + shipping + tax;

                document.querySelector('.subtotal-amount').textContent = `Php ${subtotal.toFixed(2)}`;
                document.querySelector('.shipping-amount').textContent = `Php ${shipping.toFixed(2)}`;
                document.querySelector('.tax-amount').textContent = `Php ${tax.toFixed(2)}`;
                document.querySelector('.total-amount').textContent = `Php ${total.toFixed(2)}`;

                attachCartEvents();
            });
    }

    function attachCartEvents() {
        document.querySelectorAll('.remove-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                fetch(`/cart/products/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(() => loadCartItems());
            });
        });

        document.querySelectorAll('.qty-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                let qty = parseInt(btn.dataset.qty);
                const isInc = btn.classList.contains('inc');
                const newQty = isInc ? qty + 1 : qty - 1;

                if (newQty < 1) return;

                fetch(`/cart/products/${id}`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        quantity: newQty
                    })
                }).then(() => loadCartItems());
            });
        });
    }

    const buyNowBtn = document.getElementById('buy-now-btn');
    const loading = document.getElementById('loading');
    const buyText = document.getElementById('buy-text');

    function resetButton() {
        buyNowBtn.disabled = false;
        buyNowBtn.classList.remove('cursor-wait');
        buyNowBtn.classList.add('cursor-pointer');
        loading.classList.add('hidden');
        buyText.textContent = 'Buy Now';
    }

    buyNowBtn.addEventListener('click', () => {
        buyNowBtn.disabled = true;
        buyNowBtn.classList.add('cursor-wait');
        buyNowBtn.classList.remove('cursor-pointer');
        loading.classList.remove('hidden');
        buyText.textContent = 'Processing...';

        fetch('/cart/data')
            .then(res => res.json())
            .then(data => {
                const cartItems = data.products;

                if (!cartItems.length) {
                    window.location.href = '/';
                    resetButton();
                    return;
                }

                fetch('/order', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            products: cartItems,
                            total: parseFloat(document.querySelector('.total-amount')
                                .textContent.replace('Php ', '').replace(',', ''))
                        })
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('Order failed');
                        return res.json();
                    })
                    .then(result => {
                        window.location.reload();
                        resetButton();
                    })
                    .catch(err => {
                        alert("There was a problem placing your order.");
                        console.error(err);
                        resetButton();
                    });
            });
    });

    loadCartItems();
</script>
