<?php
class CarouselExtension extends DataExtension {

	private static $db = array(
		'CarouselControls' => 'Boolean',
		'CarouselPager' => 'Boolean',
		'CarouselAuto' => 'Boolean',
		'CarouselSpeed' => 'Int',
		'CarouselPause' => 'Int',
		'CarouselTransition' => "Enum('fade, slide', 'slide')"		
	);

	private static $defaults = array(
		"CarouselControls" => 1,
		"CarouselPager" => 1,
		"CarouselAuto" => 1,
		"CarouselSpeed" => 300,
		"CarouselPause" => 5000,
		"CarouselTransition" => 'slide'
	);
	
	private static $has_one = array(
	);

	private static $has_many = array(
		'Slides' => 'CarouselSlide'
	);
	
	 private static $casting = array(
		"Carousel" => 'HTMLText',
	);
  
	public static $IncludeJQuery = true;
  
	public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Carousel', new CheckboxField('CarouselControls', 'Show navigation'));
        $fields->addFieldToTab('Root.Carousel', new CheckboxField('CarouselPager', 'Show pager'));
        $fields->addFieldToTab('Root.Carousel', new CheckboxField('CarouselAuto', 'Auto Transition'));
        $fields->addFieldToTab('Root.Carousel', new NumericField('CarouselSpeed', 'Transition speed (ms)'));
        $fields->addFieldToTab('Root.Carousel', new NumericField('CarouselPause', 'Pause between transitions (ms)'));
        $fields->addFieldToTab('Root.Carousel', new DropdownField('CarouselTransition', 'Transition', $this->owner->dbObject('CarouselTransition')->enumValues()));
        $conf=GridFieldConfig_RecordEditor::create(10);
        $conf->addComponent(new GridFieldSortableRows('SlideSort'));
        $fields->addFieldToTab('Root.Carousel', new GridField('SlidesID', 'Carousel Slides', $this->owner->Slides(), $conf));

		return $fields;
	}	

	function contentControllerInit($controller) {
		if($this->IncludeJQuery) Requirements::javascript("framework/thirdparty/jquery/jquery.min.js");
		else Requirements::set_force_js_to_bottom(true);
		Requirements::javascript("carousel/thirdparty/flexslider/jquery.flexslider-min.js");
		Requirements::css("carousel/thirdparty/flexslider/flexslider.css");
		
		$vars = array(
			"controls" => $this->owner->CarouselControls?'true':'false',
			"pager" => $this->owner->CarouselPager?'true':'false',
			"auto" => $this->owner->CarouselAuto?'true':'false',
			'transition' => $this->owner->CarouselTransition,
			'speed' => $this->owner->CarouselSpeed,
			'pause' => $this->owner->CarouselPause			
		);
		Requirements::javascriptTemplate("carousel/javascript/flexslider.template.js", $vars);
	}
	
	function getCarousel() {
		$Slides = $this->owner->Slides()->sort("SlideSort");
		$arrayData = new ArrayData(array('SortedSlides' => $Slides));
		return $arrayData->renderWith('Carousel');
	}
}
