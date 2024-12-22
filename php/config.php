<?php
    require('database.php');
    $conn = new mysqli(
        $config['server'],
        $config['username'],
        $config['password'],
        $config['database']
    );

    // Checks for connection errors
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    //Generate CSRF token
    if (empty($_SESSION['csrf_token'])){
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    //Expired Premium Plan
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $expiredquery= "SELECT premium_start FROM users WHERE user_id = ?";
        $stmtexpired = $conn->prepare($expiredquery);
        $stmtexpired->bind_param("i", $user_id);

        $stmtexpired->execute();
        $result = $stmtexpired->get_result();
        $row = $result->fetch_assoc();

        if (!empty($row['premium_start_date'])) {
            $premium_date = new DateTime($row['premium_start_date']);
            $current_date = new DateTime();
            $interval = $premium_date->diff($current_date);
            
            if($interval->days >= 30){
                $realexpiredquery= "UPDATE users SET role = 'Regular', premium_start = NULL WHERE user_id = ?";
                $realexpired = $conn->prepare($realexpiredquery);
                $realexpired->bind_param("i", $user_id);
                if($realexpired->execute()){
                    $_SESSION['premium_expired'] = true;
                    unset($_SESSION['premium_start']);
                    $_SESSION['role'] = "Regular";
                }
                else{
                    echo "An error has occured.";
                    header("Refresh: 1; url=../home.php");
                    exit();
                }
                $realexpired->close();
            }
            $stmtexpired->close();
        }
    }

    //Alert for expiration
    if (isset($_SESSION['premium_expired']) && $_SESSION['premium_expired']) {
        echo "<script>
        alert('Your premium subscription has expired. Renew now to continue enjoying premium benefits!');
        window.location.href = '../subscribe.php';
        </script>";
        unset($_SESSION['premium_expired']);
    }
?>

