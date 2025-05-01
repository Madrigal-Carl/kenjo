<x-default>

    <div class="w-dvw h-dvh font-poppins relative flex items-center justify-center p-2 md:pt-10 bg-no-repeat bg-center bg-cover"
        style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/login-bg.png') }}')">
        <div class="relative w-full md:w-fit p-[1rem] md:p-[4rem] md:shadow-2xl/10 md:rounded-[6.5rem] md:flex bg-white">
            <!-- Close btn -->
            <!-- Change mo sa button haha for the mean time naka anchor tag muna -->
            <a href="/" class="hidden md:flex absolute right-0 top-0 scale-80 hover:scale-100"><span
                    class="material-symbols-rounded text-darkbrown p-0.5 bg-white/70 rounded-full hover:bg-caramel hover:text-white">close</span></a>

            <img class="hidden md:flex w-100 h-auto rounded-[2.5rem] aspect-[3/4.5] object-cover"
                src="{{ asset('assets/images/signup-pic.png') }}" alt="">
            <div class="flex flex-col items-center justify-center rounded-[2.5rem] md:pl-[4rem] gap-7">


                <a href="/"><img class="w-20" src="{{ asset('assets/images/logo.png') }}" alt=""></a>

                <div class="text-center flex flex-col">
                    <h1 class="text-4xl font-bold text-caramel">Join Now</h1>
                    <small class="text-gray-500">Sign-up your account.</small>
                </div>

                <form action="/signup" method="post" class="w-full flex flex-col gap-8">
                    @csrf
                    <div class="flex flex-col gap-3 w-full">
                        <input
                            class="text-sm w-full bg-card px-4 py-2 rounded-xl placeholder:text-sm border-2 border-card hover:border-caramel  focus:border-caramel active:border-caramel focus:outline-none"
                            type="text" name="fullname" maxlength="35" value="{{ old('fullname') }}"
                            placeholder="Fullname">
                        <input
                            class="text-sm w-full bg-card px-4 py-2 rounded-xl placeholder:text-sm border-2 border-card hover:border-caramel  focus:border-caramel active:border-caramel focus:outline-none"
                            type="text" name="phone_number" minlength="11" maxlength="11"
                            value="{{ old('phone_number') }}" placeholder="Phone number">
                        <input
                            class="text-sm bg-card px-4 py-2 rounded-xl placeholder:text-sm border-2 border-card hover:border-caramel  focus:border-caramel active:border-caramel focus:outline-none"
                            type="password" name="password" minlength="8" placeholder="Password">
                        <input
                            class="text-sm bg-card px-4 py-2 rounded-xl placeholder:text-sm border-2 border-card hover:border-caramel  focus:border-caramel active:border-caramel focus:outline-none"
                            type="password" name="password_confirmation" placeholder="Repeat password">
                    </div>

                    <button
                        class="bg-darkbrown cursor-pointer text-white px-4 py-2 w-full text-sm font-semibold hover:bg-caramel rounded-xl hover:scale-108 hover:shadow-lg/10 ">Sign
                        up</button>
                </form>


                <div class="flex items-center gap-2">
                    <hr class="w-15 border-t-1 border-gray-400">
                    <p class="text-gray-400 text-xs">or sign-up using</p>
                    <hr class="w-15 border-t-1 border-gray-400">
                </div>

                <!-- Obtions -->
                <div class="grid grid-cols-3 items-center gap-2 w-full justify-center">
                    <button
                        class="flex gap-2 w-full items-center justify-center border-2 border-gray-200 py-2 px-2 rounded-xl hover:scale-108 hover:shadow-lg/10 ">
                        <img class="w-4 h-auto" src="{{ asset('assets/images/google.png') }}" alt="">
                        <h1 class="text-xs">Google</h1>
                    </button>

                    <button
                        class="flex gap-2 w-full items-center justify-center border-2 border-gray-200 py-2 px-2 rounded-xl hover:scale-108 hover:shadow-lg/10 ">
                        <img class="w-4 h-auto" src="{{ asset('assets/images/facebook.png') }}" alt="">
                        <h1 class="text-xs">Facebook</h1>
                    </button>

                    <a href="/"
                        class="flex gap-2 w-full items-center justify-center border-2 border-gray-200 py-2 px-2 rounded-xl hover:scale-108 hover:shadow-lg/10 ">
                        <img class="w-4 h-auto rounded-full" src="{{ asset('assets/images/guest.png') }}"
                            alt="">
                        <h1 class="text-xs">Guest</h1>
                    </a>
                </div>

                <div class="flex items-center gap-2">
                    <p class="text-sm">Already have an account?</p>
                    <a class="text-caramel text-sm" href="/signin">Log in</a>
                </div>

            </div>
        </div>

    </div>
</x-default>
