<?php
session_start();  // เริ่มต้น session

// ตรวจสอบการล็อกอิน
if (!isset($_SESSION['username'])) {
    header('Location: login.php');  // ถ้าไม่ได้ล็อกอิน จะถูกเปลี่ยนเส้นทางไปยังหน้า login.php
    exit;

}


$username = $_SESSION['username'];  // ดึงข้อมูล username จาก session
?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportHUB</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    
    <nav>
       
        
        <div class="nav-container">
            <a href="home.php">
                <img src="img/sporthub.png" class="logonav">
            </a>
            
            
            <div class="nav-shopping">
                <!-- Check if the username is admin and change the link accordingly -->
                <a href="<?php echo ($username === 'admin') ? 'admin.php' : 'userdb.php'; ?>">
                    <img src="img/guest icon.png" style="width : 2vw; margin-right: 5px; display:flex; justify-content:center; align-items:center;">
                </a>
                <a href="<?php echo ($username === 'admin') ? 'admin.php' : 'userdb.php'; ?>" style="font-weight: bold; font-size: 1vw; color:white;">
                    <?php echo $username; ?>
                </a>
                <div onclick="openCart()" class="nav-basket">
                    <img src="img/white-cart.png" class="basket">
                    <div id="cartcount" class="cartcount" style="display: none;">0</div>
                </div>
            </div>
        </div>
    </nav>
        <div class="container">
            <div class="sidebar">
                <input onkeyup="search(this)" id="txt_search" type="text" class="search-side-bar" placeholder="Search Product">

                <a onclick="searchproduct('all')" class="sidebar-item">
                    All 
                </a>

                <a onclick="searchproduct('Football')" class="sidebar-item">
                    Football 
                </a>

                <a onclick="searchproduct('Volleyball')" class="sidebar-item">
                    Volleyball 
                </a>

                <a onclick="searchproduct('Badminton')" class="sidebar-item">
                    Badminton 
                </a>

                <a onclick="searchproduct('Basketball')" class="sidebar-item">
                    Basketball 
                </a>

                <a onclick="searchproduct('Tabletennis')" class="sidebar-item">
                    Tabletennis 
                </a>

                <a onclick="searchproduct('Tennis')" class="sidebar-item">
                    Tennis 
                </a>
                <!-- <a href="userdb.php" class="sidebar-item">Dashboard</a> -->

                <div class="logout-bar">
                    <a href="logout.php"class='logoutbtn ' img="img/exit.png">logout
                        <img class="imgexit"src="img/exit.png" alt=""></a>
                </div>

            </div>
            <div id="productlist" class="product">
                <!-- <div class="product-item">
                    <img class="imgproduct"src="https://www.arifootballstore.com/media/catalog/product/cache/6e478a31517304dced53ac4d3f3d5560/u/c/ucl_mini_ia0944__01.jpg" >
                    <p style="font-size: 1.2vw;">UCL Ball 100%</p>
                    <p style="font-size: 0.9vw;">price 1500</p>
                    <img class="cartinpro"src="img/orange-cart-remover.png" alt="">
                </div> -->

                
            </div>
        </div>
        <div id="modleDesc"class="modal" style="display: none;">
            <div onclick="closeModal()"class="modal-bg"></div>
            <div class="modal-page">
                <h2>Details</h2>
                <br>
                <div class="modal-content">
                    <img id="mdd-img"src="img/ucl_mini_ia0944__01.jpg" class="modal-img" alt="">
                    <div class="modal-detail">
                        <p id="mdd-name" style="font-size: 1.5vw; ">UCL Ball 100%</p>
                        <p id="mdd-price"style="font-size: 1.2vw;">price 1500</p>
                        <br>
                        <p id="mdd-desc"style="color: #adadad;">Lorem, ipsum ciunt. Veniam corrupti cumque quidem laboriosam, quas modi dignissimos et optio distinctio voluptatem cupiditate, porro, enim officiis dolorem inventore possimus magni! Dicta necessitatibus nostrum illum omnis quia cumque voluptate commodi nam?</p>
                        <br>
                        <div class="btn-control">
                            <button onclick="closeModal()"class="btn">
                                Close
                            </button>
                            <button onclick="addtocart()" class="btn btn-buy">
                                Add to cart
                            </button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <!-- Mycart -->

        <div id="modalCart" class="modal" style="display: none;">
            <div onclick="closeModal()"class="modal-bg"></div>
            <div class="modal-page">
                <h2>My Cart</h2>
                <br>
                <div id="mycart" class="cartlist">

                    
                    
                    
                        
                    
                </div> 
                <div class="btn-control">
                    <button onclick="closeModal()" class="btn">
                        Cancel
                    </button>
                    <button onclick="buynow()" class="btn btn-buy">
                        Buy
                    </button>

                </div>
                
            </div>
        </div>
        

          
</body>
</html>                                                                                                     