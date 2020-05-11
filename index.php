<?php
    include_once("functions.php");
    $task = "encode";
    if(isset($_GET['task']) && !empty($_GET['task'])){
        $task = $_GET['task'];
    }

    $key = "abcdfghijklmnopqrstuvwxyz1234567890";
    // generate key
    if("key" == $task){
        $keyOriginal = str_split($key);
        shuffle($keyOriginal);
        $key = join("",$keyOriginal);
    }else if(isset($_POST['key']) && !empty($_POST['key'])){
        $key = $_POST['key'];
    }


    // encode data
    if("encode" == $task){
        if(isset($_POST['data']) && !empty($_POST['data'])){
            $originalData = $_POST['data'];
            $scrambleData =  scrambleData($originalData,$key);
        }
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info font-weight-bold text-center text-uppercase">
                        Data Scramber Mini Project For ( Procedural PHP )
                    </div>
                    <div class="card-body">
                        <div class="form-group">                                
                            <a href="index.php?task=encode" class="btn btn-sm btn-info">Encode</a> / 
                            <a href="index.php?taks=decode" class="btn btn-sm btn-success">Decode</a> /
                            <a href="index.php?task=key" class="btn btn-sm btn-warning" >Generate Key</a>
                        </div>
                        <form method="POST" action="index.php">   
                            <div class="form-group">
                                <label for="key">Key</label>
                                <input type="text" class="form-control" id="key" name="key" <?php showGenerateKey($key); ?> >
                            </div>
                            <div class="form-group">
                                <label for="data">Data</label>
                                <textarea class="form-control" name="data" id="data" cols="30" rows="3"><?php echo ($_POST['data'])??'' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="result">Result</label>
                                <textarea class="form-control" name="result" id="result" cols="30" rows="3"><?php echo ($scrambleData)??''; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>