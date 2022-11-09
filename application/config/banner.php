<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['banner_settings'] = array(
    array('image_name'=>'car1.jpg', 'header_text'=> 'All New Lamborghini','header_text_color'=>'FFFFFF', 'header_text_top' => '30', 'header_text_left' => '30', 'footer_text'=> 'The best Sports Car in Town','footer_text_color'=>'FFFFFF', 'footer_text_top' => '300', 'footer_text_left' => '30', 'image_link' => ''),
    array('image_name'=>'car2.jpg', 'header_text'=> 'Porche 911 Camaro','header_text_color'=>'FFFFFF', 'header_text_top' => '30', 'header_text_left' => '1000', 'footer_text'=> 'Get the Best Deal','footer_text_color'=>'FFFFFF', 'footer_text_top' => '200', 'footer_text_left' => '1000'),
    array('image_name'=>'car3.jpg', 'header_text'=> 'The New Ferrari','header_text_color'=>'FFFFFF', 'header_text_top' => '30', 'header_text_left' => '30', 'footer_text'=> 'Most Advanced Sports Car','footer_text_color'=>'FFFFFF', 'footer_text_top' => '300', 'footer_text_left' => '30'),
    array('image_name'=>'car4.jpg', 'header_text'=> '', 'header_text_top' => '30', 'header_text_left' => '30', 'footer_text'=> '', 'footer_text_top' => '300', 'footer_text_left' => '30'),

);

#The banner settings array explanation
# image_name: name of image with extension. Image must be kept in ROOT/uploads/banner/ folder. Our preferable image size is 1300x731 px or higher maintaining proportion
# header_text: Top Banner Header text. Keep blank if you want to remove it
# header_text_top: Position from top of the banner (In pixels)
# header_text_left: Position from left of the banner (In pixels)
# footer_text: Top Banner Footer text. Keep blank if you want to remove it
# footer_text_top: Position from top of the banner (In pixels)
# footer_text_left: Position from left of the banner (In pixels)
# header_text_color: Change the header text color on banner (In HEX)
# footer_text_color: Change the footer text color on banner (In HEX)
# image_link: Put a http link to redirect the image ex: http://www.facebook.com - Use the full link
