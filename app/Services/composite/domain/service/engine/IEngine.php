<?php

namespace App\Services\composite\domain\service\engine;

interface IEngine
{
    public function process($treeId, $userId, $treeRich, $decisionMatter);
}
