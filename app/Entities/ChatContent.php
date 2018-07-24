<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="chat_contents")
 */
class ChatContent
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Chat
     * @ORM\ManyToOne(targetEntity="Chat", inversedBy="chat_contents")
     * @ORM\JoinColumn(name="chat_id", onDelete="SET NULL", nullable=true)
     */
    protected $chat;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="chat_contents")
     * @ORM\JoinColumn(name="user_id", onDelete="SET NULL", nullable=true)
     */
    protected $user;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="chat_contents")
     * @ORM\JoinColumn(name="for_user_id", onDelete="SET NULL", nullable=true)
     */
    protected $for_user;

    /**
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    protected $content;

    /**
     * @var boolean
     * @ORM\Column(name="is_read",type="boolean")
     */
    protected $is_read;

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
