<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'id_course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_course',
        'course',
        'book',
        'status_course',
        'id_grade',
        'id_schedule',
        'id_ustadz',
    ];

}
