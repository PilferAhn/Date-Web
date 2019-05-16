<div class="col-md-7 col-lg-7 pass-change-div hidden">
            <h1>The person who likes you :</h1>
            <br>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                
                
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">

                                <?php echo '<img src="assets/img/'.$profile_image.'" style="width:260px;height:191px">'; ?>
                                <?php //echo $profile_image; ?>
                                <br>
                                
                                <form method = 'post' action = 'match.php'>
                                
                                    <input type= 'hidden' name = 'email' value = '<?php echo $email ?>'></input>
                                    <input type= 'hidden' name = 'person_who_like_me' value = '<?php echo $person_who_like_me ?>'></input>
                                    <br>
                                    <button class="btn btn-warning" name = 'btn_accept' id="addClass">Accept</button>
                                    
                                    <button class="btn btn-success" name = 'btn_refuse' id="addClass">Refuse</button>
                                    
                                </form>
                            </div>
                            
                            <div class="col-lg-7 col-md-7">

                                <table class="table table-striped">
                                    
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $username; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $gender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                      <td><?php echo $city; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                      <td><?php echo $age; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Occupation</td>
                                        <td><?php echo $occupation; ?></td>
                                    </tr>
                                    
                                </table>

                            </div>

                        </div>
                    </div>
                    <p></p>
                   <div>
                    
                  <?php
                   //go to previous result
                
                   

                            
                
                         if ($page >= $totalPages && $page !=1)
                             {
                                      echo '<button class="btn btn-info" href="#carousel-example-generic" role="button"
                                data-slide="prev">';
                                
                                echo "<a href='?page=".($page - 1)."'<button class='pass' name = 'btn_next' role='button'
                                data-slide='prev'>PREVIOUS
                                </button>";   
                             }
                       
                       else if ($page == $totalPages && $page ==1)
                       {
                           echo "";
                       }
                                      
                           else if ( $page > 1)
                            {
                                          echo '<button class="btn btn-warning" href="#carousel-example-generic" role="button"
                                data-slide="prev">';
                                   echo "<a href='?page=".($page - 1)."'<button class='pass' name = 'btn_next' role='button'
                                data-slide='prev'>Previous
                                </button>";
                                    echo '<button class="btn btn-info" href="#carousel-example-generic" role="button"
                                data-slide="prev">';
                                
                                echo "<a href='?page=".($page + 1)."'<button class='pass' name = 'btn_next' role='button'
                                data-slide='prev'>NEXT
                                </button>"; 
                    
                            }
                            
                        
                    
                            else
                            {
                             
                             
                       
                                echo '<button class="btn btn-info" href="#carousel-example-generic" role="button"
                                data-slide="prev">';
                                
                                echo "<a href='?page=".($page + 1)."'<button class='pass' name = 'btn_next' role='button'
                                data-slide='prev'>NEXT
                                </button>"; 
                                
                            
                            }
                            
            
                            ?>
                
                    
               
                   
                </div>
            <hr>
        </div>
    </div>
</div>