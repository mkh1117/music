<?php
class upload
{
  public static $adress;
  public static $adress1;
  public static $text,$text1;
  public static $check, $check1, $check2;
  public static function picture($top_check)
  {
    if (isset($_FILES['pitcure'])) {
      self::$check = 0;
      $alowextenions = array('gif', 'jpg', 'jpeg', 'png');
      $filextention = explode('.', $_FILES['pitcure']['name']);
      $extenion = end($filextention);
      foreach ($alowextenions as $alowextenion) {
        if ($alowextenion == $extenion) {
          self::$check = true;
        }
      }
      if (!self::$check) {
        echo 'فایل انتخاب شده عکس نیست.';
      }


      if (self::$check) {
        $rand = bin2hex(random_bytes(10));
        move_uploaded_file($_FILES['pitcure']['tmp_name'], 'C:\Users\Behbab\Desktop\laravel2\music\public\pictures/' . $rand . '.' . $extenion);
        self::$adress = $rand . '.' . $extenion;
        if($top_check){
        $_SESSION['pikcher'] = self::$adress;
?>
        <img src="pictures/<?php echo $_SESSION['pikcher'];  ?>" alt="عکس" class="pitcure">
      <?php
        }
      }
    } else {
      echo 'عکسی انتخاب نکردید!';
    }
  }
  public static function music($top_check)
  {
    if (isset($_FILES['music'])) {
      self::$check1 = 0;
      $alowextenions = array('wma', 'mp3', 'wav');
      $filextention = explode('.', $_FILES['music']['name']);
      $extenion = end($filextention);
      foreach ($alowextenions as $alowextenion) {
        if ($alowextenion == $extenion) {
          self::$check1 = true;
        }
      }
      if (!self::$check1) {
        echo 'فایل انتخاب شده آهنگ نیست.';
      }
      if (self::$check1) {
        move_uploaded_file($_FILES['music']['tmp_name'], 'C:\Users\Behbab\Desktop\laravel2\music\public\music/' . $_FILES['music']['name']);
        self::$adress1 = $_FILES['music']['name'];
        if($top_check){
        $_SESSION['music'] = self::$adress1;
      ?>
        <audio controls>
          <source src="music/<?php echo $_SESSION['music']; ?>" type="audio/mpeg">
        </audio>
<?php
        }
      }
    } else {
      echo 'آهنگی انتخاب نکردید!';
    }
  }
  public  static function text($top_check)
  {
    if (isset($_POST['text']) and isset($_POST['text1'])) {
      self::$check2 = true;
      self::$text = htmlentities($_POST['text']);
      self::$text1 = htmlentities($_POST['text1']);
      $_SESSION['text'] = self::$text;
      $_SESSION['text1'] = self::$text1;
      if($top_check){
      echo "<p>" . $_SESSION['text'] . ' ' .$_SESSION['text1'] ."</p>";
      }
    } else {
      echo 'متن خالی است!';
      self::$check2 = 0;
    }
  }
  public static function query($db)
  {
    if (self::$check and self::$check1 and self::$check2) {
      $picture = self::$adress;
      $music = self::$adress1;
      $text = self::$text;
      $text1 = self::$text1;
      mysqli_query($db, "INSERT INTO input(picture,music,text,text1) VALUES('$picture','$music','$text','$text1')");
    }
  }
public static function top($db,$id){
  if (self::$check and self::$check1 and self::$check2) {
    $picture = self::$adress;
    $music = self::$adress1;
    $text = self::$text;
    mysqli_query($db,"UPDATE top SET picture='$picture',music='$music',text='$text' WHERE id=$id");
  }
}
}
?>

<style>
  .pitcure {
    width: 200px;
    height: 200px;
    border: 2px solid black;
    border-radius: 50px;
  }
</style>