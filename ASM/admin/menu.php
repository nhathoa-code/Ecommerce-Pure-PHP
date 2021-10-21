 <?php
    $dirname = dirname($_SERVER['PHP_SELF']);
    ?>
 <div class="menu_container">
     <nav class="navbar bg-light">
         <ul class="navbar-nav">
             <li class="nav-item <?php echo $dirname == "/ASM/admin/product" ? "active" : "" ?>">
                 <a class="nav-link" href="/ASM/admin/product/productlist.php">Product</a>
             </li>
             <li class="nav-item <?php echo $dirname == "/ASM/admin/category" ? "active" : "" ?>">
                 <a class="nav-link" href="/ASM/admin/category/categorylist.php">Category</a>
             </li>
             <li class="nav-item <?php echo $dirname == "/ASM/admin/user" ? "active" : "" ?>">
                 <a class="nav-link" href="/ASM/admin/user/user_list.php">User</a>
             </li>
             <li class="nav-item <?php echo $dirname == "/ASM/admin/order" ? "active" : "" ?>">
                 <a class="nav-link" href="/ASM/admin/order/orderlist.php">Order</a>
             </li>
             <li class="nav-item <?php echo $dirname == "/ASM/admin/comment" ? "active" : "" ?>">
                 <a class="nav-link" href="/ASM/admin/comment/commentlist.php">Comment</a>
             </li>
         </ul>
     </nav>
 </div>