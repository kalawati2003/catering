<?php
islogin();
$obj=db('menu');
if($uid){
    $info= $obj->find($uid);
    $picture=$info['picture'];
}
if(isset($_POST['item']))
{
    $valid=1;
    if($_FILES['picture']['error']==0)
    {
         if('image'==substr($_FILES['picture']['type'],0,strpos($_FILES['picture']['type'],'/')))
         {
            //also validate the size of image
            if(isset($picture))
                unlink("public/images/$picture");
            $picture=time()."_".$_FILES['picture']['name'];
            move_uploaded_file($_FILES['picture']['tmp_name'],'public/images/'.$picture);
         }
         else{
                $valid=0;
                $err="File type is not image type!";
         }
    }
    if($valid)
    {

    $info=[
        'item'=>$_POST['item'],
        'description'=>$_POST['description'],
        'category'=>($_POST['category'])?implode(',',$_POST['category']):"",
        'status'=>$_POST['status'],
        'picture'=>$picture
    ];
    if($obj->save($info,$uid)){
        Session::set('getdata',"data ".($uid?"updated":"saved")." successfully");
    redirect("menu");
   }
   else
   {
    $err= "something went wrong!";
  }
 }
}  
?>
<div class="alert alert-info h3 text-center">
    Item <?=$uid?"Edit":"Add"?> From
</div>
<?php 
if(isset($err))
{?>
<div class="alert alert-secondary" style="color:red;"><?=$err;?></div>
<?php } ?>
<form method="post" enctype="multipart/form-data">
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
            <option value="no" <?=(($info['status']??"")=='no')?'selected':'';?>>No</option>
        </select>
    </div>
    <?php
  if(isset($picture))
  {?>
    <div class="mb-3">
  <label for="pic" class="form-label">Uploaded picture</label>
  <div class="form-control"><img src="<?=ROOT.'public/images/'.$picture;?>" height="150px"></div>
</div>
  <?php }
  ?>
    <div class="mb-3">
  <label for="pic" class="form-label">Upload picture</label>
  <input class="form-control form-control-sm" id="pic" type="file" name="picture" accept="image/*">
</div>

<div class="mb-3" >
    <button class="btn btn-success" value="submit" style="margin-left: 600px;"><?=$uid?"Update":"Save"?></button>
</div>
</form>
