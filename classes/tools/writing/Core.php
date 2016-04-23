<?php

namespace tools\writing {

    use consts\Color as Color;

    /**
     * Класс стержень
     */
    class Core {

        private $color;
        private $fuel;

        /**
         * @param type $color - цвет стержня.
         * @param type $fuel - количество символов, которые может нарисовать стержень.
         */
        public function __construct($color = Color::BLACK, $fuel = 100) {
            $this->color = $color;
            $this->fuel = $fuel;
        }

        /**
         * Возвращает цветную строку.
         * @param type $string - строка, которую надо написать
         * @return string - строка оформленная цветом
         */
        public function draw($string) {
            $result = '';
            if ($this->fuel > 0) {
                $requiredFuel = strlen($string);
                if ($this->fuel < $requiredFuel) {
                    $result = '<font color="' . $this->color . '">' . substr($string, 0, $this->fuel) . '</font>';
                } else {
                    $result = '<font color="' . $this->color . '">' . $string . '</font>';
                }
                $this->fuel -= $requiredFuel;
            }
            return $result;
        }

        /**
         * @return type true - если пустой, false если еще может писать
         */
        public function isEmpty() {
            return $this->fuel < 1;
        }

    }

}