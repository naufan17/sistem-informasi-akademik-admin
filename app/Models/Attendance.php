<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Attendance extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_attendance',
        'minimum_attendance_mdnu',
        'attendance_mdnu',
        'minimum_attendance_asrama',
        'attendance_asrama',
        'id_santri',
        'id_course',
    ];

}
