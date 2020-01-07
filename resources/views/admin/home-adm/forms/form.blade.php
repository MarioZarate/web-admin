<div class="panel panel-white ui-sortable-handle" style="opacity: 1;">
    <div class="panel-heading">
        <h3 class="panel-title form-title"> Home - Bloque Dos</h3>
        <div class="panel-control">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-collapse" data-original-title="Expandir/Colapse"><i class="icon-arrow-down"></i></a>
        </div>
    </div>
    <div class="panel-body form-horizontal">

        <div class="form-group {{ $errors->has('tituloB2') ? 'has-error' : '' }}">
            {!! Form::stdText('Título' , 1 , 'tituloB2' , $errors) !!}
        </div>

        {{-- arrayB2 --}}
        <div class="form-group {{ $errors->has('arrayB2') ? 'has-error' : '' }}">
            <label class="col-sm-2 control-label"> <strong> Archivos <label class="required">*</label></strong> </label>
            <div class="col-sm-8 equipo-tres-array">
                <div class="collection only-for-array item1">
                    @if (isset($element)&& $element->arrayB2)
                        @foreach ($element->arrayB2 as $el)                        
                            {!! Form::arrayArchivoNombreDescripcion('Imagen','archA',$loop->index, $el['archA'],'Nombre', $el['nomA'],'Enlace', $el['desA']) !!}
                        @endforeach
                    @endif
                </div>
                <button type="button" class="btn btn-info add-to-collection-item1">Añadir +</button>
            </div>
        </div>

        <div class="form-group {{ $errors->has('descripcionB2') ? 'has-error' : '' }}">
            {!! Form::CKEditor('Descripción', 1, 'descripcionB2', $errors) !!}
        </div>        

    </div>
    <div class="panel-footer text-right">
        <strong> <span class="required"> * </span> Campos obligatorios </strong>
    </div>
</div>

<div class="panel panel-white ui-sortable-handle" style="opacity: 1;">
    <div class="panel-heading">
        <h3 class="panel-title form-title"> Home - Bloque Tres</h3>
        <div class="panel-control">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-collapse" data-original-title="Expandir/Colapse"><i class="icon-arrow-down"></i></a>
        </div>
    </div>
    <div class="panel-body form-horizontal">

        <div class="form-group {{ $errors->has('tituloB3') ? 'has-error' : '' }}">
            {!! Form::stdText('Título' , 1 , 'tituloB3' , $errors) !!}
        </div>

        <div class="form-group {{ $errors->has('descripcionB3') ? 'has-error' : '' }}">
            {!! Form::CKEditor('Descripción', 1, 'descripcionB3', $errors) !!}
        </div>        

    </div>
    <div class="panel-footer text-right">
        <strong> <span class="required"> * </span> Campos obligatorios </strong>
    </div>
</div>

<div class="panel panel-white ui-sortable-handle" style="opacity: 1;">
    <div class="panel-heading">
        <h3 class="panel-title form-title"> Home - Bloque Cuatro</h3>
        <div class="panel-control">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-collapse" data-original-title="Expandir/Colapse"><i class="icon-arrow-down"></i></a>
        </div>
    </div>
    <div class="panel-body form-horizontal">

        <div class="form-group {{ $errors->has('tituloIzqB4') ? 'has-error' : '' }}">
            {!! Form::stdText('Título Izquierda' , 1 , 'tituloIzqB4' , $errors) !!}
        </div>

        <div class="form-group {{ $errors->has('descripcionIzqB4') ? 'has-error' : '' }}">
            {!! Form::CKEditor('Descripción Izquierda', 1, 'descripcionIzqB4', $errors) !!}
        </div>   
        
        <div class="form-group {{ $errors->has('textoBtnIzqB4') ? 'has-error' : '' }}">
            {!! Form::stdText('Texto Botón Izquierda' , 1 , 'textoBtnIzqB4' , $errors) !!}
        </div>

        <div class="form-group {{ $errors->has('tituloDerB4') ? 'has-error' : '' }}">
            {!! Form::stdText('Título Derecha' , 1 , 'tituloDerB4' , $errors) !!}
        </div>

        <div class="form-group {{ $errors->has('descripcionDerB4') ? 'has-error' : '' }}">
            {!! Form::CKEditor('Descripción Derecha', 1, 'descripcionDerB4', $errors) !!}
        </div>   
        
        <div class="form-group {{ $errors->has('textoBtnDerB4') ? 'has-error' : '' }}">
            {!! Form::stdText('Texto Botón Derecha' , 1 , 'textoBtnDerB4' , $errors) !!}
        </div>

    </div>
    <div class="panel-footer text-right">
        <strong> <span class="required"> * </span> Campos obligatorios </strong>
    </div>
</div>

<div class="panel panel-white ui-sortable-handle" style="opacity: 1;">
    <div class="panel-heading">
        <h3 class="panel-title form-title"> Home - Bloque Cinco</h3>
        <div class="panel-control">
            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" class="panel-collapse" data-original-title="Expandir/Colapse"><i class="icon-arrow-down"></i></a>
        </div>
    </div>
    <div class="panel-body form-horizontal">

        <div class="form-group {{ $errors->has('tituloB5') ? 'has-error' : '' }}">
            {!! Form::stdText('Título' , 1 , 'tituloB5' , $errors) !!}
        </div>

        <div class="form-group {{ $errors->has('textoBtnB5') ? 'has-error' : '' }}">
            {!! Form::stdText('Texto Botón' , 1 , 'textoBtnB5' , $errors) !!}
        </div>      

    </div>
    <div class="panel-footer text-right">
        <strong> <span class="required"> * </span> Campos obligatorios </strong>
    </div>
</div>