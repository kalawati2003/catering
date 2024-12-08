<?php
$obj=db('menu');
if($uid){
    $info= $obj->find($uid);
}
if(isset($_POST['item']))
{
    $info=[
        'item'=>$_POST['item'],
        'description'=>$_POST['description'],
        'category'=>($_POST['category'])?implode(',',$_POST['category']):"",
        'status'=>$_POST['status']
    ];
    if($obj->save($info,$uid)){
    redirect("menu");
   }
   else
   {
    echo "something went wrong!";
}
}  
?>
<div class="alert alert primary h3 text-center">
    Item <?=$uid?"Edit":"Add"?> From
</div>
<form method="post">
    <div class="mb-3">
        <label for="item">Item Name</label>
        <input type="text" class="form-control" placeholder="Enter Item Name" required name="item" id="item" value="<?=$info['item']??''?>">
    </div>
    <div class="mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" placeholder="Enter Item Description" required name="description" id="description"><?=$info['description']??''?></textarea>
    </div>
    <div class="mb-3">
        <label>Select Category <small>(press ctrl for multiple choice)</small></label>
        <?php $opt=explode(',',$info['category']??'');?>
        <select name="category[]" class="form-select" multiple>
            <option value="starter" <?=(in_array('starter',$opt))?'selected':'';?>>Starter</option>
            <option value="platter" <?=(in_array('platter',$opt))?'selected':'';?>>Platter</option>
            <option value="beverage"<?=(in_array('beverage',$opt))?'selected':'';?>>Beverage</option>
            <option value="main course"<?=(in_array('main course',$opt))?'selected':'';?>>Main Course</option>
            <option value="dessert"<?=(in_array('dessert',$opt))?'selected':'';?>>Dessert</option>
            <option value="fast food"<?=(in_array('fast food',$opt))?'selected':'';?>>Fast Food</option>
        </select>
    </div>
    <div class="mb-3">
    <label for="status" >Status</label>
        <select name="status" class="form-select">
            <option value="yes">Yes</option>
            <option value="no" <?=($info['status']=='no')? 'selected':'';?>>No</option>
        </select>
    </div>
    <div class="mb-3" >
        <button class="btn btn-success" value="submit" style="margin-left: 600px;"><?=$uid?"Update":"Save"?></button>
    </div>
</form>
