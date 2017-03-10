<?php
/*------------------------------------------------------------------------------------ */
/* Page Loader                                                                         */
/* ----------------------------------------------------------------------------------- */
if(!function_exists('df_loading_spinners')) {
    function df_loading_spinners($return = false) {

        $spinner_html            = '';
        $loading_animation       = df_options( 'df_enable_loading_animation', dahz_get_default( 'df_enable_loading_animation' ) );
        $loading_animation_style = df_options( 'df_loading_animation_style', dahz_get_default( 'df_loading_animation_style' ) );

        if($loading_animation != '0'){
            switch ($loading_animation_style) {
                case "pulse":
                    $spinner_html = df_loading_spinner_pulse();
                break;
                case "ball_rotate":
                    $spinner_html = df_loading_ball_rotate();
                break;
                case "cube":
                    $spinner_html = df_loading_spinner_cube();
                break;
                case "rotating_cubes":
                    $spinner_html = df_loading_spinner_rotating_cubes();
                break;
                case "stripes":
                    $spinner_html = df_loading_spinner_stripes();
                break;
                case "ball_rotate_multiple":
                    $spinner_html = df_loading_ball_rotate_multiple();
                break;
                case "line_pulse_out":
                    $spinner_html = df_loading_line_pulse_out();
                break;
                case "line_pulse":
                    $spinner_html = df_loading_line_pulse();
                break;
            }
        }else{
            $spinner_html = df_loading_spinner_pulse();
        }

        if($return === true) {
            return $spinner_html;
        }

        echo $spinner_html;
    }
}
/*------------------------------------------------------------------------------------ */
/* Page Loader loading animation                                                       */
/* ----------------------------------------------------------------------------------- */
if(!function_exists('df_loading_spinner_pulse')) {
    function df_loading_spinner_pulse() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="pulse" style="background-color:'.$loading_animation_image.'"></div>';
        return $html;
    }
}

if(!function_exists('df_loading_ball_rotate')) {
    function df_loading_ball_rotate() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="ball-clip-rotate">';
        $html .= '  <div style="border-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('df_loading_spinner_cube')) {
    function df_loading_spinner_cube() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="cube" style="background-color:'.$loading_animation_image.'"></div>';
        return $html;
    }
}

if(!function_exists('df_loading_spinner_rotating_cubes')) {
    function df_loading_spinner_rotating_cubes() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="rotating_cubes">';
        $html .= '<div class="cube1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="cube2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';

        return $html;
    }
}

if(!function_exists('df_loading_spinner_stripes')) {
    function df_loading_spinner_stripes() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="stripes">';
        $html .= '<div class="rect1" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect2" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect3" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect4" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '<div class="rect5" style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        return $html;
    }
}

if(!function_exists('df_loading_ball_rotate_multiple')) {
    function df_loading_ball_rotate_multiple() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="ball-clip-rotate-multiple">';
        $html .= ' <div style="border-color:'.$loading_animation_image.'"></div>';
        $html .= ' <div style="border-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        return $html;
    }
}

if(!function_exists('df_loading_line_pulse_out')) {
    function df_loading_line_pulse_out() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="line-scale-pulse-out-rapid" >';
        $html .= '  <div style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '  <div style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '  <div style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '  <div style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '  <div style="background-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        return $html;
    }
}

if(!function_exists('df_loading_line_pulse')) {
    function df_loading_line_pulse() {
        $loading_animation_image = df_options( 'df_loading_animation_color', dahz_get_default( 'df_loading_animation_color' ) );

        $html = '';
        $html .= '<div class="ball-scale-ripple">';
        $html .= '  <div style="border-color:'.$loading_animation_image.'"></div>';
        $html .= '</div>';
        return $html;
    }
}