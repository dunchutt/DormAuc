<?php include_once('./includes/headerNav.php'); ?>
<?php require_once './includes/topheadactions.php'; ?>
<?php require_once './includes/mobilenav.php'; ?>

<header>
  <?php require_once './includes/topheadactions.php'; ?>
  <?php require_once './includes/desktopnav.php' ?>
  <?php require_once './includes/mobilenav.php'; ?>
</header>

<?php

$sql1 = "SELECT * FROM products";
$result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

$product_ID = $_GET['id'];
$product_category = $_GET['category'];

if ($product_ID === null || $product_category === null) {
    echo "Product details not provided in the URL.";
    exit();
}

$product_name = '';
$product_price = '';

if ($product_category == "deal_of_day") {
  $item = get_deal_of_day_by_id($product_ID);
} else {
  $item = get_product($product_ID);
}

// Check if $item is not null and if there are rows in the result set
if ($item && mysqli_num_rows($item) > 0) {
  $row = mysqli_fetch_assoc($item);

  // Check if the expected keys exist in the $row array
  if (isset($row['product_title'])) {
    $product_name = $row['product_title'];
  }

  if (isset($row['product_price'])) {
    $product_price = $row['product_price'];
  }

  if (isset($row['product_img'])) {
    $product_img = $row['product_img'];
    include_once './product.php';
  }
} else {
  // Handle the case when the product is not found
  echo "Product not found";
}
?>

<div class="overlay" data-overlay></div>

<div class="product-container category-side-bar-container">
  <div class="container">
    <?php require_once 'includes/categorysidebar.php' ?>

    <div class="content">
      <form action="place_bid.php" method="post" class='view-form'>
        <div class="product_image_box" style="background-image: url('./admin/upload/<?php //echo $row['product_img'] ?>')"></div>
        <input type="hidden" name="product_img" value="<?php echo $row['product_img'] ?>">
        <?php include_once './product.php'; ?>

        <div class="product_detail_box">
          <h3 class="product-detail-title"><?php echo strtoupper($product_name); ?></h3>
          <div class="prouduct_information">
            <div class="product_description">
              <div class="product_title"><strong>Name:</strong></div>
              <div class="product_detail">
                <?php echo ucfirst($product_name); ?>
                <input type="hidden" name='product_name' id='product_name' value="<?php echo $product_name; ?>">
              </div>
            </div>

            <div class="product_description">
              <div class="product_title"><strong>Highest Bid:</strong></div>
              <div class="product_detail">
                <div class="price-box">
                  <p class="price">₩<?php echo $product_price; ?>000</p>
                  <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
                  <input type="hidden" id="product_identity" name="product_id" value="<?php echo $row['product_id']; ?>">
                  <input type="hidden" name="product_category" value="<?php echo $product_category; ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="product_counter_box">
            <div class="product_counter_btn_box">
              <button type="button" class="btn_product_increment">+</button>
              <input class="input_product_quantity" type="number" style="width: 100px" max="100000" min="1000"
                value="1000" name="product_qty" id="p_qty" />
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?> " />
              <button type="button" class="btn_product_decrement">-</button>
            </div>

            <div class="buy-and-cart-btn">
              <label for="bid_amount">Bid Amount:</label>
              <input type="text" name="bid_amount" id="bid_amount" required>
              <button type="submit" name="place_bid" class="btn_product_cart">Place Bid</button>
              
            </div>
            <?php include_once 'place_bid.php'; ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  let btn_product_decrement = document.querySelector('.btn_product_decrement');
  let btn_product_increment = document.querySelector('.btn_product_increment');
  let change_qty = document.getElementById('p_qty');

  btn_product_decrement.addEventListener('click', function () {
    change_qty.value = Math.max(1000, parseInt(change_qty.value) - 1000);
  });

  btn_product_increment.addEventListener('click', function () {
    change_qty.value = parseInt(change_qty.value) + 1000;
  });
</script>

<?php
if (isset($_POST['place_bid'])) {
  $user_id = $_SESSION['user_id']; // Assuming you have a user ID in the session
  $product_id = $_POST['product_id'];
  $bid_amount = $_POST['bid_amount'];

  if (!is_numeric($bid_amount) || $bid_amount <= 0) {
    echo '<script>alert("Invalid bid amount");</script>';
  } else {
    $sql = "INSERT INTO bids (product_id, user_id, bid_amount) VALUES ('$product_id', '$user_id', '$bid_amount')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo '<script>alert("Bid placed successfully");</script>';
    } else {
      echo '<script>alert("Error placing bid");</script>';
    }
  }
}
?>

<?php require_once './includes/footer.php'; ?>

