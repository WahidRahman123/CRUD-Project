<?php
require_once "config.php";

$name = $rank = $salary = $email = "";
$name_err = $rank_err = $salary_err = $email_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //Name:
    $input_name = trim($_POST["name"]);
    if(empty($input_name))
    {
        $name_err = "Please enter a valid name.";
    }
    elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $name_err = "Please enter a valid name";
    }
    else
    {
        $name = $input_name;
    }

    //Rank:
    $input_rank = trim($_POST["rank"]);
    if(empty($input_rank))
    {
        $rank_err = "Please enter your rank";
    }
    elseif(!filter_var($input_rank, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^([a-zA-Z' ]+)$/"))))
    {
        $rank_err = "Please enter valid rank";
    }
    else
    {
        $rank = $input_rank;
    }

    //Salary:
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }

    //Email:
    $input_email = trim($_POST["email"]);
    if(empty($input_email))
    {
        $email_err = "Please enter your email addreas.";
    }
    elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL))
    {
        $email_err = "Please enter a valid.";
    }
    else
    {
        $email = $input_email;
    }

    //Checking input errors:
    if(empty($name_err) && empty($rank_err) && empty($salary_err) && empty($email_err))
    {
        $sql = "INSERT INTO info (Name, Rank, Salary, Email) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt,"ssis",$param_name, $param_rank, $param_salary, $param_email);

            //Setting parameters:
            $param_name = $name;
            $param_rank = $rank;
            $param_salary = $salary;
            //$param_gender = $gender;
            $param_email = $email;

            if(mysqli_stmt_execute($stmt))
            {
                header("location: index.php");
            }
            else
            {
                echo "Something went wrong. Please try agein later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Rank</label>
                            <input type="text" name="rank" class="form-control <?php echo (!empty($rank_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $rank; ?>">
                            <span class="invalid-feedback"><?php echo $rank_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>