<?php

namespace  Backweb\SageAcf\AcfFields;

use acf_field_textarea;

class AcfFieldTitle extends acf_field_textarea
{
    function initialize() {
        $this->name = 'title';
        $this->label = __('Title', 'acf');
        $this->category = 'Kraken';
        $this->defaults = array(
            'default_value' => '',
            'new_lines'     => 'br',
            'maxlength'     => '',
            'placeholder'   => '',
            'rows'          => '3',
        );
    }
}
