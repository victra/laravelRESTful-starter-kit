<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;


abstract class ParentEntities
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    protected $hash_id;
}