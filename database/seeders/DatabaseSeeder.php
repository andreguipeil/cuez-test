<?php

namespace Database\Seeders;

use App\Models\Node;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TypeNode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);


        TypeNode::factory()->create([
            'name' => 'Episode'
        ]);

        TypeNode::factory()->create([
            'name' => 'Part'
        ]);

        TypeNode::factory()->create([
            'name' => 'Item'
        ]);
        TypeNode::factory()->create([
            'name' => 'Block'
        ]);

        // === episodes
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => null,
            'type_node_id' => 1
        ]);

        // === parts
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 1,
            'type_node_id' => 2
        ]);

        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 1,
            'type_node_id' => 2
        ]);

        // === items
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 2,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 2,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 2,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 3,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 3,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 3,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'media' => null,
            'block_field' => null,
            'parent_id' => 3,
            'type_node_id' => 3
        ]);

        // === blocks

        Node::factory()->create([
            'parent_id' => 6,
            'type_node_id' => 3
        ]);
        Node::factory()->create([
            'parent_id' => 6,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 6,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 7,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 7,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 7,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 8,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 8,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 5,
            'type_node_id' => 4
        ]);
        Node::factory()->create([
            'parent_id' => 5,
            'type_node_id' => 4
        ]);
    }
}
