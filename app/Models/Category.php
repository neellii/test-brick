<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'status'];

    
     /**
     *  Many to many relation to Event model
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     *  Attribute to correctly display status of the event record
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function(int $value) {
                if($value === 1) {
                    return 'Активно';
                } elseif($value === 0) {
                    return 'Неактивно';
                }

                return 'некорректный статус';
            }
        );
    }
}
