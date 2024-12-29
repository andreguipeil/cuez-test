<?php

namespace App\Services;

use App\Events\ProcessDuplicationEvent;
use App\Jobs\DuplicateNodeJob;
use App\Models\Node;
use App\Repositories\NodeRepository;
use Illuminate\Support\Facades\DB;

readonly class DuplicationService
{
    public function __construct(
        public NodeRepository $nodeRepository
    ) {}

    // based on Breadth-First Search algorithm
    public function duplicate(Node $node, ?int $parentId = null): void
    {
        // transaction guarantees security and atomicity of operation
        $nodeDuplicated = DB::transaction(function () use ($node, $parentId) {
            return $this->addNodeRaw($node, $parentId);
        });

        $childrens = $this->nodeRepository->findChildrensById($node);
        foreach ($childrens as $child) {
            DuplicateNodeJob::dispatch($child, $nodeDuplicated);
        }
    }

    private function addNodeRaw(Node $node, ?int $parentId = null): int
    {
        // Prepare the data for insertion
        $data = [
            'type_node_id' => $node->type_node_id,
            'parent_id' => $parentId,
            'media' => $node->media,
            'block_field' => $node->block_field,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Use a raw query to insert the data into the database
        $newNodeId = DB::table('nodes')->insertGetId($data);

        // Dispatch an event to handle post-processing
        ProcessDuplicationEvent::dispatch($newNodeId);

        return $newNodeId;
    }
}
