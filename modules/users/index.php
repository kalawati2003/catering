<?php
// echo md5('accountpwd12');
if(Session::get('author'))
{
    redirect('menu');
    exit;
}
$error= null;

if(!isset($_POST['username']))
{
if(Session::get('attempt') && Session::get('attempt') == BNO)
{
    if(!isset($_COOKIE['isblock']))
    {
        Session::delete('attempt');
        Session::delete('blockerror');
    }
}
?>

<?php }

if(isset($_POST['username']))
{
    if((Session::get('attempt') ?? 0) < BNO)
    {
    extract($_POST);
    $username=addslashes($username);    //for preventing sql injection
    $password=md5($password);
    if(trim($username))
    {
        $sql ="select id,username,password from users where username = '$username'";
        $data = db('users')->custom($sql,0);
        if($data && is_array($data) && $data['password']==$password)
        {
            Session::set('author',$data);
            redirect('menu');
        }
        else
        {
            Session::set('attempt',(Session::get('attempt')? (Session::get('attempt')+1) : 1));
            $error="enter valid username and password";
        }
    }
    else{
        $error= "enter username and password";
    }
}
else
{
    if(!isset($_COOKIE['isblock']))
    {
        $tval = time() + TIME;
        setcookie('isblock',$tval-1, $tval);
    }
    Session::set('blockerror',"you are Blocked");
    $counter=TIME;
    echo <<<JS

<script>
    let i = $counter;
    setInterval(() =>{
        if(i==0)
        location.href=location.href;
    timer.innerHTML = `00:`+i;
    i--;
    }, 1000);
</script>
JS;
}
}
// echo Session::get('attempt');
 

// kalawati ka password hai sachinSoni
//sachin ka password hai kalawatiSoni
?>
<form method="post">
<div class="cont">
<div class="pagetitle">
    Login <span>From</span>
 </div>
 <?php if($error or Session::get('blockerror'))
        {?>
        <div class="alert alert-danger"><?=$error;?><?=Session::get('blockerror');?> <span id="timer"></span></div>
        <?php } ?>
    <div class="mb-3">    
        <label for="username">Username:-</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
    </div>

    <div class="mb-3">    
        <label for="password">Password:-</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
    </div>
    <div class="mb-3 text-center">
        <button class="btn btn-warning">Login</button>
    </div>
</div>
</form>