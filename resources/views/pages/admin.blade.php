<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kenjo-Admin</title>

    @vite('resources/css/app.css')
</head>

<body class="font-poppins relative text-darkbrown grid grid-cols-8 h-dvh bg-gray-100 overflow-hidden">
    <nav class="py-4 pl-4 h-dvh">
        <div class="bg-white h-[100%] col-span-1 pt-8 pb-3 px-3 flex flex-col items-center gap-15 rounded-3xl">
            <img src="{{ asset('assets/images/logo.png') }}" class="w-20" alt="">

            <div class="flex flex-col items-center gap-4">
                <div class="relative">
                    <img src="{{ asset('assets/images/profile.png') }}"
                        class="rounded-full w-20 border-3 p-[3px] border-caramel" alt="">
                    <div class="bg-green-500 rounded-4xl w-5 h-5 border-[3px] border-white absolute right-1 bottom-1">
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <h2 class=" font-semibold leading-2">{{ Auth::user()->fullname }}</h2>
                    <small class="text-gray-500">Admin</small>
                </div>

            </div>

            <div class="side flex flex-col gap-1">
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">dashboard</span>
                    <h1 class="text-sm">Dashboard</h1>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">pie_chart</span>
                    <h1 class="text-sm">Analytics</h1>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">package_2</span>
                    <h1 class="text-sm">Products</h1>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">loyalty</span>
                    <h1 class="text-sm">Offers</h1>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">inventory_2</span>
                    <h1 class="text-sm">Inventory</h1>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl bg-darkbrown text-white shadow-xl shadow-gray-300">
                    <span class="material-symbols-rounded">local_mall</span>
                    <h1 class="text-sm">Orders</h1>
                    <span class="material-symbols-rounded flex">chevron_right</span>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">finance</span>
                    <h1 class="text-sm">Sales</h1>
                </div>
                <div
                    class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                    <span class="material-symbols-rounded">person</span>
                    <h1 class="text-sm">Costumer</h1>
                </div>
                <form id="myForm" action="/signout" method="post">
                    @csrf
                    <div role="button" onclick="document.getElementById('myForm').submit();"
                        class="cursor-pointer flex items-center gap-2 p-3 rounded-2xl text-gray-500 hover:bg-darkbrown hover:text-white  hover:shadow-2xl">
                        <span class="material-symbols-rounded">door_back</span>
                        <h1 class="text-sm">Log out</h1>
                    </div>
                </form>

            </div>
        </div>

    </nav>


    <!-- Main -->
    <main class=" col-span-5 p-4 overflow-hidden h-dvh">
        <!-- Order Container -->
        <div class="h-[100%] rounded-3xl flex flex-col gap-4">
            <div class="side flex items-start justify-between ">
                <div class="greetings flex gap-4 items-center">
                    <img src="{{ asset('assets/images/cloud.png') }}" class="w-18" alt="">
                    <div>
                        <h1 class="text-lg leading-5 text-gray-500">Good Morning</h1>
                        <span class="font-semibold text-2xl">{{ Auth::user()->fullname }}</span>
                    </div>
                </div>

                <!-- Search -->
                <div class="flex items-center gap-2">
                    <div class="flex relative items-center">
                        <span class="material-symbols-rounded absolute left-3">search</span>
                        <input type="text"
                            class="text-sm bg-white py-2 pl-10 pr-4 w-50 outline-none border-1 border-gray-100 focus:w-80 focus:border-caramel rounded-xl flex items-center"
                            placeholder="Search Anything">
                    </div>
                    <span class="material-symbols-rounded bg-white p-2 rounded-xl">dark_mode</span>
                </div>
            </div>



            <!-- Summary -->
            <div class=" grid grid-cols-4 gap-4 pt-4">
                <!-- Total Revenue -->
                <div
                    class="flex flex-col bg-gradient-to-tr to-[#5C4228] from-darkbrown text-white p-6 gap-6 rounded-3xl shadow-xl shadow-gray-300">
                    <div class="flex items-start gap-2 justify-between">
                        <div class="">
                            <h1 class="font-medium">Total Revenue</h1>
                            <small>Last 20 days</small>
                        </div>
                        <span class="material-symbols-rounded fill-icons">finance_mode</span>
                    </div>


                    <div class="flex justify-between">
                        <h1 class="text-3xl font-semibold">₱{{ $orders->sum('total_amount') }}</h1>
                        <div class="flex items-center gap-2 text-green-500">
                            <span class="material-symbols-rounded">trending_up</span>
                            <small>23%</small>
                        </div>
                    </div>
                </div>


                <!-- Total Orders -->
                <div class="flex flex-col bg-white p-6 gap-6 rounded-3xl shadow-xl shadow-gray-200">
                    <div class="flex items-start gap-2 justify-between">
                        <div class="">
                            <h1 class="font-medium">Total Orders</h1>
                            <small class="text-gray-500">Last 20 days</small>
                        </div>
                        <span class="material-symbols-rounded fill-icons">local_mall</span>
                    </div>


                    <div class="flex justify-between">
                        <h1 class="text-3xl font-semibold">{{ count($orders) }}</h1>
                        <div class="flex items-center gap-2 text-green-500">
                            <span class="material-symbols-rounded">trending_up</span>
                            <small>45%</small>
                        </div>
                    </div>
                </div>

                <!-- Total Customer -->
                <div class="flex flex-col bg-white p-6 gap-6 rounded-3xl shadow-xl shadow-gray-200">
                    <div class="flex items-start gap-2 justify-between">
                        <div class="">
                            <h1 class="font-medium">Total Customers</h1>
                            <small class="text-gray-500">Last 20 days</small>
                        </div>
                        <span class="material-symbols-rounded fill-icons">group</span>
                    </div>


                    <div class="flex justify-between">
                        <h1 class="text-3xl font-semibold">{{ count($users) }}</h1>
                        <div class="flex items-center gap-2 text-green-500">
                            <span class="material-symbols-rounded">trending_up</span>
                            <small>45%</small>
                        </div>
                    </div>
                </div>


                <!-- Total Pending Orders -->
                <div class="flex flex-col bg-white p-6 gap-6 rounded-3xl shadow-xl shadow-gray-200">
                    <div class="flex items-start gap-2 justify-between">
                        <div class="">
                            <h1 class="font-medium">Pending Orders</h1>
                            <small class="text-gray-500">Last 20 days</small>
                        </div>
                        <span class="material-symbols-rounded fill-icons">schedule</span>
                    </div>


                    <div class="flex justify-between">
                        <h1 class="text-3xl font-semibold">{{ count($orders->where('status', 'pending')) }}</h1>
                        <div class="flex items-center gap-2 text-danger">
                            <span class="material-symbols-rounded">trending_down</span>
                            <small>10%</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders -->
            <div class="flex flex-col gap-4 p-6 bg-white rounded-3xl row-span-1 min-h-[71%]">
                <div class="side flex items-center justify-between gap-2">
                    <h1 class="text-3xl font-semibold">Order List</h1>
                    <div class="flex gap-2 items-center">
                        <select name="" id="" class="w-fit">
                            <option value="pending" selected disabled>Filter by</option>
                            <option value="pending" class="text-sm">All</option>
                            <option value="pending" class="text-sm">Pending</option>
                            <option value="pending" class="text-sm">Complete</option>
                            <option value="pending" class="text-sm">Cancelled</option>
                            <option value="pending" class="text-sm">Refund</option>
                        </select>
                        <span class="material-symbols-rounded">more_horiz</span>
                        <span class="material-symbols-rounded">search</span>

                    </div>
                </div>




                <div class="flex flex-col overflow-y-auto pr-2 max-h-[100%]">
                    <table class="border-separate border-spacing-y-2 relative">
                        <thead class="bg-white rounded-2xl sticky top-0 left-0 z-40">
                            <tr class="bg-gray-100">
                                <th class="px-4 py-3 text-center font-semibold w-40 rounded-l-xl">Order ID</th>
                                <th class="px-4 py-3 text-center font-semibold w-40">Customer ID</th>
                                <th class="px-4 py-3 text-center font-semibold ">Customer</th>
                                <th class="px-4 py-3 text-center font-semibold w-40">Phone Number</th>
                                <th class="px-4 py-3 text-center font-semibold ">Status</th>
                                <th class="px-4 py-3 text-center font-semibold w-40 rounded-r-xl">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="0">
                                    <td class="px-4 py-3 text-center rounded-l-2xl">{{ $order->id }}</td>
                                    <td class="px-4 py-3 text-center">{{ $order->customer_id }}</td>
                                    <td class="px-4 py-3 text-center font-semibold">{{ $order->customer->fullname }}
                                    </td>
                                    <td class="px-4 py-3 text-center ">{{ $order->customer->phone_number }}</td>
                                    <!-- STATUS column -->
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center items-center">
                                            <div
                                                class="gap-2 bg-amber-200 px-2 py-1 rounded-lg flex items-center w-fit">
                                                <span class="material-symbols-rounded status-icon">schedule</span>
                                                <small>Pending</small>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- ACTIONS column -->
                                    <td class="px-4 py-3 rounded-r-2xl">
                                        <div class="flex justify-center items-center gap-1 text-white">
                                            <button
                                                class="bg-pink-500  px-2 py-0.5 flex gap-2 items-center rounded-lg">
                                                <span
                                                    class="material-symbols-rounded small-icons">edit</span><small>Edit</small>
                                            </button>
                                            <button
                                                class="bg-[#247BFF] px-2 py-0.5 flex gap-2 items-center rounded-lg">
                                                <span
                                                    class="material-symbols-rounded small-icons">visibility</span><small>View</small>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Right Side Bar -->
    <section class="col-span-2 py-4 pr-4 grid grid-rows-2 gap-4 h-dvh">
        <!-- Notification -->
        <div class="flex flex-col gap-4 p-6 bg-white rounded-3xl row-span-1 h-[100%]">
            <div class="side flex items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-rounded text-[#247BFF] fill-icons">assignment</span>
                    <h1 class="text-xl font-semibold">Feed</h1>
                </div>
                <div class="flex gap-2 items-center">
                    <span class="material-symbols-rounded">more_horiz</span>
                    <span class="material-symbols-rounded">search</span>
                </div>
            </div>

            <div class="flex flex-col gap-2 overflow-y-auto pr-2">

                @foreach ($orders->where('status', 'pending') as $order)
                    <div class="flex items-center gap-4 bg-gray-100 p-2 rounded-full">
                        <img src="{{ asset('assets/images/profile.png') }}" class="rounded-full w-12"
                            alt="">
                        <div class="flex flex-col gap-1">
                            <h1 class="font-medium leading-none">{{ $order->customer->fullname }}</h1>
                            <div class="flex items-center gap-1">
                                <small class="text-[11px] text-gray-500 leading-none">9:00 am</small>

                                <small
                                    class="bg-caramel w-fit text-[8px] font-medium text-white px-1 py-0.5 rounded-sm">
                                    Burger
                                </small>
                                <small
                                    class="bg-caramel w-fit text-[8px] font-medium text-white px-1 py-0.5 rounded-sm">
                                    Cupcake
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>


        <!-- Top Sales -->
        <div class="flex flex-col gap-4 p-6 bg-white rounded-3xl row-span-1 h-[100%]">
            <div class="side flex items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-rounded text-amber-300 fill-icons">rewarded_ads</span>
                    <h1 class="text-xl font-semibold">Top Selling</h1>
                </div>
                <div class="flex gap-2 items-center">
                    <span class="material-symbols-rounded">more_horiz</span>
                    <span class="material-symbols-rounded">search</span>
                </div>
            </div>




            <div class="flex flex-col overflow-y-auto pr-2">
                <table class="border-separate border-spacing-y-2 h-[100%] relative">
                    <thead class="bg-white rounded-2xl sticky top-0 left-0">
                        <tr class="">
                            <th class=" px-4 py-3 text-start w-10 font-semibold">Rank</th>
                            <th class="px-4 py-3 text-center font-semibold">Product Name</th>
                            <th class=" px-4 py-3 text-center w-30 font-semibold">Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gradient-to-tr to-[#FFEA00] from-[#FFB120] rounded-2xl text-white">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">1</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded">trending_up</span>
                                    <p>234</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gradient-to-tr to-[#FF00AA] from-[#ED234F] rounded-2xl text-white">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">2</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded">trending_up</span>
                                    <p>202</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gradient-to-tr to-[#00FF99] from-[#37DB3C] rounded-2xl text-white">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">3</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded">trending_down</span>
                                    <p>200</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-100 rounded-2xl">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">4</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded text-green-500">trending_up</span>
                                    <p>198</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-100 rounded-2xl">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">5</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded text-danger">trending_down</span>
                                    <p>160</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-100 rounded-2xl">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">5</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded text-danger">trending_down</span>
                                    <p>160</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-100 rounded-2xl">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">5</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded text-danger">trending_down</span>
                                    <p>160</p>
                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-100 rounded-2xl">
                            <td class="px-4 py-3 text-center text-lg font-bold rounded-l-2xl">5</td>
                            <td class="px-4 py-3 text-center">Chocolate Cake</td>
                            <td class="px-4 py-3 text-center rounded-r-2xl gap-2">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="material-symbols-rounded text-danger">trending_down</span>
                                    <p>160</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

</body>

</html>
