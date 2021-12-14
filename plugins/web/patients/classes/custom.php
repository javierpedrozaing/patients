<?php 
namespace web\Patients\Classes;

use Db;
use RainLab\User\Facades\Auth;
use RainLab\Blog\Models\Post;
use RainLab\Blog\Models\Category;

class Custom {
    public static function postsByCategory($category_id) {
        $current_user = Auth::getUser();   
        $data = Db::select('select * from `rainlab_blog_posts` 
        inner join `rainlab_blog_posts_categories` on `rainlab_blog_posts`.`id` = `rainlab_blog_posts_categories`.`post_id` 
        inner join `web_patients_post_patient` on `rainlab_blog_posts`.`id` = `web_patients_post_patient`.`post_id` 
        where  `web_patients_post_patient`.`patient_id` = ' . $current_user->id . ' and `rainlab_blog_posts_categories`.`category_id` ='.$category_id);         
        
        return $data;
    }

    public static function featuredImageByPost($post_id){
        $image = Post::find($post_id)->featured_images->first();        
        return $image;
    }
}

?>