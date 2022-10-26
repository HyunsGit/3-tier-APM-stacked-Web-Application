<!DOCTYPE html>
<html>
<head>
    <title>CLOUD WEB</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google WEB Font URL : https://fonts.google.com/?subset=korean&selection.family=Nanum+Gothic -->
    <!-- Nanum 고딕체중 마음에 드는거 선택 후 해당 링크를 HTML 코드에 삽입 -->
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
    .navbar {
        font-size: 15px;
        margin-bottom: 0;
        border-radius: 0;
    }
    .carousel-inner > .item > img {
        width:1200px;
        height:600px;
    }
    .modal-content {
        font-size: 15px; 
        margin: 0;
        padding: 0;
    }
    .navbar-brand {
        background-color:#000000
    }
    </style>

</head>

<body style="font-family: 'Nanum Gothic', sans-serif;">
    <!-- Navigation Bar Container -->
    <div class="container">
    <div class="row">
        <div class="col-sm-12">   
        <nav class="navbar navbar-inverse">
            <div class="container-fulid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="../index_auth.html">
                        <img style="max-width:45px; margin-top: -13px;" src="../images/logo.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="MyNav">
                <ul class="nav navbar-nav">
                    <li><a href="../index_auth.html">HOME</a></li>
                    <li><a href="./board.php">BULLETIN BOARD</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">LAPTOP STORE LINK <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://www8.hp.com/kr/ko/laptops/laptops-and-2-in-1s.html" target="_blank">HP STORE</a></li>
                            <li><a href="https://www.apple.com/kr/mac" target="_blank">APPLE STORE</a></li>
                            <li><a href="https://www.dell.com/ko-kr" target="_blank">DELL STORE</a></li>
                            <li><a href="https://www.microsoft.com/ko-kr/surface/devices/surface-book-2?activetab=surface_book_2_pivot%3aprimaryr3" target="_blank">MS STORE</a></li>                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>  LOGOUT</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </div>
    </div><br>

    <!-- Carousel Container --> 
    <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0"></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item">
                <img src="../images/carousel_1.jpg" alt="Laptop_1">
                <div class="carousel-caption">
                    <h3><strong>Best Laptop Customize</strong></h3>
                    <h4>Laptop Touch Pad</h4>
                </div>
            </div>

            <div class="item active">
                <img src="../images/carousel_2.jpg" alt="Laptop_2">
                <div class="carousel-caption">
                    <h3><strong>Best Laptop Customize</strong></h3>
                    <h4>Laptop Key Skin</h4>
                </div>
            </div>

            <div class="item">
                <img src="../images/carousel_3.jpg" alt="Laptop_3">
                <div class="carousel-caption">
                    <h3><strong>Best Laptop Customize</strong></h3>
                    <h4>Laptop Touch Pad</h4>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span> 
        </a>
    </div>
    </div>
    <br><br>

    <!-- Board_list -->
    <div class="container">
    <h1>Bulletin Board</h1><br><br>
    <table class="table">
        <thead>
            <tr style="font-size:12pt;">
                <th class="col-md-1 text-center">No</th>
                <th class="col-md-5 text-center">Title</th>
                <th class="col-md-3 text-center">User Name</th>
                <th class="col-md-3 text-center">Date Created</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <?php
                require_once("./db_con.php");
                $board_list_sql = "SELECT * FROM board";
                $total_row_check = $conn->query($board_list_sql);
                $total_row = $total_row_check->num_rows;
    
                
                if (isset($_GET["page"])){
                    $start = $_GET["page"] * 10;
                    $page_sql = "SELECT * FROM board ORDER BY No DESC LIMIT $start, 10";
        
                } else {
                    $page_sql = "SELECT * FROM board ORDER BY No DESC LIMIT 10";
                }


                $result = $conn->query($page_sql);
                $flag = 1;
                while ($row = $result->fetch_assoc()){                  
                    if ($flag == 1 or $flag == 6) {
                        $st = "success";
                    }
                    else if ($flag == 2 or $flag == 7) {
                        $st = "danger";
                    }
                    else if ($flag == 3 or $flag == 8) {
                        $st = "info";
                    }
                    else if ($flag == 4 or $flag == 9) {
                        $st = "warning";
                    }
                    else {
                        $st = "active";
                    }
                    print "<tr class='$st'>";
                        print "<td>$row[No]</td>";
                        print "<td><a style='color: black;' href='./board_read.php?page=$row[No]'>$row[Title]</a></td>";
                        print "<td>$row[Userid]</td>";
                        print "<td>$row[Date]</td>";
                    print "</tr>";
                    $flag++;
                }
                
                $page_count = (int)($total_row / 10);
                if ($total_row % 10){ 
                    $page_count++;
                }
                $page_count--;

                if (isset($_GET['page'])) { 
                    $page = $_GET['page']; 
                } else $page = 0;
                ?>

                <tr>
                <td colspan=12>
                    <ul class="pager">
                    <div class='row'><br>
                        <div class='col-sm-5' style='text-align:right;'>
                        <li class="<?php if ($page == 0) echo 'disabled'; ?>">
                            <?php 
                                if ($page == 0) {
                                ?>
                                    <a>Previous</a>
                                <?php
                                } else {
                                ?>
                                    <a style='color: black;' href="./board.php?page=<?php echo ($page - 1); ?>">Previous</a>
                                <?php
                                }
                            ?>
                        </li>
                        </div>
                        
                        <div class='col-sm-2' style='text-align:center;'>
                        <li style='font-size:14pt;'><kbd><?php echo ($page + 1) . ' of ' . ($page_count + 1); ?></kbd></li>
                        </div>
                        
                        <div class='col-sm-2' style='text-align:left;'>
                        <li class="<?php if ($page >= $page_count ) echo 'disabled'; ?>">
                            <?php 
                                if ($page >= $page_count) {
                                ?>
                                    <a>Next</a>
                                <?php
                                } else {
                                ?>
                                    <a style='color: black;' href="./board.php?page=<?php echo ($page + 1); ?>">Next</a>
                                <?php
                                }
                            ?>
                        </li>
                        </div>

                        <div class='col-sm-3' style='text-align:center;'>
                            <li><a style='color: black;' data-toggle="modal" data-target="#Modal_Write">WRITE</a></li>    
                        </div>
                    </div>
                    </ul>
                    </td>
                </tr>
        </tbody>
    </table>
    <br>
    </div>

    <!-- WRITE Modal Container -->
    <div class="container">
    <div class="modal fade" id="Modal_Write" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">WRITE</h4>
        </div>

        <div class="modal-body">
        <div class="container">
        <form class="form-horizontal" action="./board_write.php" method="POST" name="board_write-form"> 
            <div class="form-group">
                <label style="text-align:left" for="title" class="col-sm-2 control-label">TITLE</label>
                <div class="col-sm-6">
                    <input class="form-control" name="title" id="title" maxlength="20" type="text" autofocus placeholder="Title Input" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="pw" class="col-sm-2 control-label">CONTENT</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="20" name = "content" id="content" maxlength="100" type="text" placeholder="Content Input" required autocomplete="off"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="date" class="col-sm-2 control-label">DATE</label>
                <div class="col-sm-6">
                    <input class="form-control" type="date" id='date' name="date" readonly>
                    <script>document.getElementById('date').value = new Date().toISOString().slice(0,10);</script>
                </div>
            </div>
        </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-default">WRITE</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
        </div>
        </form>
        </div>
        </div>
    </div>
    </div>


    <!-- 고객센터 Container -->
    <div id="contact" class="container">
    <h3>QUESTION</h3><br>
    <div class="row">
  
    <div class="col-md-4">
        <p><span class="glyphicon glyphicon-map-marker"></span> Seoul, KR</p>
        <p><span class="glyphicon glyphicon-phone"></span> Phone: +82 1544-0000</p>
        <p><span class="glyphicon glyphicon-envelope"></span> Email: cloud@cloud.com</p>
    </div>

    <div class="col-md-8">
        <div class="row">
        <form action="#" method="POST" name="service-form"> 
        <div class="col-sm-6 form-group">
            <input class="form-control" id="name" maxlength="10" placeholder="Name" type="text" required autocomplete="off">
        </div>
        <div class="col-sm-6 form-group">
            <input class="form-control" id="email" maxlength="40" placeholder="Email" type="email" required autocomplete="off">
        </div>
        </div>

        <textarea class="form-control" id="comments" maxlength="100" placeholder="Comment" rows="5" required autocomplete="off"></textarea>
        <br>
        <div class="row">
        <div class="col-md-12 form-group">
            <button class="btn pull-right btn-default" type="submit">SEND</button>
        </div>
        </div>
        </form>
    </div>
    </div>

    <!-- footer Container -->
    <footer class="container text-center">
        <p><span>Cloud System Test Site<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>

