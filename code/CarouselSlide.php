<?php

class CarouselSlide extends DataObject {
	private static $db = array(
		'Title' => 'Varchar(100)',
		'UseLink' => 'Boolean',
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
		$fields->push($image = new UploadField('SlideImage', 'SlideImage'));
		$image->setAllowedFileCategories('image');
		$image->setAllowedMaxFileNumber(1);
		$image->setCanAttachExisting(true);
		$image->setFolderName('Carousel');
		$fields->push(new CheckboxField('UseLink', 'Slide links to page'));
		$fields->push($tree = new TreeDropdownField("IntenalLinkID", "Choose a page to link to", "SiteTree"));
		$fields->push(new TextField('ExternalLink', 'Or use this URL'));
		$tree->setChildrenMethod('Children');
		
		return $fields;		
	}
	
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->ExternalLink = trim($this->ExternalLink);
		if($this->ExternalLink != '' && !preg_match('!://!', $this->ExternalLink)) $this->ExternalLink = 'http://' . $this->ExternalLink;
		if($this->SlideImage()) {
			$this->SlideImage()->Title = $this->Title;
			$this->SlideImage()->write();
		}
	}
}
