<?php session_start(); ?>
<body>

  <!-- Header -->
    <header id="header">
      <div class="inner">
        <a href="index.php" class="logo">Welcome to Razorburn</a>
        <nav id="nav">
          <a href="users.php">Logged in User: <i id="username"><?php echo $_SESSION['username']; ?></i></a>
          <a href="home.php">Home</a>
          <a href="checkout.php">Checkout</a>
          <a href="index.php">Logout</a>
        </nav>
      </div>
    </header>
    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
