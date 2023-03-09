<!-- Add New -->
<?php include "connectDB/connectDB.php" ?>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ดูแลระบบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="route_log.php?msg=suc">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">username :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">password :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">ชื่อ :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">สกุล :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="lname" required >
                            </div>
                        </div>

                        <div style="height:10px;"></div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">สถานะ :</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="type" class="form-control" id="" required>
                                    <option value="01">ผู้ดูแลระบบหลัก</option>
                                    <option value="02">ผู้ดูแลระบบย่อย</option>
                                </select>
                            </div>
                        </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>

<!-- EDIT -->

<div class="modal fade" id="edit<?php echo $row['id_user'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
					$edit=mysqli_query($conn,"select * from user where id_user='".$row['id_user']."'");
					$erow=mysqli_fetch_array($edit);
				?>
                <div class="container-fluid">
                    <form method="POST" action="route_log.php?msg=up">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">username :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="username" required value="<?php echo $erow["username"]?>">
                                <input type="hidden" class="form-control" name="id_user" required value="<?php echo $erow["id_user"]?>">
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">password :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password" value="<?php echo $erow["passwordd"]?>" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">ชื่อ :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="fname" value="<?php echo $erow["fname"]?>" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">สกุล :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="lname" value="<?php echo $erow["lname"]?>" required >
                            </div>
                        </div>

                        <div style="height:10px;"></div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">สถานะ :</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="type" class="form-control" id="" required>
                                    <option value="01" <?php if($erow["types"]=="01"){echo "selected";} ?> >ผู้ดูแลระบบหลัก</option>
                                    <option value="02" <?php if($erow["types"]=="02"){echo "selected";} ?>>ผู้ดูแลระบบย่อย</option>
                                </select>
                            </div>
                        </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>


<!-- DELETE -->
<div class="modal fade" id="del<?php echo $row['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">ลบผู้ใช้งาน</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from user where id_user='".$row['id_user']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Username : <strong><?php echo $drow['username']; ?></strong></center></h5> 
                </div> 
				<div class="container-fluid">
					<h5><center>ชื่อ-สกุล : <strong><?php echo $drow['fname']." ".$drow["lname"]; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>ยกเลิก</button>
                    <a href="route_log.php?msg=del&&id_user=<?php echo $row['id_user'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>ลบผู้ใช้งาน</a>
                </div>
				
            </div>
        </div>
    </div>




<?php
// if(isset($_GET["msg"])){
//     $username= $_POST["username"];
//     $password =$_POST["password"];
//     $fname = $_POST["fname"];
//     $lname = $_POST["lname"];
//     $type = $_POST["type"];
//     $sql = "SELECT * from user where username ='$username'";
//     $result = mysqli_query($conn,$sql);
//     $num= mysqli_num_rows($result);
//     if($num>0){
//         echo "<script>window.open('confrim_card.php?msg=404','_self')</script>";
//     }
// }
?>