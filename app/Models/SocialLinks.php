<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    use HasFactory;
    protected $fillable=[
        'contact_email', 'contact_number', 'social_facebook', 'social_instagram', 'social_twitter', 'social_email', 'question_text'
    ];
}
