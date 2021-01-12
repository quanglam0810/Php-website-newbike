<?php include 'classes/category.php';  ?> 
    <?php require_once 'helpers/format.php';?>
    <?php $dm = new category();
    $fm = new Format();?>
<div class="wrap">    
<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
                                    <h3>DANH MỤC SÁCH</h3>
                                    <?php 
                                    $cat = $dm->show_category();
                                    if($cat){
                                    while ($result = $cat->fetch_assoc()) {	
                                    $madm = $result['MaLoai'];
                                    ?>				
                                    <li><a href="ds-sanpham.php?madm=<?php echo$madm;?>&page=1"><?php echo $result['TenLoai'];}}?></a></li>								     
							                              				                                					                                             				     
				  </ul>
                                    </div>	
				</div>					
                        </div>
			<div class="header_bottom_right">					 							     
				<script>
                                    var i = 0;
                                    var images = [];
                                    var time = 3000;

                                     // Image list
                                     images[0] = 'images/image1.jpg';
                                     images[1] = 'images/image2.jpg';
                                     images[2] = 'images/image3.jpg';
                                     images[3] = 'images/image4.jpg';

                                     // Change image
                                     function changeImage(){

                                       document.slide.src = images[i];

                                       if(i <images.length - 1){
                                         i++;
                                       } else {
                                         i = 0;
                                       }
                                       setTimeout("changeImage()", time);
                                     }

                                     window.onload = changeImage;
                                   </script>
                                   <img name="slide" width="900" height="350">					       
		         </div>	
		   <div class="clear"></div>
		</div>    
</div>
