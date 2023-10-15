<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oex_question_master extends Model
{
    use HasFactory;

    protected $table="tbl_question_master";

    protected $primaryKey="id";
    protected $fillbale=['exam_id','questions','ans','options','status'];
}
