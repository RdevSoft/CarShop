<?php
// First of all send css header
header("Content-type: text/css");

    $file = 'all-css.php';
    $last_modified_time = filemtime($file); 
    $etag = md5_file($file); 

    header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified_time)." GMT"); 
    header("Etag: $etag"); 

    if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $last_modified_time || 
        trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) { 
        header("HTTP/1.1 304 Not Modified"); 
    exit; 
} 

// Array of css files
$css = array(
    'bootstrap.min.css',
    'font-awesome.min.css',
    'bootstrap-theme.css',
    'main.css',
    'custom.css'
);

function readff($file)
{
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $data   = fread($myfile,filesize($file));
    fclose($myfile);
    return $data;
}


// Prevent a notice
$css_content = '';

// Loop the css Array
foreach ($css as $css_file) {
    $css_content .= readff($css_file);
}
$css_content = str_replace('; ',';',str_replace(' }','}',str_replace('{ ','{',str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),"",preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$css_content)))));
echo $css_content;