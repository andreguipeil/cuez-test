<?php

namespace App\Services;

use App\Models\Node;
use App\Repositories\NodeRepository;

class DuplicationService
{
    public function __construct(
        readonly NodeRepository $nodeRepository
    ) {}

    // based on Breadth-First Search algorithm
    public function duplicate(Node $node, Node $parent = null, bool $first = false): bool
    {
        $nodeDuplicated = $this->addNode($node, $parent);

        $childrens = $this->nodeRepository->findChildrensById($node);
        foreach ($childrens as $child) {
            $this->duplicate($child, $nodeDuplicated);
        }

        return true;
    }

    private function addNode(Node $node, ?Node $parent = null): Node
    {
        $newNode = new Node();
        $newNode->type_node_id = $node->type_node_id;
        $newNode->parent_id = $parent?->id;
        $newNode->media = $node->media;
        $newNode->block_field = $node->block_field;

        $newNode->save();

        return $newNode;
    }
}
