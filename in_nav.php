
    <!-- NAV BAR -->
    <div id="nav_bar_head">
        <nav class="navbar navbar-expand-lg navbar-light  " style="background-color: rgba(0,0,0,0.8);">
            <div class="container" id="container">
                <!-- Content here -->
                <a class="navbar-brand" href="index.php" id="nav_bar">KW ADMISSION</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" id="nav_bar" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar3" href="calendar.php">กำหนดการณ์รับสมัคร</a>
                        </li>
                        <?php
                        $sql = "select * from status_admission";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        if ($row["status_ad"] == "01") {
                            echo '<li class="nav-item">
                                <a class="nav-link" id="nav_bar4" href="admission.php">สมัครเรียน</a>
                            </li>';
                        }
                        ?>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="nav_bar4" href="admission.php">สมัครเรียน</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="print_ad.php">พิมพ์ใบสมัคร</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="nav_bar2" href="print_card.php">พิมพ์บัตรเข้าห้องสอบ</a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="nav_bar2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ประกาศ</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="sit.php">ประกาศที่นั่งสอบ</a>
                                <a class="dropdown-item" href="result.php">ประกาศผลสอบ</a>
                            </div>
                        </li>


                        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="nav_bar2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

                        <?php
                        if (empty($_SESSION["username"])) {
                            echo "<li class='nav-item'>
                            <a class='nav-link' id='nav_bar5' href='login.php'>เข้าสู่ระบบ</a>
                        </li>";
                        } else {
                            if ($_SESSION["type"] == "01") {
                                $add = '<a class="dropdown-item" href="add_admin.php">เพิ่มผู้ดูแลระบบ</a>
                                <a class="dropdown-item" href="edit_regis.php">แก้ไขใบสมัครเรียน</a>
                                <a class="dropdown-item" href="add_plans.php">เพิ่มแผนการเรียน</a>
                                <a class="dropdown-item" href="check_name.php">เช็คชื่อเข้าห้องสอบ</a>
                                <a class="dropdown-item" href="scroce_student.php">จัดการคะแนนสอบ</a>
                                <a class="dropdown-item" href="admission_result.php">ประกาศคะแนนสอบ</a>
                                <a class="dropdown-item" href="close_admission.php">เปิด/ปิดระบบรับสมัครเรียน</a>';
                            } else {
                                $add = '<a class="dropdown-item" href="edit_regis.php">แก้ไขใบสมัครเรียน</a>
                                <a class="dropdown-item" href="check_name.php">เช็คชื่อเข้าห้องสอบ</a>';
                            }
                            echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="nav_bar2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ' . $_SESSION["username"] . '
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="confrim_card.php">อนุมัติบัตรเข้าห้องสอบ</a>
                              <a class="dropdown-item" href="dow_load_csv.php">ดาวน์โหลดรายชื่อผู้สมัคร</a>
                              ' . $add . '
                            </div>
                          </li>';
                        }
                        ?>
                        <?php
                        if (empty($_SESSION["username"])) {
                        } else {
                            echo "
                                <li class='nav-item'>
                                <a class='nav-link' id='nav_bar6' href='logout.php' style='color:red'>ออกจากระบบ</a>
                                </li> ";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- CLOSE NAVBAR -->