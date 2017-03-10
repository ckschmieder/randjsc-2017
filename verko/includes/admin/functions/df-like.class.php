<?php

class dfLike {

   function __construct(){
    add_action('wp_ajax_df_like', array(&$this, 'ajax'));
    add_action('wp_ajax_nopriv_df_like', array(&$this, 'ajax'));
  }

  function ajax($post_id){
    //update
    if( isset($_POST['likes_id']) ) {
      $post_id = str_replace('df-like-', '', $_POST['likes_id']);
      echo $this->like_post($post_id, 'update');
    }

    //get
    else {
      $post_id = str_replace('df-like-', '', $_POST['likes_id']);
      echo $this->like_post($post_id, 'get');
    }
    exit;
  }

  function like_post($post_id, $action = 'get'){
    if(!is_numeric($post_id)) return;

    switch($action) {

      case 'get':
        $like_count = get_post_meta($post_id, '_df-like', true);
        if( !$like_count ){
          $like_count = 0;
          add_post_meta($post_id, '_df-like', $like_count, true);
        }

        return '<i class="md-favorite-outline"></i><span class="df-like-count">'. $like_count .'</span>';
        break;

      case 'update':
        $like_count = get_post_meta($post_id, '_df-like', true);
        if( isset($_COOKIE['df-like_'. $post_id]) ) return $like_count;

        $like_count++;
        update_post_meta($post_id, '_df-like', $like_count);
        setcookie('df-like_'. $post_id, $post_id, time()*20, '/');

        return '<i class="md-favorite"></i><span class="df-like-count">'. $like_count .'</span>';
        break;
    }
  }

  function add_df_like(){
    global $post;

    $output = $this->like_post($post->ID);

      $class = 'df-like';
      $title = __('Like this', 'dahztheme');
    if( isset($_COOKIE['df-like_'. $post->ID]) ){
      $class = 'df-like liked';
      $title = __('You already like this!', 'dahztheme');
    }

    return '<span class="df-link"><a href="#" class="'. $class .'" id="df-like-'. $post->ID .'" title="'. $title .'">'. $output .'</a></span>';
  }

    function add_widget_df_like(){
    global $post;

    $output = $this->like_post($post->ID);

      $class = 'df-like';
      $title = __('Like this', 'dahztheme');
    if( isset($_COOKIE['df-like_'. $post->ID]) ){
      $class = 'df-like liked';
      $title = __('You already like this!', 'dahztheme');
    }

    return sprintf('<span class="post-meta-favourite"><a href="#" class="%1$s" id="df-like-%2$s" title="%3$s">%4$s</a></span>', $class, $post->ID, $title, $output);
  }
}

global $df_like;
$df_like = new dfLike();

// get the ball rollin'
function df_like() {
  global $df_like;
  echo $df_like->add_df_like();
}

function df_like_widget() {
  global $df_like;
  echo $df_like->add_widget_df_like();
}
 