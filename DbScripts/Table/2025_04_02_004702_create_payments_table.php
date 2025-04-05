<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->decimal('amount', 8, 2); // قيمة الدفع
            $table->enum('payment_method', ['credit_card', 'paypal', 'cash', 'bank_transfer']); // طريقة الدفع
            $table->enum('status', ['pending', 'completed', 'failed']); // حالة الدفع
            $table->timestamp('paid_at')->nullable(); // وقت الدفع
            $table->foreignId('delivery_id')->nullable()->constrained('deliveries')->onDelete('set null'); // رابط للسائق (سائق الدفع النقدي)
           //استخدمنا nullable() لأن هذا العمود سيكون فارغًا إذا لم يكن الدفع نقديًا (أي إذا كانت طريقة الدفع ليست كاش
            //driver_id:هذا العمود هو الذي سيرتبط بالسائق الذي استلم الدفع/ إذا كان الدفع نقديا / للإشارة إلى السائق الذي استلم الدفع
            $table->unsignedBigInteger('card_id');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
