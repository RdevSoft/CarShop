<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['blog_post_types']	= array('blog'=>'Blog Posts','article'=>'Articles','news'=>'News');

$config['enable_custom_fields']	= 'Yes';
$config['custom_fields']		= array(
										array('title'=>'Weight','name'=>'weight','type'=>'text','validation'=>'','show_on_detail_page'=>'yes','others'=>array()),
										array('title'=>'Is Convertible','name'=>'is_convertible','type'=>'select',
											  'value'=>array('No'=>'No','Yes'=>'Yes'),'validation'=>'','show_on_detail_page'=>'yes','others'=>array())
										);

$config['car_types']		= array(
										array('title'=>'Sedan'),
                                        array('title'=>'Coupe'),
										array('title'=>'Sports Car'),
										array('title'=>'Luxury Car'),
										array('title'=>'SUV'),
                                        array('title'=>'Van'),
										array('title'=>'Truck')
									);

$config['car_transmission'] = array(
                                        array('title'=>'Automatic'),
                                        array('title'=>'Manual'),
                                        array('title'=>'Semi Automatic'),
                                        array('title'=>'Other'),

                                    );

$config['car_condition'] = array(
                                    array('title'=>'condition_new'),
                                    array('title'=>'condition_used'),
                                    array('title'=>'condition_pre_owned'),
                                    array('title'=>'condition_recondition'),
                                    array('title'=>'condition_other'),
                                    array('title'=>'condition_sold'),

                                );

$config['decimal_point'] = '.';
$config['thousand_separator'] = ',';
# to create a new property just add another element to the $config['property_types'] array
# be careful that each element of the array must end with a comma (,) except the last one
# the last element should not have any trailing comma
# to remove any property type just delete the line of that type, again be careful about the comma