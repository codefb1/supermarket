  </br> </br> </br><div style="text-align:right;margin-bottom:10px;">
  <button class="btn btn-shadow btn-success" type="button"onClick="location.href='<?php echo base_url().'products';?>'"><i class="icon-caret-left"></i> Listes des produits</button>
  <button class="btn btn-shadow btn-success" type="button" onClick="location.href='<?php echo base_url().'productspictures/add/'.$product_id;?>'"><i class="icon-plus"></i> Nouvelle photo de produit</button>
</div>
<?php if(@$this->uri->segment(4) == 1) { ?>
<div class="alert alert-success alert-block fade in">
  <button type="button" class="close close-sm" data-dismiss="alert"> <i class="icon-remove"></i> </button>
            <strong>OK!</strong> mise a jour avec succès. </div>
<?php }?>
<div class="row">
    <aside class="profile-nav col-lg-12">
    <section class="panel">
	      <header class="panel-heading"> Liste des photos  </header>
      <div class="page a_slow elasticInLeft">
      <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
      <div class="demowrap cf">
        <?php foreach ($product_pictures_list as $product_pictures):?>
        <?php if($product_pictures->picture_data_status==0){$class="online a0";$status='/1';}?>
        <?php if($product_pictures->picture_data_status==1){$class="offline a0";$status='/0';}?>
        <?php if($product_pictures->picture_data_focus==0){$class_focus="star a2";$focus='/1';}?>
        <?php if($product_pictures->picture_data_focus==1){$class_focus="onfocus a2";$focus='/0';}?>
        <div class="box">
          <div class="he-wrap tpl2"> <img width='300px' hight='300px' src="<?php echo base_url().'medias/products/';?><?php echo $product_pictures->product_pictures?>" alt="" />
            <div class="he-view he-view-show">
              <div class="bg a0" data-animate="fadeIn">
                <div class="center-bar"> 
				<?php if($product_pictures->picture_view==2){?>
				<a title="Boucherie" href="#" class="meat_icon" data-animate="elasticInDown"></a>
				<?php } ?>
				<a title="mise ajour status" href="<?php echo base_url().'productspictures/updatestatus/'.$product_pictures->product_picture_id.'/'.$product_pictures->product_id.$status;?>" class="<?php echo $class?>" data-animate="elasticInDown"></a>
				
				<a title="mise ajour image" href="<?php echo base_url().'productspictures/edit/'.$product_pictures->product_picture_id;?>" class="edit a1" data-animate="elasticInDown"></a>
				<a title="image cover " href="<?php echo base_url().'productspictures/updatefocus/'.$product_pictures->product_picture_id.'/'.$product_pictures->product_id.$focus;?>" class="<?php echo $class_focus?>" data-animate="elasticInDown"></a> 
				<a  title="supprimer image  "href="<?php echo base_url().'productspictures/delete/'.$product_pictures->product_picture_id.'/'.$product_pictures->product_id;?>" class="trash a3" data-animate="elasticInDown"></a> </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
	   </div>
	   </div>
    </section>
</aside>
</div>
<link rel="stylesheet" href="<?php echo base_url().'template/g-plugins/template_assets/';?>templates.css" />
<link rel="stylesheet" href="<?php echo base_url().'template/g-plugins/';?>demo.css" />
<link rel="stylesheet" href="<?php echo base_url().'template/g-plugins/';?>reset.css" />
  <link rel="stylesheet" href="<?php echo base_url().'template/g-plugins/';?>HoverEx-files/hoverex-all.css" />
    <link rel="stylesheet" href="<?php echo base_url().'template/g-plugins/';?>template_assets/templates.css" />
    <script type="text/javascript" src="<?php echo base_url().'template/g-plugins/';?>HoverEx-files/jquery.hoverex.js"></script>

	
 
 
	