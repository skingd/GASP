<?php




 echo '
 <div>
 <span> <a href="#" data-toggle="modal" data-target="#achInfo">
        <img src="depend/images/' . $row['ach_image'] . '"</span></a>';
        
        
        
       
        
    
   echo '
   </div>
   ';
?>


                    
                            <!-- Modal -->
                            <div class="modal fade" id="achInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $row['ach_name'] . $row['ach_value'];?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $row['ach_desc']; ?>
                                            <br>
                                            <?php echo "Created By: " . $row['user_name']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                    