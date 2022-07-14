<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // من خلالها يتم المناداة على المكتبة softDeletes

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;  // من خلالها يجب أن نبين له أننا نستخدم الـ softDeletes
    protected $fillable = ['name','price','details'];
    // كما تحدثنا سابقاً فإنه يتم حماية قاعدة البيانات من المعلومات الغير مهمة
    // وبالتالي لا بد من إنشاء هذا المتغير للدلالة على البيانات التي يسمح للمستخدم بإدخالها
    protected $dates = ['deleted_at']; // من خلالها سيعرف أن حالة الـ delete ستكون عن طريق الـ softDeletes
}
