<?php

namespace App\Statamic\Extensions\custom_select\CustomSelect;

use Statamic\Tags\Tags;
use Statamic\Support\Arr;
use Illuminate\Support\Facades\Cache;

class CustomSelectTags extends Tags
{
    protected static $handle = 'custom_select';

    public function index()
    {
        $icon = Arr::get($this->context, $this->getList(['icon', 'name', 'use', 'from'])[0]);

        return $this->output($icon);
    }

    public function wildcard($icon)
    {
        return $this->output(Arr::get($this->context, $icon));
    }

    public function kit()
    {
        $kitUrl = config('fontawesome.kit_url');

        return "<script src=\"{$kitUrl}\" crossorigin=\"anonymous\"></script>";
    }

    protected function output($icon)
    {
        if (! $classes = Arr::get($icon->value(), 'classes')) return;

        return "<i class=\"{$classes}\" aria-hidden=\"true\"></i>";
    }
}
