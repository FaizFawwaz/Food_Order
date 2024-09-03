<?php include('partials/menu.php'); ?>

<!--Main Content Section Starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />

                <?php
                    if(isset($_SESSION['add'])) //Checking whether the SESSION is set or not
                    {
                        echo $_SESSION['add']; //Display the session message
                        unset($_SESSION['add']); //Removing session message
                    } 
                ?>
                <br /><br /><br />

                <!-- Button to add Admin -->
                 <a href="add-admin.php" class="btn-primary">Add Admin</a>

                 <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Actions</th>
                    </tr>


                    <?php 
                    //Query to Get all Admin from DB
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the query
                        $res = mysqli_query($conn, $sql);

                        //Check whether the query is executed or not
                        if($res==TRUE)
                        {
                            //Count row to check whether we have data in database or not
                            $count = mysqli_num_rows($res); //Function to get all the row in DB

                            $sn=1; //Create variable and assign the value

                            //Check the num of rows
                            if($count>0)
                            {
                                //We have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //using while loop to get all data in DB
                                    //while loop will run as long as we have data in DB

                                    //Get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //Display the values in our table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>.</td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            <a href="#" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            }

                            else 
                            {
                                //We do not have data in databse
                            }

                        }
                    ?>

                </table>

            </div>
        </div>
<!--Main Content Section Ends-->

<?php include('partials/footer.php'); ?>