<?php

namespace tools\writing {

    use tools\writing\Autopen as Autopen;
    use consts\Color as Color;

    /**
     * класс Механический карандаш
     */
    class MechPensil extends Autopen {

        protected $cores;

        /**
         * Создает карандаш серого цвета
         * @param array $fuelCores - набор стержней (указывать только цыфры - количество символов, которые можно написать каждым стержнем)
         */
        public function __construct($fuelCores = array(100)) {
            $this->fill($fuelCores);
        }

        /**
         * Заправляет карандаш стержнями серого цвета
         * @param array $fuelCores - набор стержней (указывать только цыфры - количество символов, которые можно написать каждым стержнем)
         */
        public function fill($fuelCores = array(100)) {
            $this->cores = $fuelCores;
            parent::fill(Color::GRAY, array_pop($this->cores));
        }

        /**
         * Добавляет один стержень к существующим
         * @param long $fuel - количество символов, которое можно написать данным карандашом
         */
        public function add($fuel) {
            array_push($this->cores, $this->core);
            $this->core = new CoreVO(Color::GRAY, $fuel);
        }

        /**
         * Пишет только в случае, если действующий стержень существует. Если стержень исписался - переключает карандаш в режим выкл.
         * @param String $string - строка, которую надо написать
         */
        public function draw($string) {
            parent::draw($string);
            if ($this->core && $this->core->isEmpty()) {
                $this->core = null;
                $this->readyForUse = false;
            }
        }

        /**
         * переключает состояние карандаша. Если стержня нет - вставляет следующий.
         */
        public function toggle() {
            if (!$this->core) {
                parent::fill(Color::GRAY, array_pop($this->cores));
            }
            parent::toggle();
        }

    }

}