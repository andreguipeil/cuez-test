<?php

namespace Database\Factories;

use App\Models\Node;
use App\Models\TypeNode;
use Illuminate\Database\Eloquent\Factories\Factory;

class NodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media' => $this->faker->name(),
            'block_field' => $this->faker->name(),
            'parent_id' => null || Node::factory(),
            'type_node_id' => TypeNode::factory(),
        ];
    }

    /**
     * Set the parent node for this node.
     *
     * @param Node|int|null $parent
     * @return $this
     */
    public function setParent($parent = null)
    {
        return $this->state(function (array $attributes) use ($parent) {
            return [
                'parent_id' => $parent instanceof Node ? $parent->id : $parent,
            ];
        });
    }

    /**
     * Set the type node for this node.
     *
     * @param TypeNode|int|null $typeNode
     * @return $this
     */
    public function setTypeNode($typeNode = null)
    {
        return $this->state(function (array $attributes) use ($typeNode) {
            return [
                'type_node_id' => $typeNode instanceof TypeNode ? $typeNode->id : $typeNode,
            ];
        });
    }
}
