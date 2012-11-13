<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Corset Order Management System</title>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery.ui.all.css" />

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/jquery-ui-1.8.18.custom.css" />

<script type="text/javascript" src="<?=base_url()?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-1.8.18.custom.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/ui/jquery.ui.button.js"></script>

</head>
<body>

<div id="main_container">

	<div id="header">
	<div class="logo">
	
	<? start_block_marker('logo') ?>
	
	<? end_block_marker() ?>
	
    </div>
    
            <div id="menu_tab">                                     
                    <ul class="menu">
                    <li class="divider"></li>
					
					<? start_block_marker('menu_tab') ?>
					
					<? end_block_marker() ?>
					
                    </ul>
            </div>
            
            <div class="search_tab">
			
			<? start_block_marker('search') ?>
			
			<? end_block_marker() ?>
			
            </div>
    
    
    </div>
    
 
            
            
    <div id="main_content">
    
      <div class="left_sidebar">
         
        <div id="left_menu">
            <ul>
			
			<? start_block_marker('left_menu') ?>
			
			<? end_block_marker() ?>
			 
            </ul>
        </div>
        
        <div class="submenu_pic">
        <img src="<?=base_url()?>images/submenu_pic.gif" alt="" title="" />
        </div>
        
        
     </div>
        
        
        <div id="center_content">
        
        <div class="title"><img src="<?=base_url()?>images/lates_products_title.gif" alt="" title="" /></div>
        
		<div class="product_box">
        <div class="product_details">
		
        	<div class="prod_title">
			
			<? start_block_marker('page_title') ?>
			
			
			<? end_block_marker() ?>
			
			</div>
			
			<? start_block_marker('top_content') ?>
			
			<? end_block_marker() ?>
			
        </div>
        </div>

        <div class="title"><img src="<?=base_url()?>images/shop_title.gif" alt="" title="" /></div>  
        
        <p class="shop_by_brand">
		
		<? start_block_marker('mid_content') ?>
		
		<? end_block_marker() ?>
		
		</p> 

        <div class="title"><img src="<?=base_url()?>images/center_divider.gif" alt="" title="" /></div> 
        <div class="title"><img src="<?=base_url()?>images/gift_title.gif" alt="" title="" /></div> 
        
       <p class="gifts_details">
	   <? start_block_marker('bottom_content') ?>
	   
	   <? end_block_marker() ?>
		</p> 
        
        
        </div>
    
<div class="clear"></div>
        
           
    <div id="footer">
    <div class="left_foter"><img src="<?=base_url()?>images/footer_logo.gif" alt="" title="" /></div>
    <div class="center_footer">
	
	<? start_block_marker('center_footer') ?>
	
	<? end_block_marker() ?>
	
    </div>
    </div>
    
    </div>

</div>
</body>
</html>