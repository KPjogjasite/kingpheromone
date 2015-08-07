<?php
class Login{
  function __construct(){
    include "../josys/koneksi.php";
  }
  function anti_injection($data){
    $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
    return $filter;
  }
  
  function check($username, $password){
    if (!ctype_alnum(self::anti_injection($username)) OR !ctype_alnum(self::anti_injection(md5($password)))){
      return 0;
    }
    else return 1;
  }
  function loggingin($username, $password){
    //include "../josys/koneksi.php";
    $password = md5($password);
    if (self::check($username, $password)){
      $sqlquery=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' AND blokir='N'");
      $ketemu=mysql_num_rows($sqlquery);
      $r=mysql_fetch_array($sqlquery);
      print_r($r);
      // Apabila username dan password ditemukan
      if ($ketemu > 0){
        session_start();
        $_SESSION['namauser']     = $r['username'];
        $_SESSION['namalengkap']  = $r['nama_lengkap'];
        $_SESSION['passuser']     = $r['password'];
        $_SESSION['leveluser']    = $r['level'];
        $sid_lama = session_id();
        
        session_regenerate_id();

        $sid_baru = session_id();

        mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
        return 1;
      }
    }
    return 0;
  }
  function logout(){
    session_start();
    session_destroy();
    echo "<script>alert('ANDA SUDAH KELUAR'); window.location = '../index.php'</script>";
  }
  function islogin(){
    if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
      return 1;
    }
    return 0;
  }
}
$login = new Login;
if (isset($_POST['login'])){
  if ($login->loggingin($_POST['username'], $_POST['password'])){
    header('location:media.php?module=halamanadmin');
  }
  else {
    echo "<link href='../style.css' rel='stylesheet' type='text/css' />";
    echo " <br />
    <br /> <br />
    <br /> <br />
    <br /> <br />
    <br /><div align='center'><div id='content'>
    <div align='center'><br /> 
      <table width='303' border='0' cellpadding='0' cellspacing='0' class='form5'>
        <tr>
          <td>
            <div align='center'><a href='javascript:history.go(-1)'><b><img src='../jolibs/icon/stop.png' width='250' height='250' border='0'/></b></a><br />
              USERNAME DAN PASSWORD ANDA SALAH... <br />
              <a href='javascript:history.go(-1)'><b>Ulangi Lagi</b></a> Sekali lagi 
            </div>
          </td>   
        </tr>
      </table>
      <br /> 
      <br />
    </div> 
    </div>";
  }
  exit;
}
if (isset($_GET['logout'])){
    session_start();
    session_destroy();
    echo "<script>alert('ANDA SUDAH KELUAR'); window.location = '../index.php'</script>";
}
?>
