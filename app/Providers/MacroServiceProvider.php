<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Texto
        \Form::macro('stdText', function($label, $required , $name, $errors = null , $text = null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::text($name , null , ['class' => 'form-control', 'placeholder' => '', 'data-toggle' => 'tooltip' , 'title' => $text, 'data-placement' => 'right', 'data-trigger' => 'focus']);
            if ($errors) $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            $item .= '</div>';

            return $item;
        });

        //Color Picker
        \Form::macro('stdColor', function($label, $required , $name, $errors = null) {

            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= '<div id="cpl" data-format="alias" class="input-group colorpicker-component">';
            $item .= \Form::text($name , null, ['class' => 'form-control']);
            $item .= '<span class="input-group-addon"><i id="codColor"></i></span>';
            $item .= '</div>';
            $item .= '</div>';

            return $item;
        });
        

        //URL
        \Form::macro('stdUrl', function($label, $required, $name, $errors = null , $link = null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::text($name , null , ['class' => 'form-control', 'placeholder' => '']);
            // $item .= '<span class="help-block help-text"><strong> '.$help_text.' </strong></span>';
            if ($errors) $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            $item .= '</div>';

            return $item;
        });

        //Área de Texto with tools
        \Form::macro('CKEditor', function($label, $required , $name, $errors = null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::textarea($name , null , ['class' => 'ckeditor', 'placeholder' => '', 'rows' => '4x4']);
            if ($errors) $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            $item .= '</div>';

            return $item;
        });

        //Área de Texto
        \Form::macro('stdTextArea', function($label, $required, $name, $errors = null, $value = null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::textarea($name, $value, ['class' => 'form-control', 'placeholder' => '', 'rows' => '4x4']);
            if ($errors) $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            $item .= '</div>';
 
            return $item;
        });

        //DDL
         \Form::macro('stdSelect', function($label, $required,  $name, $values, $placeholder) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::select($name , $values, null , ['class' => 'form-control', 'placeholder' => $placeholder]);
            $item .= '</div>';

            return $item;
        });

        //Número entero
        \Form::macro('stdNumber', function($label, $required , $name, $errors = null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::number($name , null , ['class' => 'form-control', 'placeholder' => '']);
            if ($errors) $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            $item .= '</div>';

            return $item;
        });

        \Form::macro('stdImg', function($label, $required , $name, $path = null, $errors = null, $size = null) {


            $nombre_imagen = '';

            if ($path) {
                $nombre_imagen = array_last(explode('/', $path));
                $extension = explode('.' , $nombre_imagen);
                $real_ext = array_pop($extension);
            }

            $item  = '<label class="col-sm-2 control-label"> <strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8 imagen-array">';
            $item .= '<p class="title-image-flm"> '. $nombre_imagen.' </p>';
            $item .= '<div class="ui fluid btn-group">';
            $item .= '<a data-input="'.$name.'" class="btn btn-custom fm-button btn-lg">  <i class="fa fa-folder-open"></i> Ver Galería </a>';
            $item .= \Form::text($name , $path ? $path : null , ['id' => $name , 'class' => 'input-flm', 'placeholder' => '', 'hidden' => true]);

            if ($path && $real_ext != 'pdf') {
                $item .= '<a class="btn btn-custom btn-lg preview-flm" data-name="'.$path.'"> <i class="fa fa-eye"> </i></a>';
            }

            if ($path) $item .= '<a class="btn btn-danger btn-lg delete-flm" data-name="'.$path.'"> <i class="fa fa-trash"> </i></a>';

            $item .= '</div>';
            $item .= '<span class="help-block"><strong>  '.$size.' </strong></span>';

            if ($errors) {
                 $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            }
            $item .= '</div>';

            return $item;
        });

        \Form::macro('stdFile', function($label, $required , $name, $path = null, $errors = null) {

            $nombre_imagen = '';

            if ($path) {
                $nombre_imagen = array_last(explode('/', $path));
                $extension = explode('.' , $nombre_imagen);
                $real_ext = array_pop($extension);
            }

            $item  = '<label class="col-sm-2 control-label"> <strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8 imagen-array">';
            $item .= '<p class="title-image-flm"> '. $nombre_imagen.' </p>';
            $item .= '<div class="ui fluid btn-group">';
            $item .= '<a data-input="'.$name.'" class="btn btn-custom fm-button btn-lg">  <i class="fa fa-search"></i> Ver Galeria </a>';
            $item .= \Form::text($name , $path ? $path : null , ['id' => $name , 'class' => 'input-flm', 'placeholder' => '', 'hidden' => true]);

            if ($path && $real_ext != 'pdf') {
                $item .= '<a class="btn btn-custom btn-lg preview-flm" data-name="'.$path.'"> <i class="fa fa-eye"> </i></a>';
            }

            if ($path) $item .= '<a class="btn btn-danger btn-lg delete-flm" data-name="'.$path.'"> <i class="fa fa-trash"> </i></a>';

            $item .= '</div>';

            if ($errors) {
                 $item .= $errors->first($name, '<span class="help-block"><strong> :message </strong></span>');
            }
            $item .= '</div>';

            return $item;
        });

        \Form::macro('gMaps', function($label, $errors = null , $help_text = null) {

            $item  = '<label class="col-sm-2 control-label"> <strong> '.$label.' </strong> </label>';
            $item .= '<div class="col-sm-7">';
            $item .= \Form::text('address'   , null , ['class' => 'form-control input' , 'placeholder' => 'Ingresar dirección']);
            $item .= \Form::text('latitude'  , null , ['id' => 'latitude' , 'hidden' => true]);
            $item .= \Form::text('longitude' , null , ['id' => 'longitude', 'hidden' => true]);
            if ($errors) {
                 $item .= $errors->first('address', '<span class="help-block"><strong> :message </strong></span>');
            }
            $item .= '<br>';
            $item .= '<div id="gmaps" style="width:100%;height:400px"></div>';


            $item .= '</div>';
            $item .= '<div class="col-sm-2"><a class="btn btn-info" id="buscar"> Buscar </a></div>';

            return $item;
        });

        \Form::macro('stdDate' , function($label, $required , $name, $errors, $value = null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
                 if ($required == 1) $item .= '<span class="required"> * </span>';
                  $item .= '</strong></label>';
                  $item .= '<div class="col-sm-8">';
                  $item .= '<div class="input-group date date-picker">';
                  $item .= \Form::text($name, $value ? $value->format('Y-m-d') : null , ['class' => 'form-control']);
                  $item .= '<span class="input-group-addon">';
                  $item .= '<span class="glyphicon glyphicon-calendar"></span>';
                  $item .= '</span>';
                  $item .= '</div>';
                  $item .= '</div>';

            return $item;
        });

        /*
         *******************************************************************************************************
         ************************************ UTILS PARA ARMAR LOS ARRAY ***************************************
         *******************************************************************************************************
         */
        \Form::macro('imageArray', function($label, $nombre, $required , $count, $path = null){

            $name = $nombre.$count;
            $nombre_imagen = '';

            if ($path) {
                $nombre_imagen = array_last(explode('/', $path));
                $extension = explode('.' , $nombre_imagen);
                $real_ext = array_pop($extension);
            }

            $item  = '<div class="group-img-input row">';
            $item .= '<label class="col-sm-2 control-label"> <strong> '. $label .' </strong>';
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</label>';
            $item .= '<div class="col-sm-8 imagen-array">';
            $item .= '<p class="title-image-flm"> '.$nombre_imagen.' </p>';
            $item .= '<div class="ui fluid btn-group">';
            $item .= '<div data-input="'.$name.'" class="btn btn-custom array-item fm-button btn-lg">  <i class="fa fa-folder-open"></i> Ver Galería </div>';
            $item .= '<input type="hidden" id="'.$name.'" name="'.$nombre.'[]" class="input-flm" value="'.$path.'" >';
            if ($path && $real_ext != 'pdf') {
                $item .= '<a class="btn btn-default btn-lg preview-flm" data-name="'.$path.'"> <i class="fa fa-eye"> </i></a>';
            }

            if ($path) $item .= '<a class="btn btn-danger btn-lg delete-flm" data-name="'.$path.'"> <i class="fa fa-trash"> </i></a>';
            $item .= '</div>';
            $item .= '</div>';
            $item .= '</div>';
            return $item;
        });

         \Form::macro('textArray', function($label, $required , $name, $value =null) {
            $item  = '<label class="col-sm-2 control-label"><strong> '.$label;
            if ($required == 1) $item .= '<span class="required"> * </span>';
            $item .= '</strong></label>';
            $item .= '<div class="col-sm-8">';
            $item .= \Form::text($name , $value ? $value : null, ['class' => 'form-control', 'placeholder' => '', 'data-toggle' => 'tooltip' , 'title' => null , 'data-placement' => 'right', 'data-trigger' => 'focus']);
            $item .= '</div>';

            return $item;
        });

        
       
        

        /*
         *******************************************************************************************************
         ************************************ ARRAY CUSTOM ***************************************
         *******************************************************************************************************
         */

        //un solo archivo
        \Form::macro('arraySoloUnArchivo', function($labelOneA, $archivoOneA , $countOne , $pathOne = null) {

            $item  = '<li class="arraySoloUnArchivo">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';

            $item .= '<div class="form-group">';
            $item .=  \Form::imageArray($labelOneA, $archivoOneA, 1 , $countOne , $pathOne);
            $item .= '</div>';

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        //un solo texto
        \Form::macro('arraySoloUnTexto', function($labelOneA, $textoOneA = null) {

            $item  = '<li class="arraySoloUnTexto">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';           

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($labelOneA, 1 , 'textoOneA[]', $textoOneA);
            $item .= '</div>';
            $item .= '</div>';   

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        //archivo y texto
        \Form::macro('arrayArchivoNombre', function($labelA, $archivoA , $count , $path = null , $label1A, $nombreA = null) {

            $item  = '<li class="arrayArchivoNombre">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';

            $item .= '<div class="form-group">';
            $item .=  \Form::imageArray($labelA, $archivoA, 1 , $count , $path);
            $item .= '</div>';

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label1A, 1 , 'nombreA[]', $nombreA);
            $item .= '</div>';
            $item .= '</div>'; 

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        //archivo, texto1 y texto2
        \Form::macro('arrayArchivoNombreDescripcion', function($lblA, $archA , $count , $path = null , $lbl1A, $nomA = null, $lbl2A, $desA = null) {

            $item  = '<li class="arrayArchivoNombreDescripcion">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';

            $item .= '<div class="form-group">';
            $item .=  \Form::imageArray($lblA, $archA, 1 , $count , $path);
            $item .= '</div>';

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($lbl1A, 1 , 'nomA[]', $nomA);
            $item .= '</div>';
            $item .= '</div>'; 

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($lbl2A, 0 , 'desA[]', $desA);
            $item .= '</div>';
            $item .= '</div>'; 

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        

        //texto1 y texto2
        \Form::macro('arrayTextoTexto', function($label1, $texto1A = null, $label2, $texto2A = null) {

            $item  = '<li class="arrayTextoTexto">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';           

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label1, 1 , 'texto1A[]', $texto1A);
            $item .= '</div>';
            $item .= '</div>';     
            
            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label2, 1 , 'texto2A[]', $texto2A);
            $item .= '</div>';
            $item .= '</div>'; 

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        //texto1 y texto2
        \Form::macro('arrayTextoTexto2', function($lbl1, $txt1A = null, $lbl2, $txt2A = null) {

            $item  = '<li class="arrayTextoTexto2">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';           

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($lbl1, 1 , 'txt1A[]', $txt1A);
            $item .= '</div>';
            $item .= '</div>';     
            
            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($lbl2, 1 , 'txt2A[]', $txt2A);
            $item .= '</div>';
            $item .= '</div>'; 

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        //texto1, texto2, texto3 y texto4
        \Form::macro('arrayTextoTextoTextoTexto', function($label1, $texto1A = null, $label2, $texto2A = null, $label3, $texto3A = null, $label4, $texto4A = null) {

            $item  = '<li class="arrayTextoTextoTextoTexto">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';           

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label1, 1 , 'texto1A[]', $texto1A);
            $item .= '</div>';
            $item .= '</div>';     
            
            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label2, 1 , 'texto2A[]', $texto2A);
            $item .= '</div>';
            $item .= '</div>'; 

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label3, 1 , 'texto3A[]', $texto3A);
            $item .= '</div>';
            $item .= '</div>';

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label4, 1 , 'texto4A[]', $texto4A);
            $item .= '</div>';
            $item .= '</div>';

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });

        

        //texto1, archivo, texto2
        \Form::macro('arrayCoverVideoTexto', function($labelA, $archivo1A , $count , $path = null, $label1, $texto1A = null, $label2, $texto2A = null) {

            $item  = '<li class="arrayCoverVideoTexto">';
            $item .= '<div class="group-items">';
            
            $item .= '<div class="float-elements"><a href="javascript:void(0);"> <i class="icon-trash group"></i> </a> </div>';           

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label1, 1 , 'texto1A[]', $texto1A);
            $item .= '</div>';
            $item .= '</div>';   

            $item .= '<div class="form-group">';
            $item .=  \Form::imageArray($labelA, $archivo1A, 1 , $count , $path);
            $item .= '</div>';

            $item .= '<div class="form-group">';
            $item .= '<div class="group-img-input row">';
            $item .=  \Form::textArray($label2, 1 , 'texto2A[]', $texto2A);
            $item .= '</div>';
            $item .= '</div>';   

            $item .= '</div>';
            $item .= '</li>';

            return $item;
        });




    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
