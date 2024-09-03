<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SESSION is set or not
            {
                echo $_SESSION['add']; //Display the session message id set
                unset($_SESSION['add']); //Removing session message
            } 
        ?>

        <form action="" method="POST">

           <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>

                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>User name: </td>

                    <td>
                        <input type="text" name="username" placeholder="Your User Name">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>

                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

           </table> 

        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

<?php 
    //Process the value from Form and Save it in database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit'])) {
    
        //Button clicked
        //echo "Button Clicked";

        // 1. Get the Data from Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5

        // 2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

// 3. Execute Query and Save Data in Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

// 4. Check whether the (Query is executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data inserted
            //echo "Data Inserted";
            //Create a session Variable to display message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else 
        {
            //Failed to insert
            //echo "Failed to Insert Data";
            //Create a session Variable to display message
            $_SESSION['add'] = "Failed to Add Admin";
            //Redirect page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }

?>