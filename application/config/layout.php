<?php

//
// Layout config for the site admin 
//
                                        

$config['layout']['default']['template'] = 'layouts/frontend';
$config['layout']['default']['title']    = 'HRM';
$config['layout']['default']['js_dir']   = 'assets/js/';
$config['layout']['default']['css_dir']  = 'assets/css/';
$config['layout']['default']['img_dir']     = 'assets/images/';


$config['layout']['default']['javascripts'] = array(
  'build/global.min','moment','daterangepicker','function'  
);
 
$config['layout']['default']['stylesheets'] = array('style','daterangepicker');

$config['layout']['default']['description'] = '';
$config['layout']['default']['keywords']    = '';

$config['layout']['default']['http_metas'] = array(
    'Content-Type' => 'text/html; charset=utf-8',
	'viewport'     => 'width=device-width, initial-scale=1.0',
    'author' => 'HRM',
);

?>
