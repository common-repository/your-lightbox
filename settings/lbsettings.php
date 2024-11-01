

<style>
    #like_url{
        width: 300px;
    }
</style>
<form method="post" action="?page=yl">
    <input type="hidden" name="checkform" value="yes" />
<?php
    $ytmslb_content = $_REQUEST['content'];
    $ytmslb_width = $_REQUEST['width'];
    $ytmslb_height = $_REQUEST['height'];
    $ytmslb_title = $_REQUEST['title'];
    $ytmslb = $_REQUEST['ytmslb'];
    $checkform = $_REQUEST['checkform'];
    $ytmslb_like = $_REQUEST['ytmslb_like'];
    $like_url = $_REQUEST['like_url'];


    if($checkform == "yes"){



        if($ytmslb == "yes"){


            echo "Lightbox is on."."<br />";
            echo "title: <h4>".$ytmslb_title."</h4><br />";
            echo "content: ".$ytmslb_content."<br />";
            echo "width: ".$ytmslb_width."<br />";
            echo "height: ".$ytmslb_height."<br />";
            if($ytmslb_like == "yes"){

                echo "a like button added to the bottom of the lightbox. users that will click on it will like the url $like_url";
            }

      
        }else{


            echo "LightBox is off. <br />";
        
        

         
        
        }



       update_option( 'lightbox_title_ytm', $ytmslb_title );
       update_option( 'lightbox_content_ytm', $ytmslb_content );
       update_option( 'lightbox_width_ytm', $ytmslb_width );
       update_option( 'lightbox_height_ytm', $ytmslb_height );
       update_option( 'lightbox_switch_ytm', $ytmslb );
       update_option( 'like_switch_ytm', $ytmslb_like );
       update_option( 'like_url_ytm', $like_url );









    }else{
        echo "you can change the text. <br />";
    };














    $lbop = get_option('lightbox_content_ytm');
    if($lbop){
        $plch = $lbop;
    }else{
        $plch = "please enter the text or the code you want.<br />";
    }
    
?>

    <br />
            <label for="title">The title(optional)</label><br />
            <input type="text" id="title" name="title" value="<?php echo get_option('lightbox_title_ytm'); ?>" />
            <br />
       
            <label for="ytmlb">the text/code:</label><br />
            <textarea style="width: 600px; height: 500px; line-height: initial" id="ytmlb" name="content"><?php echo $lbop ;?></textarea>
             <br />



            <label for="height">The Height of the lightbox(pixels)</label>
            <input type="text" name="height" id="height" value="<?php echo get_option('lightbox_height_ytm'); ?>" />
             <br />


            <label for="width">The Width of the lightbox(pixels)</label>
            <input type="text" id="width" name="width" value="<?php echo get_option('lightbox_width_ytm'); ?>" />
             <br />

            <label for="ytmslb">Do you want to display lightbox?(checked = on, unchecked = off)</label>
            <input type="checkbox" id="ytmslb" name="ytmslb" value="yes" <?php if(get_option('lightbox_switch_ytm') == 'yes'){echo 'checked';};  ?>  />
             <br />



            <script>
                function like() {
                    div = document.getElementById('like_box_settings').style.display;
                    if (div == 'none') {

                        document.getElementById('like_box_settings').style.display = 'block';
                        
                    } else if (div == 'block') {
                        document.getElementById('like_box_settings').style.display = 'none';
                        

                    } else {
                       // alert("error");
                    }



                }


            </script>

            <label onclick="like();" id="like_label" for="ytmslb_like">Do you want to display like button in the lightbox?(checked = yes, unchecked = no)
                <input type="checkbox" id="ytmslb_like" name="ytmslb_like" value="yes" <?php if(get_option('like_switch_ytm') == 'yes'){echo 'checked';};  ?>  />
            </label>
             <br />
            <div id="like_box_settings" style="display: <?php if(get_option('like_switch_ytm') == 'yes'){?>block;<?php }else{?>none;<?php }; ?>;">
                <label for="like_url">Url to like. e.g facebook.com/pixel.org.il for page(recommended), pixel.org.il for website.
                    <input type="text" id="like_url" name="like_url" value="<?php if(!get_option('like_url_ytm')){ echo get_bloginfo('url');}else{echo get_option('like_url_ytm');}; ?>" />
                </label>
            
            
            
            </div>

            <input type="submit" class="button" value="Save & Update changes" />
    <br />

    <?php  echo "currently ".get_option('lightbox_switch_ytm'); ?>
        </form>
    