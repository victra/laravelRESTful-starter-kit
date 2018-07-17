<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="chat_content_reads")
 */
class ChatContentRead
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="chats")
     * @ORM\JoinColumn(name="user_id", onDelete="SET NULL", nullable=true)
     */
    protected $user;

    /**
     * @var ChatContent
     * @ORM\ManyToOne(targetEntity="ChatContent", inversedBy="chat_content_reads")
     * @ORM\JoinColumn(name="chat_content_id", onDelete="SET NULL", nullable=true)
     */
    protected $chat_content;

    /**
     * @var boolean
     * @ORM\Column(name="is_read",type="boolean")
     */
    protected $is_read;
}
