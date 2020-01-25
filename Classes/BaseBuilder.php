<?php

namespace NocturnalContent;

use \StoutLogic\AcfBuilder\FieldsBuilder;

class BaseBuilder extends \StoutLogic\AcfBuilder\FieldsBuilder
{
    public function __construct($id, $config = [])
    {
        parent::__construct($id, $config);

        return $this;
    }

    public function addFlexible($field)
    {
        return $this->initializeField($field);
    }

    public function builder() 
    {
        $self = $this;
        add_action('acf/init', function() use ($self) {
            acf_add_local_field_group($self->build());
        });
    }
}