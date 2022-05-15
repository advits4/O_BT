<?php
// View renderer class
class Render {
    // Pass view file and variables to generate a view page
    public static function generateView($page, $variables) {
        ob_start();
        extract($variables);
        include $page;
        $output = ob_get_clean();
        echo  $output;
    }
}
?>