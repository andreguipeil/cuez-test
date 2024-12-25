<?php

namespace App\Models;

use Database\Factories\NodeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Node extends Model
{
    /** @use HasFactory<NodeFactory> */
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'media',
        'block_field',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the parent node.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    /**
     * Get the children nodes.
     */
    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    /**
     * Get the node type.
     */
    public function typeNode(): BelongsTo
    {
        return $this->belongsTo(TypeNode::class);
    }
}
