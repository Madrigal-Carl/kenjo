import React, { useState } from "react";
import { Search, ShoppingCart, AccountCircle } from "@mui/icons-material";
import { Link, usePage } from '@inertiajs/react';
import { useSearch } from "./SearchProvider";
import Drawer from "./Drawer"; // Import the Drawer component

export default function Navbar() {
    const { user } = usePage().props;
    const { searchQuery, setSearchQuery } = useSearch();
    const [isDrawerOpen, setIsDrawerOpen] = useState(false);

    return (
        <>
            <div className="bg-[#8B4A24] p-3">
                <div className="flex items-center justify-between max-w-6xl mx-auto px-2">
                    <Link href="/" className="flex items-center">
                        <img src="images/kenjo_logo.png" alt="KenJo Logo" className="h-14 lg:h-16" />
                    </Link>

                    <div className="hidden sm:flex items-center bg-white rounded-full overflow-hidden w-full max-w-lg border-2 border-[#7A3E1D] shadow-md">
                        <input
                            type="text"
                            placeholder="Search products..."
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                            className="flex-1 px-6 py-2 outline-none bg-transparent text-gray-900"
                        />
                        <button className="bg-[#7A3E1D] p-2 rounded-r-full hover:bg-[#5F2E15] transition">
                            <Search className="text-white" />
                        </button>
                    </div>

                    <div className="flex items-center space-x-6 text-white">
                        <button
                            className="relative p-2 rounded-full hover:outline hover:outline-white hover:outline-offset-2 transition"
                            onClick={() => setIsDrawerOpen(true)}
                        >
                            <ShoppingCart className="cursor-pointer" />
                        </button>
                        {user ? (
                            <div className="relative p-2 rounded-full hover:outline hover:outline-white hover:outline-offset-2 transition">
                                <AccountCircle className="cursor-pointer" />
                            </div>
                        ) : (
                            <button className="px-4 py-2 text-white rounded-full outline outline-white outline-offset-2 transition hover:bg-[#5f2e1579]">
                                Get Started
                            </button>
                        )}
                    </div>
                </div>

                <div className="sm:hidden mt-3">
                    <div className="flex items-center bg-white rounded-full overflow-hidden border-2 border-[#7A3E1D] shadow-md mx-2">
                        <input
                            type="text"
                            placeholder="Search products..."
                            value={searchQuery}
                            onChange={(e) => setSearchQuery(e.target.value)}
                            className="flex-1 px-4 py-2 outline-none bg-transparent text-gray-900"
                        />
                        <button className="bg-[#7A3E1D] p-2 rounded-r-full hover:bg-[#5F2E15] transition">
                            <Search className="text-white" />
                        </button>
                    </div>
                </div>
            </div>

            {/* Drawer Component */}
            <Drawer isOpen={isDrawerOpen} onClose={() => setIsDrawerOpen(false)} />
        </>
    );
}
