<?php

class Builder
{


   public static function Input($type,$name,$value,$options = []){
       $label_title = $options['label_title']??'';
       $col         = $options['col']??'col-lg-12';
       $id          = $options['id']??$name;
       $use_trans   = $options['use_trans']??true;
       $disabled    = isset($options['disabled']) && $options['disabled'] ? 'disabled' : '';
       $readonly   = isset($options['readonly']) && $options['readonly'] ? 'disabled' : '';
       $is_required = isset($options['is_required']) ? '<span class="text-danger">*</span>' : '';
       $placeholder = ucfirst($options['placeholder']??$label_title);
       $value       = old($name)??$value;

       if ($use_trans){
           $label_title = trans($label_title);
           $placeholder = trans($placeholder);
       }



       $input = '<div class="'.$col.'" >';
           $input .= '<div class="form-group">';
               $input .= '<label for="'.$id.'" class="text-right">'.$label_title.' '.$is_required.'</label>';
               $input .= '<div>';
                     $input .= '<input name="'.$name.'" type="'.$type.'" value="'.$value.'" class="form-control" '.$disabled.' '.$readonly.' placeholder="'.$placeholder.' '.$is_required.'" id="'.$id.'"/>';
                     if($error_message = self::GetValidationErrorMessage($name)){
                       $input .= '<span class="invalid-feedback d-block" role="alert">';
                             $input .= '<strong>'.$error_message .'</strong>';
                       $input .= '</span>';
                     }


                $input .= '</div>';// end div
            $input .= '</div>'; // end form-group
       $input .= '</div>';// end col

       return $input;
   }


   private static function GetValidationErrorMessage($name){
       if (session()->has('errors')){
           if (session()->get('errors')){
               if(isset(session()->get('errors')->getMessages()["$name"][0])){
                   return session()->get('errors')->getMessages()["$name"][0];
               }
           }
       }
       return null;
   }

}
