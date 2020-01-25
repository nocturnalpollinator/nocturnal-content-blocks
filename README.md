# Nocturnal Content Blocks

## Examples

### Creating a content block
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