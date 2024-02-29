<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organice Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../../stylesheets/widgets/header.css">
    </head>
    <header class="d-flex justify-content-between align-items-center p-3">
        <ul>
            <li><img src="../../../assets/images/leaf.svg"></li>
            <li>Let's order fresh items for you</li>
        </ul>
        <ul>
<?php
    if($this->session->userdata('user')){
?>
            <li><?= $this->session->userdata('user')['firstname'].' '.$this->session->userdata('user')['lastname'] ?></li>
            <li><a href="/auth/logout" class="btn btn-primary">Logout</a></li>
<?php
    }else{
?>
            <li><a href="/auth/render_signup" class="btn btn-outline-primary">Signup</a></li>
            <li><a href="/auth" class="btn btn-primary">Login</a></li>            
<?php        
    }
?>

        </ul>
    </header>
</html>