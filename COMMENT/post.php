<?php

session_start();

require_once 'Config/Functions.php';
$Fun_call = new Functions();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_uni_no'])){
    header('Location:index.php');
}

$select_post = $Fun_call->select_order('poster','p_id');

$field['u_uni_no'] = $_SESSION['user_uni_no'];
$sel_user_img = $Fun_call->select_assoc('user',$field);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f124118c9b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Stylesheet.css">
</head>
<body>
    
    <div class="container mt-2 mb-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><b>COMMENT SYSTEM</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline ml-auto">
                    <div class="user-area">
                        <img src="Images/User/<?php echo $sel_user_img['u_image']; ?>" alt="User Image">
                    </div>
                    <a href="logout.php" class="logout my-2 my-sm-0"><i class="fas fa-power-off fa-2x"></i></a>
                </form>
            </div>
        </nav>
    </div>

    <div class="cintainer-fluid">
        <div class="container">
            <div class="row">
                <?php if($select_post){ foreach($select_post as $select_post_data){ ?>
                <div class="col-sm-6 mt-2 mb-2">
                    <div class="card">
                        <img src="Images/Post/<?php echo $select_post_data['p_image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $select_post_data['p_name']; ?></h5>
                            <p class="card-text"><?php echo substr($select_post_data['p_text'], 0, 200).'&nbsp;.......'; ?></p>
                            <a href="post_view.php?post_uni_no=<?php echo $select_post_data['p_uni_no']; ?>" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>  
                <?php }} ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>