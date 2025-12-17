<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','body']; //تحديد الحقول التي يمكنها الدخول للداتا بيس تسميتها بالاسم
    // protected $guarded = []; // السماح لكافه البيانات بالدخول للداتا بيس من خلال كرييت اراي ولكن لا ينصح به
    // protected $guarded = ['title']; // السماح بدخول الجميع البيانات عدا التايتل
    // protected $guarded = ['email']; // السماح بدخول الجميع البيانات عدا الايميل

     /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

     #كويري سكوب بخليك تعمل كويري تقدر تستخدمو في المودل بتاع الجدول بتاعك بتحتاجو لمن يكون
     #عندك كويري بتستخدمو كتير بدل ما كل شويه بتكتبو من الصفر بتعمل كويري سكوب جديد للمودل بتاعك في اللارافيل وبمجرد ما تجي تحتاج تستخدمو بتستخدمو بكل سهول بالطريقه دي علي سبيل المثال
     #return Post::mohammed()->first();
     #ودي تعتبر تبع الEloquent ORM model

    public function scopemohammed($query)
    {
        return $query->where('id', '=', 2);
    }
}
