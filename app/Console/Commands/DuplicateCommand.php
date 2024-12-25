<?php

namespace App\Console\Commands;

use App\Models\TypeNode;
use App\Repositories\NodeRepository;
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
//        private readonly NodeService $nodeService,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rootId = $this->argument('rootNode');

        $this->info('Starting the duplication');

        $typeNode = TypeNode::find($rootId);
        $nodeRoot = $this->nodeRepository->findFirstByTypeNodeId($typeNode);
        $nodes = $this->nodeRepository->findChildrensById($nodeRoot);

    }
}
