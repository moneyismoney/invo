<?php

use Phalcon\Mvc\Model;

/**
 * Types of User`s business (similar to ProductTypes.php)
 */
class BusinessTypes extends Model
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var string
     */
    public $type;


}
