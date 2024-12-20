<?php
$obj=db('menu')->all();
?>
<form method="post">
<table class="table table-stripted" id="example">
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
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
            <td><?=$info['item'];?></td>
            <td><?php if($info['picture'])
            {?>
            <img src="<?=ROOT.'public/images/'.$info['picture'];?>" height="110px">
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
