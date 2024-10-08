<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'dateTime'];

    /**
     *  Many to many relation with User model
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     *  Many to many relation wuth Category model
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
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
