<?php

namespace App\Jobs;

use App\Models\Node;
use App\Services\DuplicationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class DuplicateNodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param Node $node
     * @param int|null $parentId
     */
    public function __construct(private readonly Node $node, private readonly ?int $parentId) {}

    /**
     * @param DuplicationService $duplicationService
     * @return void
     */
    public function handle(DuplicationService $duplicationService): void
    {
        $duplicationService->duplicate($this->node, $this->parentId);
    }
}
