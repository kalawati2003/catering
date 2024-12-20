<?php
islogin();
$obj=db('menu')->all();
if(isset($_POST['del'])){
    $delid= implode(',',$_POST['del']);
    db('menu')->delete($delid);
    Session::set('getdata',"data deleted successfully");
    redirect('menu');
    exit;
}
?>
<div style="margin-bottom:5px;">
    <a href="<?=ROOT;?>menu/form" class="btn btn-primary" > Add item</a>
</div>
<?php
if($msg=Session::get('getdata')){
    print_r($msg);
?>
<div class="alert alert-success text-center h3"><?=$msg;?></div>
<?php
Session::delete('getdata');
}?>

<form method="post">
<table class="table table-stripted" id="example">
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            <th><input type="checkbox" id="all" onclick="checkdel(this)"><label for="all">All</label></th>
            <th>Item Name</th>
            <th>Picture</th>
            <th>Categories</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index=0;
        foreach($obj as $info) { ?>
        <tr>
            <td><?=++$index;?></td>
            <td><input type="checkbox" name="del[]" onclick="displaybtn()" class="delc" value="<?=$info['id'];?>"></td>
            <td><a class="btn btn-warning" href="<?=ROOT;?>menu/form/<?=$info['id'];?>" title="click for edit"><?=$info['item'];?></a></td>
            <td><?php if($info['picture'])
            {?>
            <img src="<?=ROOT.'public/images/'.$info['picture'];?>" height="120px">
            <?php } else
            {
                echo "<span class='text-muted'>N/A</span>";
            }?></td>
            <td><?=$info['category'];?></td>
            <td><?=$info['description'];?></td>
            <td><?=$info['status'];?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<div id="dem" style="display:none">
<button class="btn btn-danger" onclick="return confirm('do you really want to delete these items')" >Delete Selected Items</button>
</div>
</form>
