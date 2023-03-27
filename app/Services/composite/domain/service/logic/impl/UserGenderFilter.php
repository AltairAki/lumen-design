<?php

namespace App\Services\composite\domain\service\logic\impl;

use App\Services\composite\domain\service\logic\BaseLogic;

class UserGenderFilter extends BaseLogic
{
    public function matterValue(int $treeId, string $userId, array $decisionMatter): string
    {
        return $decisionMatter['gender'];
    }
}
