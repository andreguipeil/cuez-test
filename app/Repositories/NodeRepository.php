<?php

namespace App\Repositories;

use App\Models\Node;
use App\Models\TypeNode;
use Illuminate\Support\Facades\DB;
class NodeRepository
{
    public function findById($id)
    {
        return Node::find($id);
    }

    public function create(array $data)
    {
        return Node::create($data);
    }

    public function findByBlockField($blockField)
    {
        return Node::where('block_field', $blockField)->get();
    }

    public function findChildrensById(Node $node)
    {
        return Node::where('parent_id', $node->id)->get();
    }

    public function findFirstByTypeNodeId(TypeNode $typeNode)
    {
        return Node::firstWhere('type_node_id', $typeNode->id);
    }

    public function countChildrensNodesById(Node $node) {
        return 10;
    }
}
