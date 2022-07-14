<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->text('details')->nullable(); // يقصد بـ nullable أنه عبارة عن حقل غير فارغ وبنفس الوقت غير موجود .. أي بمعنى أنه إذا لم يقم المستخدم بوضع أي معلومات ضمن هذا الحقل لا يتم معاتبته إطلاقاً ولكن في حال لم يتم وضع nullable فإن المستخدم سيكون مجبر إضافتها وفي حال لم يضفها لا يتم قبول هذه المعلومات
            // على سبيل المثال يمكن إضافة nullable على الـ phoneNumber وذلك لأنه يعتبر حساس وخاص وقد لا يرغب بعض المستخدمين من إضافته إلى جانب معلوماتهم الشخصية
            // وبالتالي تكون الـ nullable عبارة عن شيء اختياري وشخصي يمكن إضافته أو لا يمكننا

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
