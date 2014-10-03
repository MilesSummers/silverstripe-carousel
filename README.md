# Carousel Module

## Introduction

	Provide an image slider or carousel utilising the jquery flexslider plugin

## To do
	* Expose more options

## Maintainer Contact

 * Miles Summers <miles (at) youngearth (dot) com (dot) au>

## Requirements

 * SilverStripe 3.1.3 or newer
 
## Installation

 * Copy the `carousel` directory into your main SilverStripe webroot
 * Extend the page class that you want to have the carousel on - for example extend HomePage by copying the following to mysite/_config/extensions.yml
 
```yaml
---
Name: extensions
---
HomePage:
  extensions:
    ['CarouselExtension']
```

 * Run /dev/build?flush=1

## Usage
 * Include $Carousel into your page template
 * Edit the page in the CMS to add images/links to the carousel.
 * If you have included your own JQuery in the page template you will need to set the config value IncludeJQuery to false
 
 ```yaml
---
Name: extensions
---
HomePage:
  extensions:
    - 'CarouselExtension'
  IncludeJQuery: false
```

## Known issues:
	None
