<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the major that owns the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }

    /**
     * Get the student that owns the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the grade associated with the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

}
