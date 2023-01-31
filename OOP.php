<?php

class Car {

    public $brand = 'Mitsubishi';

    function change_brand($name) {
        $this->brand = $name;
    }

    function show_car() {
        echo $this->brand;
    }
}

class Color extends Car {
    public $color;

    function add_color($name) {
        $this->color = $name;
        echo $this->color;

        echo $this->show_car();
    }
}

?>