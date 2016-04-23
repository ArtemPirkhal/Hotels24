<?php

namespace tools\writing {

    use tools\writing\Pen as Pen;

    /**
     * Класс Авторучка
     */
    class Autopen extends Pen {

        protected $readyForUse = false;

        /**
         * Пишет, только если включена.
         * @param String $string - строка, которую надо вывести
         */
        public function draw($string) {
            if ($this->readyForUse) {
                parent::draw($string);
            }
        }

        /**
         * Переключает состояния ручки вкл/выкл
         */
        public function toggle() {
            $this->readyForUse = !$this->readyForUse;
        }

    }

}