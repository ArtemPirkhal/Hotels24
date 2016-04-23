<?php

namespace tools\writing {

    use tools\writing\MechPensil as MechPensil;

    /**
     * Класс Мультистержневая ручка
     */
    class MultiCorePen extends MechPensil {

        
        private function coreExists($coreID) {
            return $coreID >=0 && $coreID < count($this->cores);
        }
        /**
         * Замена всех стержней
         * @param array $cores - массив стержней (обьекты CoreVO)
         */
        public function fill($cores) {
            $this->cores = $cores;
        }

        /**
         * Замена одного стержня
         * @param long $coreID - идентификатор стержня, который нужно заменить
         * @param CoreVO $core - новый стержень
         */
        public function fillCore($coreID, $core) {
            $this->cores[$coreID] = $core;
        }

        /**
         * Пишет только в случае, если включена.
         * @param String $string - строка которую нужно написать
         */
        public function draw($string) {
            if ($this->readyForUse) {
                parent::draw($string);
            }
        }

        /**
         * Выбрать стержень, которым писать
         * @param long $coreID - идентификатор стержня.
         */
        public function selectCore($coreID = 0) {
            if ($this->cores && $this->coreExists($coreID)){
            $this->core = $this->cores[$coreID];
            $this->readyForUse = true;
            }
        }

        /**
         * переключает состояни ручки выкл/вкл.
         */
        public function toggle() {
            if ($this->core) {
                $this->readyForUse = !$this->readyForUse;
            } else {
                $this->selectCore();
            }
        }

    }

}