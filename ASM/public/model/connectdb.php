 <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=demodb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    function countRows($table)
    {
        global $conn;
        $query = "select count(*) from $table";
        $result = $conn->query($query);
        return $result->fetch()[0];
    }
    function countComments($productid)
    {
        global $conn;
        $query = "select count(*) from comment where productid = $productid";
        $result = $conn->query($query);
        return $result->fetch()[0];
    }

    function pageLinks($total_rows, $current_page)
    {
        $links = ceil($total_rows / 5);
        if ($links > 1) {
            echo "<div class='links'>";
            if ($current_page > 1) {
                $prev = $current_page - 1;
                echo "<a href='?current_page=$prev'><</a>";
            }
            for ($i = 1; $i <= $links; $i++) {
                if ($i == $current_page) {
                    echo "<a class='active-page' href='?current_page=$i'>$i</a>";
                } else {
                    echo "<a href='?current_page=$i'>$i</a>";
                }
            }
            if ($current_page < $links) {
                $next = $current_page + 1;
                echo "<a href='?current_page=$next'>></a>";
            }
            echo "</div>";
        }
    }


    function pageLinksSearch($total_rows, $current_page, $keyword)
    {
        $links = ceil($total_rows / 5);
        if ($links > 1) {
            echo "<div class='links'>";
            if ($current_page > 1) {
                $prev = $current_page - 1;
                echo "<a href='?keyword=$keyword&current_page=$prev'><</a>";
            }
            for ($i = 1; $i <= $links; $i++) {
                if ($i == $current_page) {
                    echo "<a class='active-page' href='?keyword=$keyword&current_page=$i'>$i</a>";
                } else {
                    echo "<a href='?keyword=$keyword&current_page=$i'>$i</a>";
                }
            }
            if ($current_page < $links) {
                $next = $current_page + 1;
                echo "<a href='?keyword=$keyword&current_page=$next'>></a>";
            }
            echo "</div>";
        }
    }

    function getQuantityOfOneSize($productid)
    {
        global $conn;
        $query = "select quantity from quantity where productid = $productid";
        return intval($conn->query($query)->fetch(PDO::FETCH_ASSOC)['quantity']);
    }
    function getQuantityOfMultiSize($productid, $size)
    {
        global $conn;
        $query = "select $size from product_quantity where productid = $productid";
        return intval($conn->query($query)->fetch(PDO::FETCH_ASSOC)[$size]);
    }


    function isInStock($sizetype, $productid)
    {
        global $conn;
        if ($sizetype == "one") {
            $query = "select quantity from quantity where productid = " . $productid;
            $quantity = $conn->query($query)->fetch(PDO::FETCH_ASSOC)['quantity'];
            $isInStock = false;
            if (intval($quantity) > 0) {
                $isInStock = true;
            }
        } else {
            $query = "select XS,S,M,L,XL from product_quantity where productid = " . $productid;
            $quantities = $conn->query($query)->fetch(PDO::FETCH_ASSOC);
            $isInStock = false;
            foreach ($quantities as $quantity) {
                if (intval($quantity) > 0) {
                    $isInStock = true;
                    break;
                }
            }
        }
        return $isInStock;
    }
