    <?php include './Templates/header.php' ?>
    <?php
        
        $friendName = $friendAge = $friendEmail = $frinedText = '';
        $errors = array('name' => '','email' => '','age' => '', 'text' => '');


        if(isset($_POST['submit'])){

                //Name Vaidation
                if(empty($_POST['friendName'])){
                    $errors['name'] = "Name Is Required";
                }else{
                    $friendName = $_POST['friendName'];
                }

                //Age Validation
                if(empty($_POST['friendAge'])){
                    $errors['age'] = "Age Is Required";
                }else{
                    $friendAge = $_POST['friendAge'];
                }

                //Email Validation
                if(empty($_POST['friendEmail'])){
                    $errors['email'] = "Email Is Required";
                }else{
                    $friendEmail = $_POST['friendEmail'];
                    if(!filter_var($friendEmail,FILTER_VALIDATE_EMAIL)){
                        $errors['email'] = "Email is Not Valid";
                    }
                }
                //Text Validation
                if(empty($_POST['friendText'])){
                    $errors['text'] = "Text Is Required";
                }else{
                    $friendText = $_POST['friendText'];
                }
        
            if(array_filter($errors)){
                
            }
            else{
                $friendName = mysqli_real_escape_string($conn,$_POST['friendName']);
                $friendEmail = mysqli_real_escape_string($conn,$_POST['friendEmail']);
                $friendAge = mysqli_real_escape_string($conn,$_POST['friendAge']);
                $frinedText = mysqli_real_escape_string($conn,$_POST['friendText']);
                
                $sql = "INSERT INTO freinds(friendName,friendAge,friendEmail,friendText)VALUES('$friendName','$friendAge','$friendEmail','$frinedText')";
                
                if(mysqli_query($conn,$sql)){
                    header('Location: index.php');
                }
                else{
                    echo "Error ". mysqli_error($conn);
                }

                mysqli_close($conn);
            }
        
        
        
        
        
        
        
        }















    ?>

    <section id = "addfreind">
        <form action="index.php" method="post" class="p-2 m-2" >
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Friend Name</label>
                <input class="form-control" type="text" placeholder="Enter Name" aria-label="default input example" name="friendName" value="<?php echo $friendName; ?>">
                <div class="erros-represet">
                    <p class="text-danger"><?php echo $errors['name']; ?></p>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Age</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Age" name ="friendAge" value="<?php echo $friendAge; ?>">
                <div class="erros-represet">
                    <p class="text-danger"> <?php echo $errors['age']; ?> </p>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="friendEmail" value="<?php $friendEmail; ?>">
                <div class="erros-represet">
                   <p class="text-danger"> <?php echo $errors['email']; ?></p>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="friendText" value="<?php echo $friendText;?>"></textarea>
                <div class="erros-represet">
                    <p class="text-danger"><?php echo $errors['text']; ?></p>
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-light" name="submit">
            </div>
        </form>
    </section>


    <?php include './Templates/footer.php' ?>