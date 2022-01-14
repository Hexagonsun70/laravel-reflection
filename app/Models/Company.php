<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name',
        'email',
        'logos',
        'website',
    ];

    public $sortable = [
        'name',
        'email',
        'website',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
