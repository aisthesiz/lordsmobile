<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JeroenNoten\LaravelAdminLte\View\Components\Form\InputGroupComponent;
use JeroenNoten\LaravelAdminLte\View\Components\Form\Traits\OldValueSupportTrait;

class InputSwitch extends InputGroupComponent
{
    use OldValueSupportTrait;

    /**
     * The Bootstrap Switch plugin configuration parameters. Array with
     * 'key => value' pairs, where the key should be an existing configuration
     * property of the plugin.
     *
     * @var array
     */
    public $config;

    public $checked;

    /**
     * Create a new component instance.
     * Note this component requires the 'Bootstrap Switch' plugin.
     *
     * @return void
     */
    public function __construct(
        $name, $id = null, $label = null, $igroupSize = null, $labelClass = null,
        $fgroupClass = null, $igroupClass = null, $disableFeedback = null,
        $errorKey = null, $config = [], $enableOldSupport = null, $checked = '',
    ) {
        parent::__construct(
            $name, $id, $label, $igroupSize, $labelClass, $fgroupClass,
            $igroupClass, $disableFeedback, $errorKey
        );

        $this->config = is_array($config) ? $config : [];
        $this->enableOldSupport = isset($enableOldSupport);
        $this->checked = $checked;
    }

    /**
     * Make the class attribute for the "input-group" element. Note we overwrite
     * the method of the parent class.
     *
     * @return string
     */
    public function makeInputGroupClass()
    {
        $classes = ['input-group'];

        if (isset($this->size) && in_array($this->size, ['sm', 'lg'])) {
            $classes[] = "input-group-{$this->size}";
        }

        if ($this->isInvalid()) {
            $classes[] = 'adminlte-invalid-iswgroup';
        }

        if (isset($this->igroupClass)) {
            $classes[] = $this->igroupClass;
        }

        return implode(' ', $classes);
    }

    /**
     * Make the class attribute for the input group item. Note we overwrite
     * the method of the parent class.
     *
     * @return string
     */
    public function makeItemClass()
    {
        $classes = [];

        if ($this->isInvalid()) {
            $classes[] = 'is-invalid';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-switch');
    }
}
