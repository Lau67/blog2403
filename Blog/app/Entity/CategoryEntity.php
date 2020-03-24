<?php

namespace app\Entity;

use core\Entity\Entity;

class CategoryEntity extends Entity{

        public function getUrl(){
            return 'index.php?p=posts.category&id=' . $this->id;
        }

      


}