<?php

namespace tools\writing {

    use tools\writing\Core as Core;
/**
 * Класс Ручка
 */
    class Pen {

        protected $core;

        /**
         * @param type $color - цвет стержня ручки
         * @param type $fuel - количество символов, которые может написать эта ручка
         */
        public function __construct($color, $fuel) {
            $this->fill($color, $fuel);
        }

        /**
         * Замена стержня в ручке
         * @param type $color - цвет стержня
         * @param type $fuel - количество символов, которые может написать этот стержень
         */
        public function fill($color, $fuel) {
            $this->core = new Core($color, $fuel);
        }

        /**
         * Пишет текст
         * @param type $string - текст, который хотим написать.
         */
        public function draw($string) {
            if ($this->core) {
                print $this->core->draw($string);
            }
        }

    }

}