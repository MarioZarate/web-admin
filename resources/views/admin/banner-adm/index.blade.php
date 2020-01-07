@extends('adminems::panel')

@section('content')

	<div class="col-md-12">

		<div class="panel panel-white">
			<div class="panel-heading">
				<h2 class="panel-title form-title"> Banners del home </h2>
				<a href="{{ route('banner-adm.create') }}" type="a" class="btn btn-success pull-right btn-addon m-b-sm btn-rounded btn-md"><i class="fa fa-plus"></i> Añadir nuevo </a>
			</div>

			<div class="panel-body">
				<table id="table" class="display table table-hover dataTable">
					<thead>
						<th> Fondo Desktop </th>
						<th> Título </th>
						<th> Texto Botón </th>
						<th> Enlace Botón </th>
						<th> ¿Visible en Home? </th>
						<th> Orden </th>
						<th class="tbl-action-col">  Acciones </th>
					</thead>

					<tbody>
						@foreach ($elements as $element)
							<tr data-id="{{ $element->id }}">
								<td> <img src="{{ asset($element->fondoDesktop) }}" alt="" class="ic-img"> </td>
								<td> {{$element->titulo}} </td>
								<td> {{$element->textoBtn}} </td>
								<td> <a href="{{$element->enlaceBtn}}" target="_blank">{{$element->enlaceBtn}} </td>
								<td style="text-align:center;"> {{ Form::checkbox('visible', $element->id, $element->visible, ['class' => 'form-control activarBanner']) }}  </td>
								<td> {{$element->orden}} </td>
								<td class="tbl-action-col">
									<a href="{{ route('banner-adm.edit' , ['slug' => $element->id]) }}" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	@include('adminems::preview')

@stop

@section('scripts')
    <script>
        $(function(){   
            
            $(".activarBanner").on("click", function(e){
                item = $(this);
                id = item.val();
                checked = item.is(":checked");
                console.log('entro');
            $.ajax({
                url : "{{ route('activar-banner') }}",
                type : 'post',
                dataType : 'json',
                data: { id: id, checked: checked },
                success : function(resultado) {                    
                    }
                });
            });

            
        });
    </script>
@endsection
