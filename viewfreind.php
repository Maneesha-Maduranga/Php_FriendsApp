
<?php include './Templates/header.php' ?>

    <?php 
      //Sql statements
      $sql = "SELECT * FROM freinds";
      //store values in result
      $result = mysqli_query($conn,$sql);
      //represent as Array
      $friends = mysqli_fetch_all($result,MYSQLI_ASSOC);
      //free the memory
      mysqli_free_result($result);
      //close connection
      mysqli_close($conn);
  
  ?>

    <div class="container">
        <div class="row p-2">
          <?php foreach($friends as $item): ?>
          <div class="col-sm-4 p-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item['friendName']; ?></h5>
                  <h6 class="card-subtitle mb-2"><?php echo $item['friendEmail']; ?></h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">More-Info</a>
                </div>
              </div>
          </div>
          <?php endforeach ?>
        </div>
    </div>
    
<?php include './Templates/footer.php'?>