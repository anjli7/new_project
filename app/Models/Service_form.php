<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Service_form extends Model
    {
        use HasFactory;
        protected $table = 'service_form';
        protected $fillable = [
            'name',
            'email',
            'phone',
            'business',
            'service',
            'message',
        ];
    }


?>