<?php

namespace App\Statamic\Extensions\custom_select\CustomSelect;

use Statamic\Fields\Fieldtype;

class CustomSelectFieldtype extends Fieldtype
{
    protected static $handle = 'custom_select';

    protected $icon = 'select';

    protected function configFieldItems(): array
    {
        return [
            'selectType' => [
                'display' => __('Select Type'),
                'instructions' => __('Choose between different select types.'),
                'type' => 'select',
                'default' => '',
                'options' => [
                    'svg-icons' => __('SVG Icons'),
                    'dynamic-links' => __('Dynamic Links'),
                ],
                'width' => 50,
            ]
        ];
    }

}
