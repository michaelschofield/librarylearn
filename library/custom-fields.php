<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Add-ons 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_video',
		'title' => 'Video',
		'fields' => array (
			array (
				'key' => 'field_52f9194f4c91e',
				'label' => 'Special Templating',
				'name' => 'academy_video_format',
				'type' => 'select',
				'instructions' => '<ol>
		<li>
		 <b>Standard</b> <br>You have all the individual pieces of your video (.mp4, .webm, .jpg, .srt / .vtt) and they have been uploaded to the library\\\'s media server. Videos in this way will be presented within the <b>video</b> element, adapt to any screen, and otherwise look pretty dashing.
		
		<p><small><b>Browser Support</b> [for reference]: Internet Explorer 9+, Google Chrome 3.0 +, Firefox 3.5 +, Opera 10.5 +, Safari 3.1 +</small></p>
		</li>
		
		<li><b>Adobe Captivate</b> <br>Captivate project files need to be similarly uploaded, and these pages LibraryLearn will present within with an iframe.</li>
		</ol>',
				'choices' => array (
					'standard' => 'Standard ( :) )',
					'captivate' => 'Adobe Captivate ( :( )',
				),
				'default_value' => 'standard',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_52f91aa116e75',
				'label' => 'Files',
				'name' => 'academy_checklist',
				'type' => 'checkbox',
				'instructions' => '<p>Let\'s make sure you have everything you need. If not, you should save this draft and get all these things together.</p>',
				'required' => 1,
				'choices' => array (
					'webm' => 'WebM Video',
					'mp4' => 'MP4 Video',
					'srt' => 'Captions ( SRT )',
					'jpg' => '16:9 Screenshot',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_52f91b4016e76',
				'label' => 'The File Name',
				'name' => 'academy_video_file',
				'type' => 'text',
				'instructions' => '<p>As you know, each component shares its file name. LibraryLearn needs to know <b>the root</b>, which fore instance may look like <b>apa--citation_management(05-2013)</b>.
		</p>
		<p><small>
		<b>Did this make you go, "Huh!?"</b> Please review <a href="http://sherman.library.nova.edu/sites/labs/knowledgebase/file-naming-guidelines-for-webvideo-files/" target="new" title="File Naming Guidelines">the NSU Libraries\\\' file naming guidelines</a>.
		</small>',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_52f91aa116e75',
							'operator' => '==',
							'value' => 'webm',
						),
						array (
							'field' => 'field_52f9194f4c91e',
							'operator' => '==',
							'value' => 'standard',
						),
						array (
							'field' => 'field_52f91aa116e75',
							'operator' => '==',
							'value' => 'jpg',
						),
						array (
							'field' => 'field_52f91aa116e75',
							'operator' => '==',
							'value' => 'srt',
						),
						array (
							'field' => 'field_52f91aa116e75',
							'operator' => '==',
							'value' => 'mp4',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'apa--citation_management(05-2013)',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52f91c7ef7009',
				'label' => 'Upload Captions ( .srt / .vtt )',
				'name' => 'captions',
				'type' => 'file',
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_52f91cb3f700a',
				'label' => 'Captivate URL',
				'name' => 'captivate_url',
				'type' => 'text',
				'required' => 1,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_52f9194f4c91e',
							'operator' => '==',
							'value' => 'captivate',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'academy_video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


if(function_exists("register_field_group"))
{
		register_field_group(array (
		'id' => 'acf_marketing-options',
		'title' => 'Marketing Options',
		'fields' => array (
			array (
				'key' => 'field_52743f59143b9',
				'label' => 'Is this a super feature?',
				'name' => 'is_feature',
				'type' => 'radio',
				'choices' => array (
					'yes' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'horizontal',
			),

			array (
				'key' => 'field_52743d02faec1',
				'label' => 'Overlay Title',
				'name' => 'overlay_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52743d1f69cb6',
				'label' => 'Button Text',
				'name' => 'overlay_button_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52743d4069cb7',
				'label' => 'Button Link',
				'name' => 'overlay_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52743e503fcfa',
				'label' => 'Include the Description?',
				'name' => 'overlay_description',
				'type' => 'radio',
				'choices' => array (
					'yes' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_52e02f5623563',
				'label' => 'Date Text',
				'name' => 'date_text',
				'type' => 'text',
				'instructions' => 'The date of the event in human terms. This is only used for events displayed through the Spotlight API. Format should be: Day-of-the-Week, Month, Day. Ex: "Thursday, January 4th."',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'academy_video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_a-brief-primer',
		'title' => 'Instructions',
		'fields' => array (
			array (
				'key' => 'field_52178704984cc',
				'label' => 'How to add a new video',
				'name' => '',
				'type' => 'message',
				'message' => '<h4>The Main Content Area</h4>
					<p>Obviously, videos are videos and not text - so what should you add to the main text editor? Good 
					question, we\'re still trying to settle this. Videos and other multimedia aren\'t searchable, so when 
					these pages are getting indexed, they appear almost blank! My immediate thinking is that the content should 
					be a printable, step by step (with screenshots) tutorial. 

					<h4>Categories and Tags</h4>

					<p>
						Choose any relevant categories from the <b>Categories</b> list. Check as many that make sense, but <i>do not select more than one top-level category</i>. For instance,	a video can be either filed as Citation Management, Getting Started, or Research, but it can be under as many sub-topics as you like: articles, apa, education, etc.
					</p>

					<p>
						<b>Tags</b> are terms you want the video associated with when a user searches within LibraryLearn,
						so if you want your video to appear if a student searches "test," then add that as a tag. See, categories
						aren\'t part of the search term, so while it may seem redundant to tag a video "articles" while in the Articles 
						category, it\'s not. Tags are also used to connect related videos. For example, if you have several videos about APA 
						tat you would like to show up as related videos, you can add the tag "APA" to each video. 
					</p>

					<p>
						First, check the "Choose from the most used tags" link to see if the tag you want to use already exists. If you 
						need to create a new tag: <ol>
						 <li> Use lowercase unless the word is a course prefix, proper noun, or branded a certain way (i.e., FindIt).</li>
						 <li> Avoid acronyms unless a student is more likely to search for the acronym than the entire phrase.  </li>
						 <li>Use plural form for thins like books, articles, grants, etc.</li>
						 <li>Use only a few focused tags for your video. Trying to tag your video with as many tags 
						 as possible pollutes the expected search results.</li>
						 </ol>
					</p>

					<h4>A Brief Summary</h4>
					Write a brief summary of the video in the same-titled area below the main content. This blurb sells your video and it\'s what shows in series and lists. If you write more than three sentences, then the content won\'t look suspiciously sparse or format stupidly next to its thumbnail. 
					
						<blockquote>Learn how to navigate the library website. Watch as he left-clicks through the social obstacles that stand between him and the heavyweight championship of the world. In his gruff, hard-to-understand way, he\'ll also explain browser support. </blockquote>
					
					<h4>Featured Image</h4>
					Upload a <b>16:9 ratio screenshot</b> (e.g., 720x405 ) under "Featured Image," usually located on your right. Your image must have a resolution of <b>92</b>.
					<oL>
						<li>Click "Set Featured Image"</li>
						<li>If the screenshot isn\'t already in the "Media Library", click "Upload Files".</li>
						<li><b>Title</b> your image something sensible and human (not "picture305.jpg").</li>
						<li>For accessibility purposes your image <b>must</b> have "Alt Text." Alt text is a description of the image for the hearing impaired. So if you upload a picture of a horse, the alt text might be, "A brown horse standing in a field."</li>
					</ol>',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'academy_video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
}
?>