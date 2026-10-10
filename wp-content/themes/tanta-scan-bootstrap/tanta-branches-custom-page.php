<?php
/**
 * Template Name: Tanta Branches Custom Page
 * Description: A clean, full-width custom page template.
 */

// Include the standard theme header
get_header(); 
?>

<div id="primary" class="content-area custom-template-container">
    <main id="main" class="site-main" role="main">
       <div class="bg-white p-4 border rounded-4 m-4 shadow-sm border border-t-0 border-gray-200 relative flex items-center">
        <?php
        // Start the standard WordPress Loop to fetch content
        while ( have_posts() ) :
            the_post();
            ?>

            <article class="custom-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header custom-template-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content custom-template-content">
                    <!--<div class="d-flex align-items-center" style="float: left;">-->
                    <div class="row">
                       <div class="col-12">
                           <div class="widget-title">Branches Details</div>
                           <div class="nav flex-column nav-pills me-3 branch-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              
                                <?php
                        
                                $posts = get_posts(array(
                                    'post_type'   => 'branch',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 10,
                                    'fields' => 'ids',
                                    'orderby' => 'id',
                                    'order' => 'ASC'
                                    )
                                );
                                //loop over each post
                                foreach($posts as $p){
                                    //get the meta you need form each post
                                    $name = get_post_meta($p,"_branch_name",true);
                                    $address = get_post_meta($p,"_branch_address",true);
                                    $phone = get_post_meta($p,"_branch_phone",true);
                                    $mobile = get_post_meta($p,"_branch_mobile",true);
                                    //do whatever you want with it
                                     if($name =="Head Center"){
                                    ?>
                                        <button class="nav-link active" id="v-pills-<?php echo $p;?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $p;?>" type="button" role="tab" aria-controls="v-pills-<?php echo $p;?>" aria-selected="true"><?php echo $name;?></button>
                                     <?php } 
                                     else {?>

                                        <button class="nav-link" id="v-pills-<?php echo $p;?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $p;?>" type="button" role="tab" aria-controls="v-pills-<?php echo $p;?>" aria-selected="true"><?php echo $name;?></button>
                              
                        
                                <?php }
                                }
                                ?>
                         </div>
                        
                         <div class="tab-content" id="v-pills-tabContent">
                            <?php //loop over each post
                            foreach($posts as $p){
                                //get the meta you need form each post
                                $name = get_post_meta($p,"_branch_name",true);
                                $address = get_post_meta($p,"_branch_address",true);
                                $phone = get_post_meta($p,"_branch_phone",true);
                                $mobile = get_post_meta($p,"_branch_mobile",true);
                                //do whatever you want with it
                               
                                if($name == "Head Center"){
                                     
                            ?>
                              <div class="tab-pane fade show active" id="v-pills-<?php echo $p;?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $p;?>-tab">
                                   <div class="my-map"><?php echo do_shortcode('[wpgmza id="1"]');?></div>
                                  <span>Name : <?php echo $name;?><i class="fa fa-home" aria-hidden="true"></i></span><br/><span>Address : <?php echo $address;?><i class="fa fa-map-marker" aria-hidden="true"></i></span><br/><span>Phone : <?php echo $phone;?><i class="fa fa-phone" aria-hidden="true"></i></span></br><span>Mobile : <?php echo $mobile;?><i class="fa fa-mobile" aria-hidden="true"></i></span>
                              </div>
                            <?php }
                                  else {?>
                              <div class="tab-pane fade" id="v-pills-<?php echo $p;?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $p;?>-tab">
                                    <div class="my-map"><?php echo do_shortcode('[wpgmza id="1"]');?></div>
                                <span>Name : <?php echo $name;?><i class="fa fa-home" aria-hidden="true"></i></span><br/><span>Address : <?php echo $address;?><i class="fa fa-map-marker" aria-hidden="true"></i></span><br/><span>Phone : <?php echo $phone;?><i class="fa fa-phone" aria-hidden="true"></i></span></br><span>Mobile : <?php echo $mobile;?><i class="fa fa-mobile" aria-hidden="true"></i></span>
                              </div>
                         <?php } }?>     
                         </div>
                         </div>
                    </div> 
                </div>
            </article>

            <?php
            // Optional: If you want to allow comments on this template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
         </div>
    </main>
</div>

<?php
// Include the standard theme footer
get_footer(); 