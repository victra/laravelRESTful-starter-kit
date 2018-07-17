<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_devices")
 * @Gedmo\SoftDeleteable(fieldName="deleted_at", timeAware=false)
 */
class UserDevice extends ParentEntities
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $token;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $device;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_points")
     * @ORM\JoinColumn(name="user_id", onDelete="SET NULL", nullable=true)
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $app_version;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deleted_at;
}
