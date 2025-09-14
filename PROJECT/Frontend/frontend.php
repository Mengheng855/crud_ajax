<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHub - Your Online Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #64748b;
            --accent-color: #f59e0b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        /* Header Styles */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-color) !important;
        }

        .navbar-nav .nav-link {
            color: var(--secondary-color) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* Hero Carousel Styles */
        .hero-carousel {
            height: 500px;
            overflow: hidden;
        }

        .carousel-item {
            height: 500px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .carousel-item:nth-child(2) {
            background: linear-gradient(135deg, #dc2626, #f59e0b);
        }

        .carousel-item:nth-child(3) {
            background: linear-gradient(135deg, #059669, #10b981);
        }

        .carousel-content h2 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .carousel-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn-hero {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            font-weight: bold;
            border-radius: 50px;
            transition: transform 0.3s ease;
        }

        .btn-hero:hover {
            transform: translateY(-2px);
            color: var(--primary-color);
        }

        /* Product Cards Section */
        .products-section {
            padding: 4rem 0;
            background: #f8fafc;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--secondary-color);
        }

        .product-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 2rem;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            height: 250px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--secondary-color);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .product-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .btn-cart {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
            width: 100%;
        }

        .btn-cart:hover {
            background: #1d4ed8;
            color: white;
        }

        /* Footer Styles */
        .footer {
            background: #1e293b;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer h5 {
            color: white;
            margin-bottom: 1rem;
        }

        .footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: white;
        }

        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            transition: background 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--accent-color);
        }

        .copyright {
            border-top: 1px solid #334155;
            padding-top: 1rem;
            margin-top: 2rem;
            text-align: center;
            color: #94a3b8;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .carousel-content h2 {
                font-size: 2rem;
            }

            .carousel-content p {
                font-size: 1rem;
            }

            .hero-carousel {
                height: 400px;
            }

            .carousel-item {
                height: 400px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-shopping-bag me-2"></i>ShopHub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cart">
                            <i class="fas fa-shopping-cart"></i> Cart (0)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex gap-2 mx-2">
            <?php
           
            if (isset($_SESSION['login']) && $_SESSION['login']) {
                echo '<img src="../Auth/upload/'.$_SESSION['profile'] . '" width="50" height="50" style="border-radius:50%">';
                echo ' <a href="../Auth/logout.php"><button class="btn btn-primary">Logout</button></a>';
            } else {
                echo '
                    <a href="../Auth/login.php"><button class="btn btn-primary" >Login</button></a>
                    <a href="../Auth/register.php"><button class="btn btn-primary" >Register</button></a>
                ';
            }
            ?>


        </div>
    </nav>

    <!-- Hero Carousel Section -->
    <section id="home" style="margin-top: 76px;">
        <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <!-- Replaced first slide with summer sale promotional image -->
                <div class="carousel-item active">
                    <img src="https://i.pinimg.com/1200x/1e/1c/3e/1e1c3ebdccc66d783108d9f77b920a93.jpg" class="d-block w-100" alt="Summer Sale - Up to 50% Off" style="height: 500px; object-fit: cover;">
                </div>
                <!-- Replaced second slide with limited time offer promotional image -->
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/1200x/9a/72/ea/9a72eaf2506a9fe74771df574b2345b0.jpg" class="d-block w-100" alt="Limited Time Sale - Up to 50% Off" style="height: 500px; object-fit: cover;">
                </div>
                <!-- Replaced third slide with online shopping promotional image -->
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/1200x/22/0d/2c/220d2c35673601972c13e24cb818ace2.jpg" class="d-block w-100" alt="Online Shopping Experience" style="height: 500px; object-fit: cover;">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="container">
            <h2 class="section-title">Featured Products</h2>

            <div class="row">
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Premium T-Shirt</h4>
                            <p class="product-description">Comfortable cotton blend t-shirt perfect for everyday wear</p>
                            <div class="product-price">$29.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-running"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Running Shoes</h4>
                            <p class="product-description">Lightweight and comfortable shoes for your daily runs</p>
                            <div class="product-price">$89.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-backpack"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Travel Backpack</h4>
                            <p class="product-description">Durable backpack with multiple compartments for travel</p>
                            <div class="product-price">$59.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-watch"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Smart Watch</h4>
                            <p class="product-description">Feature-rich smartwatch with health monitoring</p>
                            <div class="product-price">$199.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-headphones"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Wireless Headphones</h4>
                            <p class="product-description">High-quality wireless headphones with noise cancellation</p>
                            <div class="product-price">$149.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Laptop Stand</h4>
                            <p class="product-description">Ergonomic laptop stand for better posture and comfort</p>
                            <div class="product-price">$39.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Coffee Mug</h4>
                            <p class="product-description">Insulated coffee mug that keeps drinks hot for hours</p>
                            <div class="product-price">$24.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-image">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">Notebook Set</h4>
                            <p class="product-description">Premium notebook set for writing and sketching</p>
                            <div class="product-price">$19.99</div>
                            <button class="btn btn-cart">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">
                        <i class="fas fa-shopping-cart me-2"></i>Shopping Cart
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cartItems">
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                            <p>Your cart is empty</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between w-100">
                        <div>
                            <strong>Total: $<span id="cartTotal">0.00</span></strong>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary me-2" id="clearCart">Clear Cart</button>
                            <button type="button" class="btn btn-primary">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>ShopHub</h5>
                    <p>Your trusted online shopping destination for quality products at great prices.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Clothing</a></li>
                        <li><a href="#">Electronics</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Home & Garden</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Support</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Shipping Info</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Size Guide</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Account</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Order History</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 ShopHub. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        console.log("[v0] Initializing navbar functionality");

        // Ensure Bootstrap navbar toggle works properly
        let cart = [];
        let cartTotal = 0;

        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('#navbarNav');

            console.log("[v0] Navbar elements found:", {
                toggler: !!navbarToggler,
                collapse: !!navbarCollapse
            });

            // Add click event listener to navbar toggler for debugging
            if (navbarToggler) {
                navbarToggler.addEventListener('click', function() {
                    console.log("[v0] Navbar toggler clicked");
                    console.log("[v0] Navbar collapse classes:", navbarCollapse.className);
                });
            }

            // Close navbar when clicking on nav links (mobile)
            document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    console.log("[v0] Nav link clicked, closing navbar");
                    // Close the navbar collapse on mobile
                    if (window.innerWidth < 992) {
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                });
            });

            // Open cart modal when cart link is clicked
            document.querySelector('a[href="#cart"]').addEventListener('click', function(e) {
                e.preventDefault();
                const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
                updateCartDisplay();
                cartModal.show();
            });

            // Clear cart functionality
            document.getElementById('clearCart').addEventListener('click', function() {
                cart = [];
                cartTotal = 0;
                updateCartCounter();
                updateCartDisplay();
            });
        });

        document.querySelectorAll('.btn-cart').forEach((button, index) => {
            button.addEventListener('click', function() {
                const productCard = this.closest('.product-card');
                const productTitle = productCard.querySelector('.product-title').textContent;
                const productPrice = parseFloat(productCard.querySelector('.product-price').textContent.replace('$', ''));
                const productIcon = productCard.querySelector('.product-image i').className;

                // Add item to cart
                const cartItem = {
                    id: Date.now() + index,
                    title: productTitle,
                    price: productPrice,
                    icon: productIcon,
                    quantity: 1
                };

                // Check if item already exists in cart
                const existingItem = cart.find(item => item.title === productTitle);
                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push(cartItem);
                }

                cartTotal += productPrice;
                updateCartCounter();

                // Visual feedback
                this.innerHTML = '<i class="fas fa-check me-2"></i>Added!';
                this.style.background = '#059669';

                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-cart-plus me-2"></i>Add to Cart';
                    this.style.background = '';
                }, 2000);
            });
        });

        // Cart management functions
        function updateCartCounter() {
            const cartLink = document.querySelector('a[href="#cart"]');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartLink.innerHTML = `<i class="fas fa-shopping-cart"></i> Cart (${totalItems})`;
        }

        function updateCartDisplay() {
            const cartItemsContainer = document.getElementById('cartItems');
            const cartTotalElement = document.getElementById('cartTotal');

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = `
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                        <p>Your cart is empty</p>
                    </div>
                `;
                cartTotalElement.textContent = '0.00';
                return;
            }

            cartItemsContainer.innerHTML = cart.map(item => `
                <div class="cart-item d-flex align-items-center justify-content-between p-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="cart-item-icon me-3" style="width: 50px; height: 50px; background: #e2e8f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                            <i class="${item.icon}" style="font-size: 1.5rem; color: var(--secondary-color);"></i>
                        </div>
                        <div>
                            <h6 class="mb-1">${item.title}</h6>
                            <small class="text-muted">$${item.price.toFixed(2)} each</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-sm btn-outline-secondary me-2" onclick="updateQuantity(${item.id}, -1)">-</button>
                        <span class="mx-2">${item.quantity}</span>
                        <button class="btn btn-sm btn-outline-secondary me-3" onclick="updateQuantity(${item.id}, 1)">+</button>
                        <button class="btn btn-sm btn-danger" onclick="removeFromCart(${item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `).join('');

            cartTotalElement.textContent = cartTotal.toFixed(2);
        }

        function updateQuantity(itemId, change) {
            const item = cart.find(item => item.id === itemId);
            if (item) {
                const oldQuantity = item.quantity;
                item.quantity += change;

                if (item.quantity <= 0) {
                    removeFromCart(itemId);
                    return;
                }

                cartTotal += (item.price * change);
                updateCartCounter();
                updateCartDisplay();
            }
        }

        function removeFromCart(itemId) {
            const itemIndex = cart.findIndex(item => item.id === itemId);
            if (itemIndex > -1) {
                const item = cart[itemIndex];
                cartTotal -= (item.price * item.quantity);
                cart.splice(itemIndex, 1);
                updateCartCounter();
                updateCartDisplay();
            }
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            if (anchor.getAttribute('href') === '#cart') {
                return;
            }
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Auto-play carousel
        const carousel = new bootstrap.Carousel(document.querySelector('#heroCarousel'), {
            interval: 5000,
            wrap: true
        });
    </script>
</body>

</html>