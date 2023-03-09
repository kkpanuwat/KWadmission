<!-- Add New -->
<?php include "connectDB/connectDB.php" ?>
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนการเรียน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="add_plans_model.php?msg=add">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">ชื่อแผนการเรียน :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="plans_name" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">สำหรับนักเรียนชั้น :</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="for_level" class="form-control" required>
                                    <option value="M1">นักเรียนชั้นมัธยมศึกษาปีที่ 1 </option>
                                    <option value="M4">นักเรียนชั้นมัธยมศึกษาปีที่ 4 </option>
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

<div class="modal fade" id="edit<?php echo $row['plans_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขแผนการเรียน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $a = $row["plans_id"];
                    $sql = "select * from lesson_plans where plans_id='$a'";
                    $edit =mysqli_query($conn,$sql);
                    $erow=mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" action="add_plans_model.php?msg=edit">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">ชื่อแผนการเรียน :</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="plans_name" value="<?php echo $erow["plans_name"]?>" required>
                                <input type="hidden" class="form-control" name="plans_id" value="<?php echo $erow["plans_id"]?>" required>
                            </div>
                        </div>

                        <div style="height:10px;"></div>

                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">สำหรับนักเรียนชั้น :</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="for_level" class="form-control" required>
                                    <option value="M1" <?php if($erow["for_level"]=="M1"){echo "selected";}?>>นักเรียนชั้นมัธยมศึกษาปีที่ 1 </option>
                                    <option value="M4"  <?php if($erow["for_level"]=="M4"){echo "selected";}?>>นักเรียนชั้นมัธยมศึกษาปีที่ 4 </option>
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
<div class="modal fade" id="del<?php echo $row['plans_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
				<center><h4 class="modal-title" id="myModalLabel">ลบแผนการเรียน</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($conn,"select * from lesson_plans where plans_id='".$row['plans_id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>ชื่อแผนการเรียน : <strong><?php echo $drow['plans_name']; ?></strong></center></h5> 
                </div> 
				<div class="container-fluid">
					<h5><center>สำหรับนักเรียนชั้น : <strong><?php if($drow["for_level"]=="M1"){echo "นักเรียนชั้นมัธยมศึกษาปีที่ 1 ";}else{echo "นักเรียนชั้นมัธยมศึกษาปีที่ 4 ";}; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>ยกเลิก</button>
                    <a href="add_plans_model.php?msg=del&&plans_id=<?php echo $row['plans_id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>ลบแผนการเรียน</a>
                </div>
				
            </div>
        </div>
    </div>