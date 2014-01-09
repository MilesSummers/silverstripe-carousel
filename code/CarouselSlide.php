<?php

class CarouselSlide extends DataObject {
	private static $db = array(
		'Title' => 'Varchar(100)',
		'External' => 'Boolean',
		'ExternalLink' => 'Varchar(200)',
		'SlideSort' => 'Int'
	);

	private static $has_one = array(
		'SlideImage' => 'Image',
		'HolderPage' => 'Page',
		'IntenalLink' => 'SiteTree'
	);

	private static $default_sort = 'SlideSort';	

	public function getCMSFields() {
		$fields = new FieldList();
		$fields->push(new TextField('Title', 'Title'));
		$fields->push(new UploadField('SlideImage', 'SlideImage'));
		$fields->push(new TreeDropdownField("IntenalLinkID", "Choose a page to link to", "SiteTree"));
		$fields->push(new CheckboxField('External', 'Using external link'));
		$fields->push(new TextField('ExternalLink', 'External Link URL'));
		
		return $fields;		
	}
}
