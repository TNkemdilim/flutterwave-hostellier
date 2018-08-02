<?php

namespace App\Http\Requests;

use App\Utilities\Response\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    use JsonResponse;
}
