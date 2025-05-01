# 🍰 KenJo — API and Web Routes Documentation

## 🌐 Base URL
```
http://kenjo.test
```

---

## 📚 Full Route List

| #  | Route | Method | Name | Authentication | Description |
|----|-------|--------|------|-----------------|-------------|
| 1  | `/` | GET | `home` | Optional | View homepage |
| 2  | `/signin` | GET | `signin` | No | View login page |
| 3  | `/signin` | POST | — | No | Authenticate user |
| 4  | `/signup` | GET | `signup` | No | View signup page |
| 5  | `/signup` | POST | — | No | Register new user |
| 6  | `/signout` | POST | `signout` | Yes | Logout user |
| 7  | `/cart` | GET | `cart` | Yes | View user's cart page |
| 8  | `/products` | GET | `product.index` | No | Fetch products list |
| 9  | `/products` | POST | `product.store` | Yes (Admin) | Add new product |
| 10 | `/cart/data` | GET | `cart.index` | Yes | Get cart items (JSON) |
| 11 | `/cart` | POST | `cart.store` | Yes | Add product to cart |
| 12 | `/cart/products/{id}` | DELETE | `cart.remove` | Yes | Remove product from cart |
| 13 | `/cart/products/{id}` | PUT | `cart.update` | Yes | Update quantity in cart |
| 14 | `/order` | POST | `order.store` | Yes | Place an order |
| 15 | `/admin/order` | GET | `admin.order` | Admin only | View admin order dashboard |

---

## 🛠️ Detailed Route Descriptions

### `/` (GET)
- **Name:** `home`
- **Authentication:** Optional
- **Status Code:** `200 OK`
- **Description:** Display homepage.

---

### `/signin` (GET)
- **Name:** `signin`
- **Authentication:** No
- **Status Code:** `200 OK` (or `302 Found` if already authenticated)
- **Description:** Display login page.

---

### `/signin` (POST)
- **Authentication:** No
- **Status Code:** `303 See Other` (success) / `422 Unprocessable Entity` (validation failed)
- **Description:** Authenticate user.

**Request:**
```json
{
  "phone": "09123456789",
  "password": "secret123"
}
```

---

### `/signup` (GET)
- **Name:** `signup`
- **Authentication:** No
- **Status Code:** `200 OK` (or `302 Found` if already authenticated)
- **Description:** Display signup page.

---

### `/signup` (POST)
- **Authentication:** No
- **Status Code:** `303 See Other` (success) / `422 Unprocessable Entity` (validation failed)
- **Description:** Register a new user.

**Request:**
```json
{
  "fullname": "Juan Dela Cruz",
  "phone_number": "09123456789",
  "password": "secret123",
  "password_confirmation": "secret123"
}
```

---

### `/signout` (POST)
- **Name:** `signout`
- **Authentication:** Yes
- **Status Code:** `200 OK`
- **Description:** Logs out current user.

**Response:**
```json
{
  "message": "Logged out successfully"
}
```

---

### `/cart` (GET)
- **Name:** `cart`
- **Authentication:** Yes
- **Status Code:** `200 OK` (if logged in) / `302 Found` (redirect to login if not authenticated)
- **Description:** View user's cart page.

---

### `/products` (GET)
- **Name:** `product.index`
- **Authentication:** No
- **Status Code:** `200 OK`
- **Description:** Fetch all products.

**Response:**
```json
[
  {
    "_id": "abc123",
    "name": "Chocolate Cupcake",
    "price": 120.00,
    "description": "Rich chocolate cupcake topped with creamy frosting.",
    "category": "cupcake",
    "image": "choco_cupcake.jpg"
  }
]
```

---

### `/products` (POST)
- **Name:** `product.store`
- **Authentication:** Admin only
- **Status Code:** `201 Created` (success) / `422 Unprocessable Entity` (validation failed)
- **Description:** Add a new product.

**Request:**
```json
{
  "name": "Strawberry Cupcake",
  "details": "Fresh strawberry flavor",
  "price": 110,
  "category": "cupcake",
  "image": "strawberry_cupcake.jpg"
}
```

**Response:**
```json
{
  "message": "Product has been added successfully.",
  "data": { "id": "abc123" }
}
```

---

### `/cart/data` (GET)
- **Name:** `cart.index`
- **Authentication:** Yes
- **Status Code:** `200 OK`
- **Description:** Get current user's cart data.

**Response:**
```json
{
  "success": true,
  "products": [...]
}
```

---

### `/cart` (POST)
- **Name:** `cart.store`
- **Authentication:** Yes
- **Status Code:** `200 OK`
- **Description:** Add a product to the cart.

**Request:**
```json
{
  "product": {
    "id": "abc123",
    "quantity": 2
  }
}
```

---

### `/cart/products/{id}` (DELETE)
- **Name:** `cart.remove`
- **Authentication:** Yes
- **Status Code:** `200 OK`
- **Description:** Remove a product from the cart.

**Request Example:**
```
DELETE /cart/products/abc123
```

**Response:**
```json
{
  "message": "Product removed."
}
```

---

### `/cart/products/{id}` (PUT)
- **Name:** `cart.update`
- **Authentication:** Yes
- **Status Code:** `200 OK`
- **Description:** Update quantity of a product in the cart.

**Example URL:**
```
PUT /cart/products/abc123
```

**Request:**
```json
{
  "quantity": 3
}
```

**Response:**
```json
{
  "message": "Quantity updated",
}
```

---

### `/order` (POST)
- **Name:** `order.store`
- **Authentication:** Yes
- **Status Code:** `200 OK`
- **Description:** Place an order.

**Request:**
```json
{
  "products": [...],
  "total": 1152
}
```

**Response:**
```json
{
  "message": "Order successfully placed.",
  "order_id": "order123"
}
```

---

### `/admin/order` (GET)
- **Name:** `admin.order`
- **Authentication:** Admin only
- **Status Code:** `200 OK` (if admin) / `302 Found` (redirect to home if not admin)
- **Description:** View all customer orders (admin dashboard).

---

# 👨‍💻 Ground Members
- Carl S. Madrigal
- Erickson Dave C. Geroleo
- Gene Elpie L. Landoy
- Aldrin James T. Palma

---

# 📢 Notes
- Users must be logged in to access cart and order routes.
- Only admin users can create products or access `/admin/order`.
- Flash messages and error handling are included in server responses.
