<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'user_id',
        'gender'
    ];

    // protected $guarded = ['id'];

    public function toggleSold() {
        $this->is_sold = !$this->is_sold;
        $this->save();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','asc');
    }

    public function scopeName(Builder $query, string $name): Builder
    {
        return $query->where('name', 'like', "%$name%");
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }
    
    public function scopeHighestPrice(Builder $query): Builder
    {
        return $query->orderBy('price', 'desc');
    }

    public function scopeLowestPrice(Builder $query): Builder
    {
        return $query->orderBy('price', 'asc');
    }

    public function scopeOnStock(Builder $query): Builder|QueryBuilder
    {
        return $query->where('is_sold', false);
    }

    public function scopeOffStock(Builder $query): Builder|QueryBuilder
    {
        return $query->where('is_sold', true);
    }

    public function scopeMale(Builder $query): Builder|QueryBuilder
    {
        return $query->where('gender', 'male');
    }

    public function scopeFemale(Builder $query): Builder|QueryBuilder
    {
        return $query->where('gender', 'female');
    }

    public function scopeUnisex(Builder $query): Builder|QueryBuilder
    {
        return $query->where('gender', 'unisex');
    }

    public function scopeKids(Builder $query): Builder|QueryBuilder
    {
        return $query->where('gender', 'kids');
    }
}
