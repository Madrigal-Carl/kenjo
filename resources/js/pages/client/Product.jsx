import * as React from 'react';
import { useSearch } from "../../layouts/SearchProvider";

export default function Product() {
    const { searchQuery } = useSearch();

    React.useEffect(() => {
        const storedCart = localStorage.getItem("cart");
        if (!storedCart) {
            localStorage.setItem("cart", JSON.stringify([]));
        }
    }, []);

    const handleAddToCart = (item) => {
        let storedCart = JSON.parse(localStorage.getItem("cart")) || [];
        const existingItem = storedCart.find(cartItem => cartItem.id === item.id);

        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            storedCart.push({ ...item, quantity: 1 });
        }

        localStorage.setItem("cart", JSON.stringify(storedCart));
    };

    const filteredProducts = itemData.filter((item) =>
        item.title.toLowerCase().includes(searchQuery.toLowerCase())
    );

    return (
        <div className="w-full px-4 md:px-8 lg:px-12 py-6">
            <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                {filteredProducts.length > 0 ? (
                    filteredProducts.map((item) => (
                        <div key={item.id} className="bg-white shadow-lg rounded-lg overflow-hidden">
                            <img
                                src={item.img}
                                alt={item.title}
                                loading="lazy"
                                className="w-full h-48 object-cover"
                            />
                            <div className="py-2 px-4 bg-gray-100 text-center">
                                <div className='flex justify-between items-center'>
                                    <h3 className="text-sm font-semibold">{item.title}</h3>
                                    <p className="text-md font-bold mt-1">${item.price}</p>
                                </div>
                                <p className="text-xs text-gray-500 truncate w-full overflow-hidden">by: {item.description}</p>
                                <button
                                    onClick={() => handleAddToCart(item)}
                                    className="cursor-pointer mt-2 w-full bg-[#8B4A24] text-white py-1 text-sm rounded-md hover:bg-[#5F2E15] transition"
                                >
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    ))
                ) : (
                    <p className="col-span-full text-center text-gray-500">No products found.</p>
                )}
            </div>
        </div>
    );
}

const itemData = [
    { id: 1, img: 'images/breakfast.jpg', title: 'Breakfast', description: 'A delicious morning meal to start your day.', price: 12.99 },
    { id: 2, img: 'images/burger.jpg', title: 'Burger', description: 'Juicy beef burger with fresh lettuce and cheese.', price: 8.99 },
    { id: 3, img: 'images/camera.jpg', title: 'Camera', description: 'Capture every moment with this high-quality camera.', price: 499.99 },
    { id: 4, img: 'images/coffee.jpg', title: 'Coffee', description: 'Freshly brewed coffee for an energetic day.', price: 3.99 },
    { id: 5, img: 'images/hats.jpg', title: 'Hats', description: 'Stylish hats to complete your look.', price: 19.99 },
    { id: 6, img: 'images/honey.jpg', title: 'Honey', description: 'Pure organic honey, straight from the hive.', price: 7.99 },
    { id: 7, img: 'images/basketball.jpg', title: 'Basketball', description: 'Official-size basketball for indoor and outdoor play.', price: 29.99 },
    { id: 8, img: 'images/fern.jpg', title: 'Fern', description: 'Beautiful green fern to liven up your space.', price: 15.99 },
    { id: 9, img: 'images/mushroom.jpg', title: 'Mushrooms', description: 'Freshly harvested organic mushrooms.', price: 5.49 },
    { id: 10, img: 'images/tomato.jpg', title: 'Tomato Basil', description: 'Fresh tomatoes with a touch of basil.', price: 4.99 },
    { id: 11, img: 'images/seastar.jpg', title: 'Sea Star', description: 'A stunning sea star from the deep ocean.', price: 9.99 },
    { id: 12, img: 'images/bike.jpg', title: 'Bike', description: 'A high-performance mountain bike.', price: 349.99 }
];