
<html>

    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="resources/main.css">
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <body>
        <center>

            <h2> Exam End! </h2>
            <?php if(isset($_SESSION["true_answers"])){?>
                
                <h2> Your score: <?php echo count($_SESSION["true_answers"]) . "/" . ($exam->getQuestion_number());?> </h2>
            
            <?php } ?>
        
        </center>
        
        <?php

            if(isset($_SESSION["true_answers"])){

                if(count($_SESSION['true_answers']) < 3 ){
                    echo   '<div class="alert alert-danger" role="alert" style="text-align:center">
                                Sorry, You failed :(
                            <a href="/quiz/index.php" class="btn btn-info btn-sm">Try Again</a></div>';
                }else if(count($_SESSION['true_answers']) >= 3 && count($_SESSION['true_answers']) < 5  ){
                    echo '<div class="alert alert-success" role="alert" style="text-align:center">
                    congratulations, You passed the Exam :)
                    <a href="/quiz/index.php" class="btn btn-info btn-sm">Improve Your Degree</a></div>';
                }else{
                    echo '<div class="alert alert-success" role="alert" style="text-align:center">
                    congratulations, Full Marks :)
                    <img src="./resources/images/congrats.gif" width="50" /img> </div>';
                }

            }

        ?>
     

    </body>

</html>
 