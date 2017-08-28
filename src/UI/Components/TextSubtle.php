<?php

namespace Aubruz\Mainframe\UI\Components;

use Aubruz\Mainframe\UI\ChildComponent;

/**
 * Class TextSubtle
 * @package Aubruz\Mainframe\UI\Components
 */
class TextSubtle extends ChildComponent
{

    /**
     * CheckboxGroup constructor.
     * @param $title
     */
    function __construct($title = '')
    {
        parent::__construct();
        $this->setType("Author");
        $this->canHaveChildren();
        $this->addProps([
            "title"    => $title
        ]);
        return $this;
    }

}