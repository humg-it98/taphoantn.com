<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVnpayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vnpay', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('transaction_id')->nullable();
            $table->integer('customer_id ')->nullable();
            $table->float('money')->nullable()->comment('số tiền thanh toán');
            $table->string('vnp_response_code')->nullable()->comment('mã phản hồi');
            $table->string('code_vnpay')->nullable()->comment('mã giao dịch vnpay');
            $table->string('note')->nullable()->comment('ghi chú thanh toán');
            $table->string('code_bank')->nullable()->comment('ghi chú thanh toán');
            $table->datetime('time')->nullable()->comment('thời gian chuyển khoản');
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
        Schema::dropIfExists('vnpay');
    }
}
