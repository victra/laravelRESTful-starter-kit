<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @Gedmo\SoftDeleteable(fieldName="deleted_at", timeAware=false)
 */
class User extends ParentEntities
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $location;
    
    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $image;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $provider;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $provider_id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $username;

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="users")
     * @ORM\JoinColumn(name="role_id", onDelete="SET NULL", nullable=true)
     */
    protected $role;

    /**
     * @var Vendor
     * @ORM\ManyToOne(targetEntity="Vendor", inversedBy="users")
     * @ORM\JoinColumn(name="vendor_id", onDelete="SET NULL", nullable=true)
     */
    protected $vendor;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birth_date;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $gender;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone_2;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $code;

    /**
     * @var boolean
     * @ORM\Column(name="is_active",type="integer")
     */
    protected $is_active;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    protected $referral;

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
