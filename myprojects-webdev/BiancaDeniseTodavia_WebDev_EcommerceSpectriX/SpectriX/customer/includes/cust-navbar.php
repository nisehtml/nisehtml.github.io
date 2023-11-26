<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SpectriX</title>
  <link rel="stylesheet" href="includes/style.css">
  <script src="addToCart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://kit.fontawesome.com/2290fd41b1.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <nav class="navbar">
      <a class="logo" href="../index.php">SpectriX.</a>
      <ul class="menu-links">
        <span id="close-menu-btn" class="fas fa-xmark"></span>
        <li><a href="../index.php">Home</a></li>
        <li>
          <div class="dropdown">
            <a href="../collections.php"><button class="dropbtn">Collections</button></a>
            <div class="dropdown-content">
              <a href="../collections.php">Ergonomic</a>
              <a href="../collections.php">Gaming</a>
              <a href="../collections.php">Productivity</a>
            </div>
          </div>
        <li><a href="../keyboards.php">Keyboards</a></li>
        <li><a href="../about.php">About</a></li>
        <li><a href="../contact.php">Contact</a></li>
      </ul>

      <div class="right-side">
        <form class="d-flex" role="search" id="searchForm">
          <input class="form-control me-2" id="searchInput" name="search" type="search" placeholder="Search"
            aria-label="Search">
          <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <a href="cart.php" class="icon cart"><i class="fa-solid fa-cart-shopping"></i>
        <span id="cartItemCount">0</span></a>
        <a href="../adminlogin.php" class="icon sign-in"><i class="fa-regular fa-user"></i></a>
      </div>
      <span id="hamburger-btn" class="fas fa-bars"></span>
    </nav>
  </header>
<main>