<?php

namespace App\Entity;

use App\Repository\ChatMessagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChatMessagesRepository::class)
 */
class ChatMessages
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="text")
     */
    private $request_message;

    /**
     * @ORM\Column(type="text")
     */
    private $response_message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $send_datetime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getRequestMessage(): ?string
    {
        return $this->request_message;
    }

    public function setRequestMessage(string $request_message): self
    {
        $this->request_message = $request_message;

        return $this;
    }

    public function getResponseMessage(): ?string
    {
        return $this->response_message;
    }

    public function setResponseMessage(string $response_message): self
    {
        $this->response_message = $response_message;

        return $this;
    }

    public function getSendDatetime(): ?\DateTimeInterface
    {
        return $this->send_datetime;
    }

    public function setSendDatetime(\DateTimeInterface $send_datetime): self
    {
        $this->send_datetime = $send_datetime;

        return $this;
    }
}
