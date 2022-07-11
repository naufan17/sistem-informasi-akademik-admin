<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Attendance extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year',
        'semester',
        'minimum_attendance_mdnu',
        'attendance_mdnu',
        'minimum_attendance_asrama',
        'attendance_asrama',
        'id_santri',
    ];

}
