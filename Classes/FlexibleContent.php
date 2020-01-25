<?php

namespace NocturnalContent;

use \StoutLogic\AcfBuilder\FlexibleContentBuilder;

class FlexibleContent extends \StoutLogic\AcfBuilder\FlexibleContentBuilder
{
    public function __construct($id, $config = [])
    {
        parent::__construct($id,  'flexible_content', $config);   
        return $this;
    }

    public function addFlexLayout($layout) 
    {
        return $this->addLayout($layout);
    }
}