<?php
$obj=db('menu')->all();
if(isset($_POST['del'])){
    $delid= implode(',',$_POST['del']);
    db('menu')->delete($delid);
    redirect('menu');
}
?>
<div>
    <a href="<?=ROOT;?>menu/form" class="btn btn-primary"> Add item</a>
</div>
<form method="post">
<table class="table table-stripted" id="example">
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            <th><input type="checkbox" id="all" onclick="checkdel(this)"><label for="all">All</label></th>
            <th>Item Name</th>
            <th>Categories</th>
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
            <td><a href="<?=ROOT;?>menu/form/<?=$info['id'];?>" title="click for edit"><?=$info['item'];?></a></td>
            <td><?=$info['category'];?></td>
            <td><?=$info['status'];?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<div id="dem" style="display:none">
<button class="btn btn-danger" onclick="return confirm('do you really want to delete these items')" >Delete Selected Items</button>
</div>
</form>
