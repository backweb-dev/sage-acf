<?php

namespace  Backweb\SageAcf\AcfFields;



use acf_field_textarea;

class AcfFieldContent extends acf_field_textarea
{
    function initialize() {
        $this->name = 'content';
        $this->label = __('Content', 'acf');
        $this->category = 'Kraken';
        $this->defaults = array(
            'default_value' => '',
            'new_lines'     => 'p',
            'maxlength'     => '',
            'placeholder'   => '',
            'rows'          => '10',
        );
    }
}
