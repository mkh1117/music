<?php
class view
{
    public static $db;
    public static function connect()
    {
        self::$db = mysqli_connect("localhost", "root", "", "music");
        if (!self::$db) {
            echo 'connection failed';
            return ;
        }
        return self::$db;
    }
    public static function pageination()
    {
        $db = self::$db;
        $query = mysqli_query($db, "SELECT *from input");
        $number = mysqli_num_rows($query);
        $num_of_item = 10;
        $num_of_page = ceil($number / $num_of_item);
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = htmlentities($_GET['page']);
        }
        $tedad1 = ($page - 1) * $num_of_item;
        $query = mysqli_query($db, "SELECT *from input limit $tedad1 , $num_of_item");
        while ($row = mysqli_fetch_array($query)) {
            $picture = $row['picture'];
            $music = $row['music'];
            $text = $row['text'];
            $text1 = $row['text1'];
?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 offset-md-0 col-sm-12 offset-sm-0 col-12 black p-5 d-flex flex-column shadow" style="margin-top:10% ;">
                        <div class="d-flex align-items-center justify-content-between">
                            <i class="fa-solid fa-arrow-up-from-bracket border green border-4 rounded-pill p-2 fs-5 shadow"></i>
                            <i class="fa-solid fa-bars border green border-4 rounded-pill p-2 fs-5 shadow"></i>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mu-5">
                            <img src="pictures/<?php echo $picture; ?>" alt="عکس" class="img-fluid border-green shadow" style="border-radius:50%;width:220px;height:220px;">
                        </div>
                        <div class="text-white text-center "><?php echo $text1; ?><span class="text-green fw-bold fs-5"> از <?php echo $text; ?></span>

                        </div>
                        <audio src="music/<?php echo $music; ?>" controls type="audio/mpeg" class="mx-auto col-md-12 col-12">



                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center" style="margin-top: 10px;">
                <?php

            }
            for ($i = 1; $i <= $num_of_page; $i++) {
                ?>

                    <a class="btn green " href="main.php?page=<?php echo $i ?> " role="button"><?php echo $i ?></a>
                <?php
            }
                ?>
                </div>
            </div>
        <?php
    }
    public static function view()
    {
        $query = mysqli_query(self::$db, "SELECT *from top");
        ?>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">picture</th>
                        <th scope="col">music</th>
                        <th scope="col">name</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                    $id = $row['id'];
                    $picture = $row['picture'];
                    $music = $row['music'];
                    $text = $row['text'];
                ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td class="col-lg-2 col-md-2 col-2"><img src="pictures/<?php echo $picture; ?>" alt="عکس" class="img-thumbnail"></td>
                            <td class="mx-auto col-lg-7 col-md-7 col-7"><audio src="music/<?php echo $music; ?>" controls type="audio/mpeg"></td>
                            <td><?php echo $text; ?></td>
                        </tr>

                    <?php
                }
                    ?>
                    </tbody>
            </table>
        <?php
    }
    public static function top()
    {
        $query = mysqli_query(self::$db, "SELECT *from top");
        ?>
            <div class="container">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $id=$row['id'];
                        $picture = $row['picture'];
                    ?>
                        <a href="/top/<?php echo $id ; ?>">
                            <img src="/pictures/<?php echo $picture ?>" class="rounded col-lg-1 " alt="عکس" style="height: 150px; width:150px;">
                        </a>
                        
                    <?php
                    }
                    ?>
            </div>
    <?php
    }
}
