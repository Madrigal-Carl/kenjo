import React, { useEffect, useState, useRef } from "react";

export default function Drawer({ isOpen, onClose }) {
    const [cart, setCart] = useState([]);
    const [total, setTotal] = useState(0);
    const drawerRef = useRef(null);

    useEffect(() => {
        const storedCart = JSON.parse(localStorage.getItem("cart")) || [];
        setCart(storedCart);
    }, [isOpen]);

    useEffect(() => {
        const tempTotal = cart.reduce((acc, item) => acc + item.price * item.quantity, 0);
        setTotal(tempTotal);
    }, [cart]);

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (drawerRef.current && !drawerRef.current.contains(event.target)) {
                onClose();
            }
        };

        if (isOpen) {
            document.addEventListener("mousedown", handleClickOutside);
        } else {
            document.removeEventListener("mousedown", handleClickOutside);
        }

        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, [isOpen, onClose]);

    const updateQuantity = (id, newQuantity) => {
        if (newQuantity < 1) return removeFromCart(id);

        const updatedCart = cart.map((item) =>
            item.id === id ? { ...item, quantity: newQuantity } : item,
        );

        setCart(updatedCart);
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    };

    const removeFromCart = (id) => {
        const updatedCart = cart.filter((item) => item.id !== id);
        setCart(updatedCart);
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    };

    return (
        <div className={`fixed inset-0 ${isOpen ? "visible" : "invisible"}`}>
            {/* Background overlay */}
            <div className="fixed inset-0 bg-opacity-50 transition-opacity"></div>

            {/* Drawer */}
            <div
                ref={drawerRef}
                className={`fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform transition-transform ${isOpen ? "translate-x-0" : "translate-x-full"
                    }`}
            >
                <div className="p-4 border-b flex justify-between items-center">
                    <h2 className="text-lg font-semibold">Your Cart</h2>
                    <button onClick={onClose} className="text-gray-500 hover:text-gray-800">&times;</button>
                </div>
                <div className="p-4 overflow-y-auto max-h-[80vh]">
                    {cart.length > 0 ? (
                        cart.map((item) => (
                            <div key={item.id} className="flex items-center justify-between border-b py-3">
                                <img src={item.img} alt={item.title} className="w-14 h-14 object-cover rounded" />
                                <div className="flex-1 ml-3">
                                    <h3 className="text-sm font-semibold">{item.title}</h3>
                                    <p className="text-xs text-gray-500">${item.price} x {item.quantity}</p>
                                    <div className="flex items-center mt-1">
                                        <button
                                            onClick={() => updateQuantity(item.id, item.quantity - 1)}
                                            className="px-2 py-1 border rounded-l bg-gray-200 hover:bg-gray-300"
                                        >-</button>
                                        <span className="px-3">{item.quantity}</span>
                                        <button
                                            onClick={() => updateQuantity(item.id, item.quantity + 1)}
                                            className="px-2 py-1 border rounded-r bg-gray-200 hover:bg-gray-300"
                                        >+</button>
                                    </div>
                                </div>
                                <button
                                    onClick={() => removeFromCart(item.id)}
                                    className="text-red-500 text-sm hover:text-red-700"
                                >Remove</button>
                            </div>

                        ))
                    ) : (
                        <p className="text-center text-gray-500">Your cart is empty.</p>
                    )}
                </div>
                <div className="p-4 border-t">
                    <h1 className="text-lg font-semibold">Total: ${total.toFixed(2)}</h1>
                </div>
                <div className="p-4 border-t flex justify-between">
                    <button className="w-full bg-[#8B4A24] text-white py-2 rounded hover:bg-[#5F2E15] transition">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    );
}
