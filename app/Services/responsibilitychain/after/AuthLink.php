<?php

namespace App\Services\responsibilitychain\after;

abstract class AuthLink
{
    protected $levelUserId;
    protected $levelUserName;
    protected $next = null;

    public function __construct(string $levelUserId, string $levelUserName)
    {
        $this->levelUserId = $levelUserId;
        $this->levelUserName = $levelUserName;
    }

    // 当最后一个的时候 next 是 null，因此这里不能写成  :AuthLink
    public function getNext(): ?AuthLink
    {
        return $this->next;
    }

    public function appendNext(AuthLink $next): AuthLink
    {
        $this->next = $next;
        return $this;
    }

    public abstract function doAuth(string $uId, string $orderId, $authDate): AuthInfo;
}
