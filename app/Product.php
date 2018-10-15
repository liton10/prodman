<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Traits\Sortable;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Sortable;
    /**
     * Table name.
     *
     * @var string $table
     */
    protected $table = "products";
    protected $perPage =10;
    public $sortable = ['name', 'price'];

    // Validations rules definitions
    public static function getRules()
    {
        return [
            'select_file'  => 'sometimes|required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'name'  => 'required|min:5|max:50',
            'description'  => 'required|min:5|max:500',
            'price'  => 'required|numeric|max:10000',
        ];
    }
    
}
