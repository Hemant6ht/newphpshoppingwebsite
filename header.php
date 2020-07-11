    <div class="wrapper">
        <section id="htc__header" class="htc__header__area header--one">
            <div class="container">
                <div class="row">
                    <div class="menumenu__container clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                            <div class="logo">
                                <a href="index.html"><img src="./server/images/logo.png" alt="logo images"></a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                            <nav class="main__menu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="./index.php">Home</a></li>
                                    <?php for($i=0;$i<$num;$i++)
                                         { $rowarr=mysqli_fetch_assoc($res);
                                        ?>
                                        <li class="drop"><?php echo "<a href='./productlist.php?id=".$rowarr['catid']."'>";  echo $rowarr['catname']; ?></a></li>
                                         <?php }?>
                                    <li><a href="./contact.php">contact</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="./index.php">Home</a></li>
                                        <?php $res=mysqli_query($con,$qry);
                                            $num=mysqli_num_rows($res);
                                            for($i=0;$i<$num;$i++)
                                            { $rowarr=mysqli_fetch_assoc($res);
                                            ?>
                                            <li class="drop"><?php echo "<a href='./productlist.php?id=".$rowarr['catid']."'>";  echo $rowarr['catname']; ?></a></li>
                                            <?php }?>
                                        <li><a href="./contact.php">contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                            <div class="header__right">
                                <div class="header__search search search__open">
                                    <a href="#"><i class="icon-magnifier icons"></i></a>
                                </div>
                                <?php if(isset($_SESSION['user']))
                                {
                                    echo "<div class='header__account'>";
                                    echo "<a href='./logout.php'><i class='icon-lock icons'></i></a>";
                                    echo "</div>";
                                    echo "<div class='header__account'>";
                                    echo "<a href='./orders.php'><i class='icon-envelope icons'></i></a>";
                                    echo "</div>";
                                    echo "<div class='htc__shopping__cart'>";
                                    echo "<a href='./cart.php' class='cart__menu'><i class='icon-handbag icons'></i></a>";
                                    echo '<a href="./cart.php"><span class="htc__qua">2</span></a>';
                                    echo "</div>";
                                }
                                else
                                {
                                    echo "<div class='header__account'>";
                                    echo "<a href='./loginregister.php'><i class='icon-user icons'></i></a>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </section>
    </div>