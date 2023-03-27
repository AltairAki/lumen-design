<?php

namespace App\Services\adapter\after;

class RebateInfo
{
    private  $userId;
    private  $bizId;
    private  $bizTime;
    private  $desc;

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    public function getBizId() {
        return $this->bizId;
    }

    public function setBizId(string $bizId) {
        $this->bizId = $bizId;
    }

    public function getBizTime() {
        return $this->bizTime;
    }

    public function setBizTime(string $bizTime) {
        $this->bizTime = $bizTime;
    }

    public function getDesc() {
        return $this->desc;
    }

    public function setDesc(string $desc) {
        $this->desc = $desc;
    }

    public function toString()
    {
        // JSON_UNESCAPED_UNICODE  json_encode 函数的第二个可选参数，保存时保存 UNICODE 码，这样中文就会原样保存
        return json_encode(get_object_vars($this));
    }
}
