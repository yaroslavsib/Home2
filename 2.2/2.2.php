<?php
    
class Color {
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue) {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }
    public function __toString() {
        return $this->red.", ".$this->green.", ".$this->blue;
    }

}

abstract class Component {
    public $color;
    public $width;
    public $height;

    abstract public function render();
}


class Rectangle extends Component {

    public function __construct(Color $color, $width, $height) {
        $this->color = $color;
        $this->width = $width;
        $this->height = $height;
    }

    public function render() {
        echo "<div style=\"background-color:RGB($this->color); width: ".$this->width."px; height: ".$this->height."px;\"></div>";
    }
}

class BorderRectangle extends Rectangle {
    public $borderColor;

    public function __construct(Color $color, $width, $height, $borderColor) {
        parent::__construct($color, $width, $height);
        $this->borderColor = $borderColor;
    }

    public function render() {
        echo "<div style=\"background-color:RGB($this->color); width: ".$this->width."px; height: ".$this->height."px; border: solid 5px ".$this->borderColor.";\"></div>";
    }
}

class PositionedRectangle extends Rectangle {
    public $left_margin;
    public $top_margin;

    public function __construct(Color $color, $width, $height, $left_margin, $top_margin) {
        parent::__construct($color, $width, $height);
        $this->left = $left_margin;
        $this->top = $top_margin;
    }
    public function render() {
        echo "<div style=\"background-color:RGB($this->color); width: ".$this->width."px; height: ".$this->height."px; position: absolute; left: ".$this->left."px; top: ".$this->top."px;\"></div>";
    }
}

class Renderer {
    public $objects;

    public function __construct($objects) {
        $this->objects = $objects;
    }
    public function render() {
        for($i=0; $i<count($this->objects); $i++) {
            $this->objects[$i]->render();
            echo "<br>";
        }
    }
}


$color = new Color(155, 50, 50);
$rect = new Rectangle($color, 100, 150);
$rectColor = new BorderRectangle($color, 100, 50, 'green');
$posRectangle = new PositionedRectangle($color, 100, 150, 100, 500);
$component_objects = array($rect, $rectColor, $posRectangle);
$comp = new Renderer($component_objects);
$comp->render();