<?php include "connectDB/connectDB.php"?>
    <div class="modal fade" id="del<?php echo $row['id_card']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from user where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Username: <strong><?php echo $drow['username']; ?></strong></center></h5> 
                </div> 
				<div class="container-fluid">
					<h5><center>Name: <strong><?php echo $drow['name_surname']; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="deleteuser.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>