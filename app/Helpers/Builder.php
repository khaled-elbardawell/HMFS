<?php

namespace App\Helpers;

class Builder
{


    public static function Form($method,$action,$enctype = null){
        $method  = strtoupper($method);
        if ($method == 'GET' || $method == 'HEAD'){
            return'<form method="GET" action="'.$action.'>';
        }else{
            return self::$method($action,$enctype);
        }

    }

    private static function POST($action,$enctype){
        $enctype= isset($enctype) ? 'enctype='.$enctype : '';
        $form  = '<form method="POST" action="'.$action.'" '.$enctype.'>';
        $form .=  '<input type="hidden" name="_token" value="'.csrf_token().'">';
        return $form;
    }

    private static function PUT($action,$enctype){
        $form = self::POST();
        $form .=  '<input type="hidden" name="_method" value="PUT">';
        return $form;
    }

    private static function DELETE($action,$enctype){
        $form = self::POST();
        $form .=  '<input type="hidden" name="_method" value="DELETE">';
        return $form;
    }



    public static function EndForm()
    {
        return '</form>';
    }


    private static function DivContainerFieldBuilder($name,$value,$options = []){
        $label_title = $options['label_title']??'';
        $col         = $options['col']??'col-lg-12';
        $id          = $options['id']??$name;
        $use_trans   = $options['use_trans']??true;
        $is_required = isset($options['is_required']) ? '<span class="text-danger">*</span>' : '';

        if ($use_trans){
            $label_title = trans($label_title);
        }

        $input = '<div class="'.$col.'" >';
        $input .= '<div class="form-group">';
        $input .= '<label for="'.$id.'" class="text-right">'.$label_title.' '.$is_required.'</label>';
        $input .= '<div>';

        return $input;
    }

    private static function EndDivContainerFieldBuilder($name)
    {
        $input = '';
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


     public static function TextArea($name,$value,$options = []){
        $label_title = $options['label_title']??'';
        $rows        = $options['rows']??'5';
        $id          = $options['id']??$name;
        $use_trans   = $options['use_trans']??true;
        $disabled    = isset($options['disabled']) && $options['disabled'] ? 'disabled' : '';
        $readonly    = isset($options['readonly']) && $options['readonly'] ? 'disabled' : '';
        $is_required = isset($options['is_required']) ? '<span class="text-danger">*</span>' : '';
        $placeholder = ucfirst($options['placeholder']??$label_title);
        $value       = old($name)??$value;

        if ($use_trans){
            $placeholder = trans($placeholder);
        }

        $input = self::DivContainerFieldBuilder($name,$value,$options);
        $input .= '<textarea rows="'.$rows.'" name="'.$name.'"  class="form-control" '.$disabled.' '.$readonly.' placeholder="'.$placeholder.' '.$is_required.'" id="'.$id.'">'.$value.'</textarea>';
        $input .=self::EndDivContainerFieldBuilder($name);

        return $input;
    }




    public static function Input($type,$name,$value,$options = []){
       $label_title = $options['label_title']??'';
       $id          = $options['id']??$name;
       $use_trans   = $options['use_trans']??true;
       $disabled    = isset($options['disabled']) && $options['disabled'] ? 'disabled' : '';
       $readonly    = isset($options['readonly']) && $options['readonly'] ? 'disabled' : '';
       $is_required = isset($options['is_required']) ? '*' : '';
       $placeholder = ucfirst($options['placeholder']??$label_title);
       $value       = old($name)??$value;

       if ($use_trans){
           $placeholder = trans($placeholder);
       }

        $input = self::DivContainerFieldBuilder($name,$value,$options);
        $input .= '<input name="'.$name.'" type="'.$type.'" value="'.$value.'" class="form-control" '.$disabled.' '.$readonly.' placeholder="'.$placeholder.' '.$is_required.'" id="'.$id.'"/>';
        $input .= self::EndDivContainerFieldBuilder($name);
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



   public static function SwitchCheckBox($name,$checked,$options = []){
       $col         = $options['col']??'col-lg-12';
       $label_title = $options['label_title']??'';
       $id          = $options['id']??$name;
       $use_trans   = $options['use_trans']??true;
       $checked   =   $checked ? "checked" : '';
       $is_required = isset($options['is_required']) ? '*' : '';
       if (old($name)){
           $checked = "checked";
       }

       if ($use_trans){
           $label_title = trans($label_title);
       }

       $input = '<div class="'.$col.'" >';
       $input .= '<div class="form-group">';

       $input .= '<div class="custom-control custom-switch switch-success">';
       $input .= '<input name="'.$name.'" type="checkbox" class="custom-control-input" id="'.$id.'" '.$checked.'>';
       $input .= '<label for="'.$id.'" class="custom-control-label">'.$label_title.' '.$is_required.'</label>';


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



    public static function FileDropify($name,$checked,$options = []){
        $col         = $options['col']??'col-lg-12';
        $label_title = $options['label_title']??'';
        $id          = $options['id']??$name;
        $use_trans   = $options['use_trans']??true;
        $is_required = isset($options['is_required']) ? '<span class="text-danger">*</span>' : '';
        $note = isset($options['note']) ? $options['note'] : '';

        if ($use_trans){
            $label_title = trans($label_title);
        }


        $input = '<div class="'.$col.'" >';
        $input .= '<div class="form-group">';
        $input .= '<label for="'.$id.'" class="text-right">'.$label_title.' '.$is_required.'</label>';
        if ($note){
            $input .= '<small class="d-block text-danger mb-3">'.$note.'</small>';
        }
        $input .= '<div>';

        $input .= '<input name="'.$name.'" type="file" class="dropify"  id="'.$id.'"/>';


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


}
