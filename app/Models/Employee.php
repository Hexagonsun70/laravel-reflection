<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
    ];

    protected $sortable = [
        'company_id',
        'first_name',
        'last_name',
        'email'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhereHas('company', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });
    }
}
