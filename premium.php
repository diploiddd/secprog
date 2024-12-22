<?php
    require("./navigation.php");

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['premium'])){
        $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

        //CSRF TOKEN
        if(!$csrf_token || !($csrf_token === $_SESSION['csrf_token'])){
            echo "Something has gone wrong, please try again later";
            header("Refresh: 1; url=../premium.php");
            exit();
        }

        //Regenerate Token
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

        $user_id = $_SESSION['user_id'];
        $role = $_SESSION['role'];

        //Elevate User to Premium
        if($_SESSION['role'] === "Premium"){
            echo "You're already a premium user";
            header("Refresh: 1; url=../home.php");
            exit();
        }
        else if($_SESSION['role'] === "Regular"){
            $premium_start = date('Y-m-d H:i:s');
            $premiumquery = "UPDATE users SET role = 'Premium', premium_start = ? WHERE user_id = ?";
            $stmt = $conn->prepare($premiumquery);
            $stmt->bind_param("si", $premium_start, $user_id);

            if($stmt->execute()){
                echo "Sucess";
                $_SESSION['role'] = "Premium";
                header("Refresh: 1; url=../home.php");
                exit();
            }

            else{
                // echo "Something has gone wrong, please try again later";
                header("Refresh: 1; url=../premium.php");
                exit();
            }
           
        }
        else{
            echo "Please log in before subscribing to premium";
            header("Refresh: 1; url=../login.php");
            exit();
        }



    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upgrade to Premium</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="content_premium">
        <div class="container_premium">
            <div class="text_premium">
                <h1>Upgrade to Premium to unlock more content :D</h1>
                <h3>Free of Charge!</h3>
            </div>
            <form action="" method="POST" class="premium_form" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
                <input type="submit" name="premium" class="inline-btn" value="Upgrade to Premium">
            </form>
        </div>
    </div>
    

    <footer class="footer">
      copyright &copy;2024 by <span>pengabdi</span> | All Rights Reserved
    </footer>
    <script src="js/script.js"></script>
</body>
</html>