<?php

namespace App\Console\Commands;

use App\Models\Node;
use App\Models\TypeNode;
use App\Repositories\NodeRepository;
use App\Services\DuplicationService;
use Exception;
use Illuminate\Console\Command;

class DuplicateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:duplicate {rootNode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        private readonly NodeRepository $nodeRepository,
        private readonly DuplicationService $duplicationService,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Starting the duplication');
        $rootId = $this->argument('rootNode');

        try {
            $nodeRoot = Node::findOrFail($rootId);
            $parent = null;

            // If the root node has a parent,
            // we get the parent node to keep the reference
            // just to keep the reference of parent node
            // the duplication is always top -> down
            // top = root node
            // down = nodes childrens
            if ($nodeRoot->parent_id !== null) {
                $parent = $this->nodeRepository->findById($nodeRoot->parent_id);
            }

            $this->duplicationService->duplicate($nodeRoot, $parent, true);
        } catch (Exception $e) {
            $this->info($e->getMessage());
        }
    }
}
