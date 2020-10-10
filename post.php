<?php
/* Initialize the session */
session_start();

error_reporting(E_ERROR | E_PARSE);

/* Define variables and initialize with empty values */
$comment = "";
$comment_err = "";

$_SESSION['comment'][] = null;

/* Processing form data when form is submitted */
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    /* Check if comment is empty */
    if (empty(trim($_POST["comment"])))
    {
        $comment_err = "Please enter comment.";
    }
    else
    {
        $_SESSION['comments'][] = $_POST["comment"];
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Post</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <?php 
        foreach ($_SESSION['comments'] as &$value) {
            echo "<b>Anonymous: </b>".$value;
            ?><br><?php
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($comment_err)) ? 'has-error' : ''; ?>">
                <label>Comments</label>
                <input type="text" name="comment" class="form-control" value="<?php echo $comment; ?>">
                <span class="help-block"><?php echo $comment_err; ?></span>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
