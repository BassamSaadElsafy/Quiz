<div class="container mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b><?php echo $current_question->get_question(); ?> ?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
            
            <form action="index.php" method="POST"> 
         
                <?php foreach($current_question->get_options() as $option) {?>
                    <label class="options"><?php echo $option;?> <input type="radio" name="selected_item" value="<?php echo $option;?>"> <span class="checkmark"></span> </label>
                <?php } ?>
                <div class="d-flex align-items-center pt-3">
                    <input type="submit" class="btn btn-primary mr-5" value="Previous" name="prev" /> 
                    <input type="submit" class="btn btn-success ml-5" value="Next" name="next" /> 
                </div>

            </form>
            
            
        </div>
    </div>
	

</div>
<script>


</script>