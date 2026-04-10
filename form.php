<!DOCTYPE html>
    <html>
        <head>
            <title>Online Order Form</title>
            <style>
                body { font-family: Arial; padding: 20px; }
                form { width: 400px; margin: auto; }
                input, select, textarea { width: 100%; margin: 5px 0; padding: 8px; }
                input[type="checkbox"], input[type="radio"] { width: auto; margin-right: 8px; padding: 0; }
                .product-list { margin: 10px 0 5px; }
                .product-item { display: flex; gap: 10px; align-items: center; padding: 6px 0; border-bottom: 1px dashed #e6e6e6; }
                .product-item:last-child { border-bottom: 0; }
                .product-item label { flex: 1; display: flex; align-items: center; gap: 8px; cursor: pointer; }
                .product-item .price { color: #555; font-size: 12px; }
                .product-item input[type="number"] { width: 110px; margin: 0; padding: 6px 8px; }
            </style> 
        </head>
    <body>

    <h2 align="center">Online Order Form</h2>

    <form id="order-form" method="POST" action="get.php">

    <h3>Customer Information</h3>
        <input type="text" name="fname" placeholder="First Name" required>
        <input type="text" name="lname" placeholder="Last Name" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="contact" placeholder="Contact Number" required>
        <input type="email" name="email" placeholder="Email" required>

    <h3>Order Details</h3>

    <div class="product-list">
        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Fried Chicken">
                <span>Fried Chicken <span class="price">₱250</span></span>
            </label>
            <input type="number" name="quantities[Fried Chicken]" min="1" value="1" aria-label="Fried Chicken quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Spaghetti">
                <span>Spaghetti <span class="price">₱80</span></span>
            </label>
            <input type="number" name="quantities[Spaghetti]" min="1" value="1" aria-label="Spaghetti quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Burger">
                <span>Burger <span class="price">₱150</span></span>
            </label>
            <input type="number" name="quantities[Burger]" min="1" value="1" aria-label="Burger quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="French Fries">
                <span>French Fries <span class="price">₱60</span></span>
            </label>
            <input type="number" name="quantities[French Fries]" min="1" value="1" aria-label="French Fries quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Ice Cream">
                <span>Ice Cream <span class="price">₱99</span></span>
            </label>
            <input type="number" name="quantities[Ice Cream]" min="1" value="1" aria-label="Ice Cream quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Carbonara">
                <span>Carbonara <span class="price">₱200</span></span>
            </label>
            <input type="number" name="quantities[Carbonara]" min="1" value="1" aria-label="Carbonara quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Cheeseburger">
                <span>Cheeseburger <span class="price">₱120</span></span>
            </label>
            <input type="number" name="quantities[Cheeseburger]" min="1" value="1" aria-label="Cheeseburger quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Pizza">
                <span>Pizza <span class="price">₱499</span></span>
            </label>
            <input type="number" name="quantities[Pizza]" min="1" value="1" aria-label="Pizza quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Donut">
                <span>Donut <span class="price">₱350</span></span>
            </label>
            <input type="number" name="quantities[Donut]" min="1" value="1" aria-label="Donut quantity">
        </div>

        <div class="product-item">
            <label>
                <input type="checkbox" name="products[]" value="Chicken Inasal">
                <span>Chicken Inasal <span class="price">₱130</span></span>
            </label>
            <input type="number" name="quantities[Chicken Inasal]" min="1" value="1" aria-label="Chicken Inasal quantity">
        </div>
    </div>

    <p>Mode of Payment:</p>
        <input type="radio" name="payment" value="Cash on Delivery" required> COD
        <input type="radio" name="payment" value="GCash"> GCash
        <input type="radio" name="payment" value="Credit Card"> Credit Card

    <select name="delivery" required>
        <option value="">Delivery Option</option>
        <option value="Standard">Standard</option>
        <option value="Express">Express</option>
    </select>

    <textarea name="notes" placeholder="Additional Notes (optional)"></textarea>

    <br><br>
    <input type="submit" value="Submit Order">

    </form>

    <script>
        document.getElementById("order-form").addEventListener("submit", function () {
            alert("Order complete!");
        });
    </script>

    </body>
</html>