<?php

namespace NocturnalContent;

use \StoutLogic\AcfBuilder\FieldsBuilder;

abstract class LayoutBuilder extends \StoutLogic\AcfBuilder\FieldsBuilder
{

    public function __construct($id, $args = [])
    {  
        parent::__construct($id, $args);

        return $this->layout();
    }

    public abstract function layout();
}
