<?php

namespace Aubruz\Mainframe\UI\Components;

use Aubruz\Mainframe\Exceptions\UIException;
use Aubruz\Mainframe\UI\ChildComponent;

/**
 * Class Dropdown
 * @package Aubruz\Mainframe\UI\Components
 *
 * A component where users can only select a single option
 *
 */
class Dropdown extends ChildComponent
{

    /**
     * Dropdown constructor.
     * @param $id
     * @param $label
     */
    public function __construct($id, $label)
    {
        parent::__construct();
        $this->setType("Dropdown");
        $this->addProps([
            "id"    => $id,
            "label"    => $label,
            "options"   => []
        ]);
        return $this;
    }

    /**
     * @return $this
     */
    public function disable()
    {
        $this->addProps(["disabled" => true]);
        return $this;
    }

    /**
     * @param $placeholder
     * @return $this
     */
    public function setPlaceholder($placeholder)
    {
        $this->addProps(["placeholder" => $placeholder]);
        return $this;
    }

    /**
     * @param string|array $options
     * @return $this
     */
    public function addOptions($options)
    {
        if(is_string($options)) {
            $this->addProps(["options" => $options], true);
        }else if(is_array($options)){
            foreach ($options as $key => $value) {
                $this->addProps(["options" => [
                    "label" => $value,
                    "value" => $key
                ]], true);
            }
        }

        return $this;
    }

    /**
     * @return array
     * @throws UIException
     */
    public function toArray()
    {
        if($this->getProp("options") === null){
            throw new UIException('The options property of Dropdown component is missing!');
        }
        return parent::toArray();
    }
}