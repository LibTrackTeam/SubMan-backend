<?php

class Service
{
    private $id;
    private $name;
    private $icon;
    private $color;

    public function __construct(
        $id,
        $name,
        $icon,
        $color
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->color = $color;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_icon()
    {
        return $this->icon;
    }

    public function set_icon($icon)
    {
        $this->icon = $icon;
    }

    public function get_color()
    {
        return $this->color;
    }

    public function set_color($color)
    {
        $this->color = $color;
    }
}