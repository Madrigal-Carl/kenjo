<x-app>
    <div class="font-poppins relative">
        <!-- Hero section -->
        <section class="w-full h-fit pt-22 md:pt-30 lg:pt-50 px-2 md:px-10 lg:px-40 pb-10  md:pb-20 lg:pb-40">
            <div class="w-full h-50 md:h-100 lg:h-160 rounded-4xl md:rounded-[3rem] bg-center bg-no-repeat bg-cover shadow-2xl/40 p-8 md:p-12 lg:p-15 flex items-center justify-between"
                style="background-image: url('{{ asset('assets/images/hero-bg.png') }}')">
                <div class="w-60% md:w-[60%] flex flex-col gap-1 md:gap:5 lg:gap-10">
                    <h2
                        class="w-fit text-1xl md:text-4xl lg:text-[min(10vw,3.5rem)] relative bg-danger py-0.5 px-2 lg:px-7 font-bold text-white">
                        new</h2>
                    <h1
                        class="uppercase font-anton text-white text-3xl md:text-6xl lg:text-[min(12vw,7rem)] text-shadow-lg/50 ">
                        Special Bread</h1>
                    <p class="text-white/60 text-[12px] lg:text-paragraph  ">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Distinctio, accusamus!</p>
                    <button
                        class="w-fit text-white text-[12px] md:text-2xl border-1 md:border-2 px-2 py-1 md:px-5 md:py-2 rounded-full mt-1 md:mt-0 cursor-pointer hover:bg-caramel  hover:border-caramel hover:scale-110 hover:shadow-2xl/40">
                        Order Now!
                    </button>
                </div>
                <img class=" w-[32vw] md:w-[38vw] animate-slow-spin" src="{{ asset('assets/images/hero-dish.png') }}"
                    alt="">
            </div>
        </section>

        <!-- Categories -->
        <section id="categories" class="px-2 md:px-10 lg:px-40 pb-10 md:pb-20 lg:pb-40 flex flex-col">
            <div class="w-full flex items-center justify-between px-8">
                <h2 class="font-bold text-2xl md:text-3xl text-darkbrown">Categories</h2>
                <p class="text-lg md:text-xl font-semibold">Show all</p>
            </div>

            <div
                class="w-full flex items-center gap-2 md:gap-4 overflow-x-auto whitespace-nowrap custom-scrollbar py-10">
                <!-- Cards -->
                <div data-category="cakes"
                    class=" category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem] ">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/cake.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Cakes</p>
                </div>

                <div data-category="cupcakes"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/cupcake.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Cupakes</p>
                </div>

                <div data-category="donuts"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/donuts.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Donuts</p>
                </div>

                <div data-category="breads"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/bread.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Breads</p>
                </div>

                <div data-category="desserts"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/desserts.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Desserts</p>
                </div>

                <div data-category="burgers"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/burger.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Burgers</p>
                </div>

                <div data-category="pizzas"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/pizza.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Pizzas</p>
                </div>

                <div data-category="coffee"
                    class="category-card cursor-pointer w-40 md:w-60 shrink-0 snap-start flex flex-col items-center gap-5 md:gap-8 bg-card p-8 md:p-15 rounded-[2rem] hover:bg-darkbrown hover:text-white hover:translate-y-[-1rem]">
                    <img class="h-18 md:h-30 w-auto aspect-square object-contain"
                        src="{{ asset('assets/images/coffee.png') }}" alt="">
                    <p class="text-lg md:text-xl font-semibold">Coffee</p>
                </div>
            </div>
        </section>

        <!-- Products -->
        <section class="px-2 md:px-10 lg:px-40 pb-10 md:pb-20 flex flex-col">
            <div class="w-full flex items-center justify-between px-8">
                <h2 class="font-bold text-2xl md:text-3xl text-darkbrown">Products</h2>
                <p id="show-all" class="cursor-pointer text-xl font-semibold">Show all</p>
            </div>

            <div class="pt-10 overflow-y-auto max-h-370 px-5">
                <!-- Product con -->
                <div id="product-container" class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-2 md:gap-4">

                </div>
            </div>
        </section>
    </div>

    {{-- <script src="{{ asset('js/home.js') }}"></script> --}}
</x-app>

<script>
    function fetchProducts(category = null) {
        let url = '/products';
        if (category) {
            url += '?category=' + encodeURIComponent(category);
        }

        fetch(url)
            .then(response => response.json())
            .then(renderProducts)
            .catch(error => console.error('Error fetching products:', error));
    }

    function renderProducts(products) {
        const container = document.getElementById('product-container');
        container.innerHTML = "";

        products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className =
                "bg-card rounded-[1.5rem] md:rounded-4xl overflow-hidden gap-2 hover:translate-y-[-1rem]";
            productCard.innerHTML = `
            <img class="w-auto aspect-square object-cover" src="${product.image}" alt="">
            <div class="p-2 md:p-5 flex flex-col gap-2">
                <div class="flex flex-col lg:flex-row justify-between gap-2">
                    <div class="w-full md:max-w-[80%] flex flex-col gap-0 md:gap-2 lg:mb-6">
                        <h1 class="text-base lg:text-xl font-bold line-clamp-1">${product.name}</h1>
                        <p class="text-gray-500 text-xs md:text-sm line-clamp-2">${product.details}</p>
                    </div>
                    <p class="text-xl font-semibold text-caramel">₱${product.price}.00</p>
                </div>
                <button class="add-to-cart bg-darkbrown cursor-pointer text-white p-2 md:p-3 w-full rounded-[18px] hover:bg-caramel text-sm md:text-base">
                    Add to Cart
                </button>
            </div>
        `;

            productCard.querySelector('.add-to-cart').addEventListener('click', function() {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        credentials: 'include',
                        body: JSON.stringify({
                            product: {
                                id: product.id,
                                name: product.name,
                                details: product.details,
                                category: product.category,
                                price: product.price,
                                image: product.image,
                                quantity: 1
                            }
                        })
                    })
                    .then(res => {
                        if (!res.ok) throw new Error('Failed to add to cart');
                        return res.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert(data.message || "Something went wrong");
                        }
                    })
                    .catch(err => {
                        console.error("Add to cart failed", err);
                        alert("Error adding to cart");
                    });
            });

            container.appendChild(productCard);
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        fetchProducts();

        document.querySelectorAll('.category-card').forEach(card => {
            card.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                fetchProducts(category);
            });
        });

        const showAllBtn = document.getElementById('show-all');
        if (showAllBtn) {
            showAllBtn.addEventListener('click', () => {
                fetchProducts();
            });
        }
    });
</script>
