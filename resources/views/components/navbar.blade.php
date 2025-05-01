<!-- Mobile Gradient -->
<div
    class="w-full h-22 md:hidden fixed top-0 left-0 z-8 bg-gradient-to-b from-[#fffffff8] via-[#ffffffd3] to-[#ffffff00]">
</div>

<!-- Nav -->
<nav class="w-full fixed z-9 top-0 left-0 px-2 md:px-10 lg:px-40 pt-0 md:pt-10 flex items-center bg-white pb-0 md:pb-5 font-poppins">
    <div
        class="w-full flex items-center justify-between bg-card px-4 md:px-5 py-2 lg:px-5 lg:py-2 rounded-2xl md:rounded-full">
        <img class="w-12 lg:w-20" src="{{ asset('assets/images/logo.png') }}" alt="">
        <!-- navlinks -->
        <ul class="flex items-center gap-4">
            <li>
                <a href="/"
                    class="hidden md:flex hover:bg-darkbrown hover:text-white px-4 py-2 rounded-full cursor-pointer">Home</a>
            </li>
            <li>
                <a href="/#categories"
                    class="hidden md:flex hover:bg-darkbrown hover:text-white px-4 py-2 rounded-full cursor-pointer">Categories</a>
            </li>
            <li>
                <a href="/cart"
                    class=" scale-120 hover:scale-[1.6] lg:px-4 lg:py-2 rounded-full cursor-pointer flex items-center">
                    <span class="material-symbols-rounded">shopping_bag</span>
                </a>
            </li>
            @auth
                <div x-data="{ open: false }" class="relative hidden md:flex items-center justify-center">
                    <img @click="open = !open"
                        class="cursor-pointer w-10 ml-4 hover:scale-120 rounded-full hover:shadow-lg/10"
                        src="{{ asset('assets/images/profile.png') }}" alt="">

                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute top-full mt-4 left-1/2 -translate-x-1/2 w-56 bg-white rounded-xl shadow-xl py-3 z-50">
                        <a href="#"
                            class="block px-5 py-3 text-sm hover:bg-gray-100 border-t border-gray-200 first:border-t-0">My
                            Profile</a>
                        <a href="#"
                            class="block px-5 py-3 text-sm hover:bg-gray-100 border-t border-gray-200">Settings</a>
                        <form action="/signout" method="POST" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full cursor-pointer text-left px-5 py-3 text-sm hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/signin"
                    class="hidden lg:block hover:bg-caramel hover:scale-110 text-xs md:text-base bg-darkbrown text-white px-4 py-2 rounded-full cursor-pointer hover:shadow-lg/10 ">Sign
                    in</a>
            @endauth

            <li x-data="{ open: false }"
                class="relative md:hidden scale-120 flex items-center hover:scale-[1.6] lg:px-4 lg:py-2 rounded-full cursor-pointer">
                <span @click="open = !open" class="material-symbols-rounded">menu</span>

                <!-- Dropdown content aligned to the right -->
                <div x-show="open" @click.outside="open = false" x-transition
                    class="absolute top-full mt-4 right-0 w-56 bg-white rounded-xl shadow-xl py-3 z-50">
                    <a href="/" class="block px-5 py-3 text-sm hover:bg-gray-100">Home</a>
                    <a href="#categories" class="block px-5 py-3 text-sm hover:bg-gray-100">Categories</a>
                    <div class="border-t border-gray-200"></div>
                    @auth
                        <a href="#" class="block px-5 py-3 text-sm hover:bg-gray-100">My Profile</a>
                        <a href="#" class="block px-5 py-3 text-sm hover:bg-gray-100">Settings</a>
                        <form action="/signout" method="POST" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full cursor-pointer text-left px-5 py-3 text-sm hover:bg-gray-100">Logout</button>
                        </form>
                    @else
                        <a href="/signin" class="block px-5 py-3 text-sm hover:bg-gray-100">Sign in</a>
                    @endauth
                </div>
            </li>

        </ul>
    </div>
</nav>
