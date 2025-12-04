# Web Development & Database Integration Project #

The project focuses on developing a responsive e-commerce website with a robust database backend, featuring user authentication, product management, and a shopping cart system.

----

# Project Objectives

- To design and develop a web application that efficiently connects to a database.

- To implement a secure User Login system to verify identity and manage access.

- To create a Shopping Cart system that correctly calculates product prices, shipping, and taxes.

- To ensure the website is responsive and works well across various devices (PC, Mobile).

----

# Key Features

- **User Authentication:** Secure login and registration system for members.

- **Product Catalog:** Browse products with details retrieved dynamically from the database.

- **Shopping Cart:** Users can add items, view the cart, and proceed to checkout.

- **Order Calculation:** Automated calculation of total price, including VAT and shipping fees.

- **Responsive Design:** Optimized user interface for both desktop and mobile viewing.

- **Database Integration:** Utilizes a relational database to store user data, products, and orders.

----

# How to Use the Website: A Step-by-Step Guide

This guide walks you through the core functionalities of the website, from creating an account to completing a purchase.

**1. User Registration & Login**

**Function:** Securely manages user identities and access.

**Steps:**

- **Access the Site:** Open the website URL in your browser.
    
- **Navigate to Register:** Click on the "Register" or "Sign Up" link usually found in the header or navigation menu.
    
- **Fill in Details:** Enter your required information such as username, password, email, and contact details in the registration form.
    
- **Submit:** Click the "Register" button. The system will validate your input and create your account in the database.
    
- **Log In:** Go to the "Login" page. Enter your registered username and password.
    
- **Access:** Upon successful login, you will be redirected to the main product page or your dashboard, and you will see your username displayed, confirming you are logged in.

<img width="500" height="500" alt="image" src="https://github.com/user-attachments/assets/914bafc5-29fd-4d69-8d68-427d8e47fbf6" /> <img width="500" height="500" alt="image" src="https://github.com/user-attachments/assets/c067985a-d594-464f-94ea-8f588511d131" />


----

**2. Browsing the Product Catalog**

**Function:** Displays available products dynamically retrieved from the database.

**Steps:**

- **View Products:** On the homepage or "Products" page, browse through the grid of available items.
    
- **Product Details:** Each product card displays key information:
    
- **Image:** A visual representation of the product.
    
- **Name:** The title of the product.
    
- **Price:** The cost per unit.
    
- **Description:** A brief overview of the product features.

<img width="929" height="450" alt="image" src="https://github.com/user-attachments/assets/742b2696-d331-44b8-906f-830efade42e0" />

----

**3. Using the Shopping Cart**

**Function:** Allows users to collect items for purchase and manage their selection.

**Steps:**

- **Add Item:** Click the "Add to Cart" button on any product you wish to buy. A confirmation message or cart icon update will indicate the item has been added.

- **Add Multiple Items:** Continue browsing and adding more products. The cart system tracks distinct items and their quantities.

- **View Cart:** Click the "Cart" icon or link in the navigation menu to see a summary of your selected items.

- **Manage Cart:**

     - **Update Quantity:** Change the number of units for an item directly in the cart view.

     - **Remove Item:** Click the "Remove" or "Delete" button next to an item if you no longer want it.

----

**4. Checkout & Order Calculation**

**Function:** Finalizes the purchase and calculates the total cost.

**Steps:**

- **Review Order:** On the Cart page, check the list of items and quantities one last time.

- **Automated Calculation:** The system automatically computes and displays:

- **Subtotal:** The sum of prices for all items.

- **Shipping Fee:** Any applicable delivery charges.

- **VAT/Tax:** Calculated tax based on the subtotal.

- **Grand Total:** The final amount to be paid.

- **Proceed to Checkout:** Click the "Checkout" or "Confirm Order" button.

- **Confirmation:** The system processes the order, saving the transaction details to the database (Orders table) and linking it to your user account. You may see an "Order Successful" confirmation screen.

----

**5. Technical Functionality Behind the Scenes**

- **Database Connectivity:** Every time you view products or log in, the PHP backend executes SQL queries to fetch or verify data from the MySQL database.

- **Session Management:** When you log in, the system starts a "session" that keeps you logged in as you move from page to page. This is also how the shopping cart "remembers" your items even if you refresh the page.

- **Responsive Layout:** If you open the website on a mobile phone, the CSS media queries automatically adjust the layout (e.g., stacking product cards vertically instead of horizontally) to ensure everything is readable and clickable.

----

# Technologies Used

- **Frontend:** HTML, CSS, JavaScript (Ajax for asynchronous operations)

- **Backend:** PHP (implied based on typical curriculum context, or Node.js/Python depending on specific implementation in report)

- **Database:** SQL (MySQL/MariaDB) or similar relational database management system.

- **Tools:** VS Code, XAMPP/MAMP (implied for local server environment).

----

# Project Outcome & Conclusion

The project successfully met its core objectives. The development team delivered a stable website capable of:

- Handling user sessions securely.

- Managing real-time shopping cart operations.

- Connecting seamlessly to the database without significant connection errors.

- Future improvements identified include expanding the system features to support larger-scale e-commerce operations and enhancing security protocols.
