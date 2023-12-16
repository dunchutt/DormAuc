<?php 
    include_once('sell_headerNav.php');
    
 ?>
 <head>
     <style>
        .content-box-post {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
         .addpost{
            border: 1px solid black;
            width: 80%;
            padding: 25px;
            border-radius: 16px;
            background-color: #f1f1f1;
         }

     </style>
 </head>
<div class="content-box-post">
    
 <div class="addpost">
 <h1>Add post here</h1>

  <!-- Form -->
    <form
      action="sell_save_post.php"
      method="POST"
      enctype="multipart/form-data"
      class="row g-3"
    >
      <div class="col-12">
        <label for="inputAddress" class="form-label">Title</label>
        <input
          name="prod-title"
          type="text"
          class="form-control"
          placeholder="Product Name..."
          required="required"
        />
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Price</label>
        <input
          name="prod-price"
          type="number"
          class="form-control"
          value=""
          required="required"
        />
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Deadline</label>
        <input
          name="prod-deadline"
          type="date"
          class="form-control"
          required="required"
        />
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"
          >Description</label
        >
        <textarea
          class="form-control"
          rows="3"
          name="prod-desc"
          required="required"
        ></textarea>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">No. of Items</label>
        <input
          type="number"
          class="form-control"
          name="noofitem"
          value=""
          required="required"
        />
      </div>
      <div class="col-md-6">
        <label for="inputState" class="form-label">Category</label>
        <select name="prod-category" value="" class="form-select">
          <option value="bedding_set">Bedding Set</option>
          <option value="accessories">Accessories</option>
          <option value="laundry">Laundry</option>
          <option value="utensils">Utensils</option>
          <option value="organisers">Organisers</option>
          <option value="stationery">Stationery</option>
          <option value="electronics">Electronics</option>
          <option value="clothing and shoes">Clothing and Shoes</option>
        </select>
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Image</label>
        <input
          type="file"
          name="prod-img"
          class="form-control"
          required="required"
        />
      </div>
      <div class="form-check">
        <input
          class="form-check-input"
          type="radio"
          name="flexRadioDefault"
          id="flexRadioDefault2"
        />
        <label class="form-check-label" for="flexRadioDefault2">
          Available
        </label>
      </div>
      <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
                  <!--/Form -->
 </div>
</div>




