<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
  
       return[
       'minpoints'=>'sometimes|required|integer|gte:0',  
       'pointsrate'=>'sometimes|required|integer|gte:0',  
    //    'desc'=>'nullable|string',   
    //    'meta'=>'nullable|string',   
        
       
       
       
       ];   
    
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array<string, string>
 */
public function messages(): array
{
//    $maxlength=500;
//    $minMobileLength=10;
//    $maxMobileLength=15;
   return[
     'name.string'=>__('messages.this field is required',[],'ar') ,
    //  'desc.string'=>__('messages.this field is required',[],'en') ,
    //  'meta.string'=>__('messages.this field is required',[],'en') ,
    ];
    
}
}
