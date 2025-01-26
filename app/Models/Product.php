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

    public function scopeNew(Builder $query): Builder|QueryBuilder
    {
        return $query->where('status', 'baru');
    }

    public function scopeUsed(Builder $query): Builder|QueryBuilder
    {
        return $query->where('status', 'bekas');
    }

    public function scopeTas(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'tas');
    }

    public function scopeBaju(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'baju');
    }
    
    public function scopeCelana(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'celana');
    }

    public function scopeRok(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'rok');
    }

    public function scopeSepatu(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'sepatu');
    }

    public function scopeTopi(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'topi');
    }

    public function scopeKacamata(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'kacamata');
    }

    public function scopeHandphone(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'handphone');
    }

    public function scopeTelevisi(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'televisi');
    }

    public function scopeMonitor(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'monitor');
    }

    public function scopeLaptop(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'laptop');
    }

    public function scopeKeyboard(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'keyboard');
    }

    public function scopeMouse(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'mouse');
    }

    public function scopeKursi(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'kursi');
    }

    public function scopeSofa(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'sofa');
    }

    public function scopeKasur(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'kasur');
    }

    public function scopeMeja(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'meja');
    }

    public function scopeLainnya(Builder $query): Builder|QueryBuilder
    {
        return $query->where('category', 'lainnya');
    }
}
