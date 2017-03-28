<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class AgentDecline
{
    const REASON_CONFLICT = 'conflict';
    const REASON_TRAVEL = 'travel';
    const REASON_OTHER = 'other';

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Choice({
     *     AgentDecline::REASON_CONFLICT,
     *     AgentDecline::REASON_TRAVEL,
     *     AgentDecline::REASON_OTHER
     * })
     */
    private $reason;

    /**
     * @var string
     */
    private $notice;

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * @param string $notice
     *
     * @return $this
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;

        return $this;
    }

    /**
     * @Assert\IsTrue(message = "You must place an reason")
     */
    public function isNoticeValid()
    {
        if ($this->getReason() !== self::REASON_OTHER) {
            return true;
        }

        if (!empty($this->getNotice())) {
            return true;
        }

        return false;
    }
}
