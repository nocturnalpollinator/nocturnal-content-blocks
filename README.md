# Nocturnal Content Blocks

## Requirements
* [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/)
* [ACF Builder](https://github.com/StoutLogic/acf-builder)
* Preferably [Composer](https://getcomposer.org/)

## Installation
If you don't already have ACF Builder on your WordPress installation you could run `composer install` from the plugin root.

## Examples

### Creating a content block
Create a folder in your theme root directory called `acf-content-blocks` and the plugin will include all blocks for you.
```php
<?php
class Banner extends \NocturnalContent\LayoutBuilder
{
    public function layout()
    {
        return $this->addText('cool_banner', [
                        'label' => 'Banner text',
                        'wrapper' => [
                            'width' => '50'
                        ]
                    ])
                    ->addImage('banner_background', [
                        'label' => 'Banner background image',
                        'wrapper' => [
                            'width' => '50'
                        ]
                    ]);
    }
}
```

### Register blocks
It's up to you where you put your build files. You could put them in `acf-content-blocks` as well, but make sure it ends up last. Maybe name your blocks with a _-prefix?
```php
<?php

namespace NocturnalContent;

$blocks = new BaseBuilder('Blocks');

// This is not a flexible content
$blocks->addText('This is text');

// This is flexible content
$flexibleContent = new FlexibleContent('The flexible content');

// Adding the banner from the example
$flexibleContent->addFlexLayout(new Banner('Cool banner'));

// Adding another block
$flexibleContent->addFlexLayout(new Row('Cool row'));


$blocks->addFlexible($flexibleContent)
        ->setLocation('post_type', '==', 'page');

// Neat shorthand function for building the fields
$blocks->builder();
```