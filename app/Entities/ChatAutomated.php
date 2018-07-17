<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="chat_automateds")
 */
class ChatAutomated
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="chat_automateds")
     * @ORM\JoinColumn(name="user_id", onDelete="SET NULL", nullable=true)
     */
    protected $user;

    /**
     * @var Vendor
     * @ORM\ManyToOne(targetEntity="Vendor", inversedBy="chat_automateds")
     * @ORM\JoinColumn(name="vendor_id", onDelete="SET NULL", nullable=true)
     */
    protected $vendor;
}
