<?php $this->layout('layout') ?>
<?php $this->start('page-css') ?>
<link rel="stylesheet" href="/assets/css/main.css">
<?php $this->stop(); ?>

<?php $this->start('page-content') ?>
<?php
$display1 = isset($_SESSION["username"]) ? "none" : "block";
$display2 = isset($_SESSION["username"]) ? "block" : "none";
if (isset($_SESSION['username'])) {
    $username = $_SESSION["username"];
}
?>
<!-- Begin container -->
<div class="container">
    <div class="row">
        <h1><i class="fa fa-gamepad"></i>GamePad</h1>
    </div>
    <div class="row">
        <div class="col-3">
            <ul class="nav">
                <div class="profile-user" style="
                        display: <?php echo $display2; ?> ;">
                    <label for="">Username: <?php echo $username ?></label>
                    <label for="">Fullname: <?php echo $_SESSION['fullname']; ?> </label>
                    <label for="">Max score: <?php echo $_SESSION['score'] ?></label>
                </div>
                <li><a href="/">Home</a></li>
                <li><a href="/rules">Rules</a></li>
                <li><a href="/rank">Rank</a></li>
                <li><a href="/signin" class="loginBtn" style="display: <?php echo $display1; ?>;">Sign in</a>
                </li>
                <li><a href="/signout" class="loginBtn" style="display: <?php echo $display2; ?>;">Log Out</a>
                </li>
            </ul>
        </div>
        <div class="col-9">
            <h1>Game: </h1>
            <div class="template">
                <div class="card" style="width: 15em;">
                    <img src="/assets/img/sudoku.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sudoku</h5>
                        <p class="card-text">Sudoku là trò chơi logic, yêu cầu điền số từ 1 đến 9 vào lưới 9x9 sao cho
                            mỗi hàng, cột và vùng 3x3 không trùng số.</p>
                        <a href="/sudoku" class="btn btn-dark" title="Chơi">Play</a>
                    </div>
                </div>
                <div class="card" style="width: 15rem;">
                    <img src="/assets/img/bomb.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Minesweeper - Bomb</h5>
                        <p class="card-text">Trò chơi gỡ mìn. Luật chơi là gỡ hết ô không gặp mìn là thắng. Game quá dễ
                            phá đảo ngay thôi</p>
                        <a href="/bomb" class="btn btn-dark" title="Chơi">Play</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->stop(); ?>
    <?php $this->start('page-footer') ?>
    <div class="row" id="footer">
        <?php
        if (isset($_SESSION['updatescore'])) {
            $notication = $_SESSION['updatescore'];
            echo "<script>alert('$notication')</script>";
        }
        ?>
        <p>Develop by Chau So Na</p>
        <p>Contact: nab2205890@studen.ctu.edu.vn <i class="fa fa-envelope"></i></p>
        <p>Phone: 0374349105 <i class="fa fa-phone"></i></p>
    </div>
</div>
<!-- END container -->
<?php $this->stop() ?>