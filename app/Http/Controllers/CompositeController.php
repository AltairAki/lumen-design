<?php

namespace App\Http\Controllers;

use App\Services\composite\domain\model\aggregates\TreeRich;
use App\Services\composite\domain\model\vo\TreeNode;
use App\Services\composite\domain\model\vo\TreeNodeLink;
use App\Services\composite\domain\model\vo\TreeRoot;
use App\Services\composite\domain\service\engine\impl\TreeEngineHandle;

class CompositeController extends Controller
{

    private $treeRich;

    public function init()
    {


        // 节点：1
        $treeNode_01 = new TreeNode();
        $treeNode_01->setTreeId(10001);
        $treeNode_01->setTreeNodeId(1);
        $treeNode_01->setNodeType(1);
        $treeNode_01->setNodeValue(null);
        $treeNode_01->setRuleKey("userGender");
        $treeNode_01->setRuleDesc("用户性别[男/女]");

        // 链接：1->11
        $treeNodeLink_11 = new TreeNodeLink();
        $treeNodeLink_11->setNodeIdFrom(1);
        $treeNodeLink_11->setNodeIdTo(11);
        $treeNodeLink_11->setRuleLimitType(1);
        $treeNodeLink_11->setRuleLimitValue("man");

        // 链接：1->12
        $treeNodeLink_12 = new TreeNodeLink();
        $treeNodeLink_12->setNodeIdFrom(1);
        $treeNodeLink_12->setNodeIdTo(12);
        $treeNodeLink_12->setRuleLimitType(1);
        $treeNodeLink_12->setRuleLimitValue("woman");

        $treeNodeLinkList_1 = [];
        $treeNodeLinkList_1 [] = $treeNodeLink_11;
        $treeNodeLinkList_1 [] = $treeNodeLink_12;

        $treeNode_01->setTreeNodeLinkList($treeNodeLinkList_1);

        // 节点：11
        $treeNode_11 = new TreeNode();
        $treeNode_11->setTreeId(10001);
        $treeNode_11->setTreeNodeId(11);
        $treeNode_11->setNodeType(1);
        $treeNode_11->setNodeValue(null);
        $treeNode_11->setRuleKey("userAge");
        $treeNode_11->setRuleDesc("用户年龄");

        // 链接：11->111
        $treeNodeLink_111 = new TreeNodeLink();
        $treeNodeLink_111->setNodeIdFrom(11);
        $treeNodeLink_111->setNodeIdTo(111);
        $treeNodeLink_111->setRuleLimitType(3);
        $treeNodeLink_111->setRuleLimitValue("25");

        // 链接：11->112
        $treeNodeLink_112 = new TreeNodeLink();
        $treeNodeLink_112->setNodeIdFrom(11);
        $treeNodeLink_112->setNodeIdTo(112);
        $treeNodeLink_112->setRuleLimitType(5);
        $treeNodeLink_112->setRuleLimitValue("25");

        $treeNodeLinkList_11 = [];
        $treeNodeLinkList_11[] = $treeNodeLink_111;
        $treeNodeLinkList_11 [] = $treeNodeLink_112;

        $treeNode_11->setTreeNodeLinkList($treeNodeLinkList_11);

        // 节点：12
        $treeNode_12 = new TreeNode();
        $treeNode_12->setTreeId(10001);
        $treeNode_12->setTreeNodeId(12);
        $treeNode_12->setNodeType(1);
        $treeNode_12->setNodeValue(null);
        $treeNode_12->setRuleKey("userAge");
        $treeNode_12->setRuleDesc("用户年龄");

        // 链接：12->121
        $treeNodeLink_121 = new TreeNodeLink();
        $treeNodeLink_121->setNodeIdFrom(12);
        $treeNodeLink_121->setNodeIdTo(121);
        $treeNodeLink_121->setRuleLimitType(3);
        $treeNodeLink_121->setRuleLimitValue("25");

        // 链接：12->122
        $treeNodeLink_122 = new TreeNodeLink();
        $treeNodeLink_122->setNodeIdFrom(12);
        $treeNodeLink_122->setNodeIdTo(122);
        $treeNodeLink_122->setRuleLimitType(5);
        $treeNodeLink_122->setRuleLimitValue("25");

        $treeNodeLinkList_12 = [];
        $treeNodeLinkList_12[] = $treeNodeLink_121;
        $treeNodeLinkList_12[] = $treeNodeLink_122;

        $treeNode_12->setTreeNodeLinkList($treeNodeLinkList_12);


        // 节点：111
        $treeNode_111 = new TreeNode();
        $treeNode_111->setTreeId(10001);
        $treeNode_111->setTreeNodeId(111);
        $treeNode_111->setNodeType(2);
        $treeNode_111->setNodeValue("果实A");

        // 节点：112
        $treeNode_112 = new TreeNode();
        $treeNode_112->setTreeId(10001);
        $treeNode_112->setTreeNodeId(112);
        $treeNode_112->setNodeType(2);
        $treeNode_112->setNodeValue("果实B");

        // 节点：121
        $treeNode_121 = new TreeNode();
        $treeNode_121->setTreeId(10001);
        $treeNode_121->setTreeNodeId(121);
        $treeNode_121->setNodeType(2);
        $treeNode_121->setNodeValue("果实C");

        // 节点：122
        $treeNode_122 = new TreeNode();
        $treeNode_122->setTreeId(10001);
        $treeNode_122->setTreeNodeId(122);
        $treeNode_122->setNodeType(2);
        $treeNode_122->setNodeValue("果实D");

        // 树根
        $treeRoot = new TreeRoot();
        $treeRoot->setTreeId(10001);
        $treeRoot->setTreeRootNodeId(1);
        $treeRoot->setTreeName("规则决策树");

        $treeNodeMap = [
            1 => $treeNode_01,
            11 => $treeNode_11,
            12 => $treeNode_12,
            111 => $treeNode_111,
            112 => $treeNode_112,
            121 => $treeNode_121,
            122 => $treeNode_122,
        ];


        $this->treeRich = new TreeRich($treeRoot, $treeNodeMap);
    }

    public function after()
    {
        // 配置到数据库中实现动态决策树,这里模拟初始化
        $this->init();
        $treeEngineHandle = new TreeEngineHandle();

        /**
         * 测试数据
         * 果实A：gender=man、age=22
         * 果实B：gender=man、age=29
         * 果实C：gender=woman、age=22
         * 果实D：gender=woman、age=29
         */
        $decisionMatter = [];
        $decisionMatter['gender'] = 'man';
        $decisionMatter['age'] = '29';
        $result = $treeEngineHandle->process(10001, "Oli09pLkdjh", $this->treeRich, $decisionMatter);
        dd($result);
    }
}
