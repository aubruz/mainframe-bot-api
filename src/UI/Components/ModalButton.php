<?php

namespace Aubruz\Mainframe\UI\Components;

use Aubruz\Mainframe\UI\UIButton;
use Aubruz\Mainframe\Exceptions\UIException;

/**
 * Class ModalButton
 * @package Aubruz\Mainframe\UI\Components
 */
class ModalButton extends UIButton
{

    /**
     * ModalButton constructor.
     * @param $title
     */
    public function __construct($title)
    {
        parent::__construct($title);
    }

    /**
     * @param $type
     * @return $this
     * @throws UIException
     */
    public function setType($type)
    {
        if(!in_array($type, ["copy_url", "open_url", "close_modal", "message_embed", "post_payload", "form_post"])) {
            throw new UIException('The type of a MenuButton must be either "copy_url", "open_url", "close_modal", "message_embed", "post_payload" or "form_post"!');
        }
        return parent::setType($type);
    }

    /**
     * @param $style
     * @return $this
     */
    public function setStyle($style)
    {
        $this->setProp('style', $style);
        return $this;
    }

    /**
     * @param $payload
     * @return $this
     * @throws UIException
     */
    public function setPayload($payload)
    {
        return parent::setPayload($payload);
    }

    /**
     * @param $url
     * @return $this
     * @throws UIException
     */
    public function setUrl($url)
    {
        if(!in_array($this->getProp("type"), ["copy_url", "open_url"])) {
            throw new UIException('To set an url, the type of the button must be either "copy_url" or "open_url"!');
        }
        return parent::setUrl($url);
    }

    /**
     * @return array
     * @throws UIException
     */
    public function toArray()
    {
        if($this->getProp("type") === null){
            throw new UIException('The type property hasn\'t been set!');
        }
        return parent::toArray();
    }

}