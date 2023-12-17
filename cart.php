<?php include_once('./includes/headerNav.php'); ?>

<div class="overlay" data-overlay></div>
<!--
    - HEADER
  -->

<header>
  <!-- top head action, search, etc. in php -->
  <!-- inc/topheadactions.php -->
  <?php require_once './includes/topheadactions.php'; ?>
  <!-- desktop navigation -->
  <!-- inc/desktopnav.php -->
  <?php require_once './includes/desktopnav.php' ?>
  <!-- mobile nav in php -->
  <!-- inc/mobilenav.php -->
  <?php require_once './includes/mobilenav.php'; ?>

  <!-- style -->
  <style>
    :root {
      --main-maroon: #CE5959;
      --deep-maroon: #89375F;
    }

    td,
    th {
      text-align: center;
    }

    td img {
      margin-left: auto;
      margin-right: auto;
    }

    .delete-icon {
      color: var(--bittersweet);
      cursor: pointer;
    }

    .child-register-btn {
      margin-top: 20px;
      width: 85%;
      margin-left: auto;
      margin-right: auto;
    }

    .child-register-btn p {
      width: 350px;
      height: 60px;
      background-color: var(--main-maroon);
      box-shadow: 0px 0px 4px #615f5f;
      line-height: 60px;
      color: #FFFFFF;
      margin-left: auto;
      border-radius: 8px;
      text-align: center;
      cursor: pointer;
      font-size: 19px;
      font-weight: 600;
    }

    @media screen and (max-width: 794px) {

      .child-register-btn {
        margin-top: 30px;

      }

      .child-register-btn p {
        width: 100%;
      }
    }
  </style>
</header>

<?php
include "includes/config.php";
$sql1 = "SELECT * FROM bid WHERE customer_id={$_SESSION['id']}";
$result = $conn->query($sql1);
?>

<!--
    - MAIN
  -->

<main>
  <div class="product-container">
    <div class="container">
      <!--
                - SIDEBAR
           -->

      <table>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Highest Bid</th>
          <th>Your Bid</th>
        </tr>

        <?php
        // Loop through the results and display each product
        while ($row = $result->fetch_assoc()) {
          $_SESSION['bidid'] = $row['bid_id'];
          $_SESSION['pdtid'] = $row['product_id'];
          $_SESSION['customer_id'] = $row['customer_id'];
          $_SESSION['bid_amount'] = $row['bid_amount'];

          // Fetch additional details for the current product
          $sql2  = "SELECT * FROM products WHERE product_id={$_SESSION['pdtid']}";
          $result_product = $conn->query($sql2);
          $row_product = $result_product->fetch_assoc();
          $_SESSION['product_name'] = $row_product['product_title'];
          $_SESSION['pdt_img'] = $row_product['product_img'];
          $_SESSION['highest_bid'] = $row_product['product_price'];
          ?>

          <tr>
            <td>
              <img class="cart-product-image" src="./admin/upload/<?php echo $_SESSION['pdt_img'] ?>" alt="">
            </td>
            <td><?php echo  $_SESSION['product_name']; ?></td>
            <td><?php echo  "₩" . $_SESSION['highest_bid']; ?></td>
            <td><?php echo "₩" . $_SESSION['bid_amount']; ?></td>
          </tr>

        <?php
        }
        $conn->close();
        ?>
      </table>
    </div>
  </div>
</main>

 
</main>


<?php require_once './includes/footer.php'; ?>