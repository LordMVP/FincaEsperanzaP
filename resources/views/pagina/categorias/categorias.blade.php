@extends('pagina.template.principal')

@section('titulo', 'Usuarios')

@section('js1')

@endsection

@section('pagina', 'categorias')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Listado categorias
        </h3>
    </div>
</div>
<a class="btn btn-info" href=" {{ route('categorias.create') }} ">
    Nueva categoria
</a>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr class="odd gradeX">
                                <td>
                                    {{ $categoria->nombre }}
                                </td>
                                <td>
                                @if($categoria->estado == '1')
                                    ACTIVO
                                @else
                                    INACTIVO
                                @endif
                                </td>
                                <td>
                                    <a class="glyphicon glyphicon-pencil btn btn-info" href=" {{ route('categorias.edit', $categoria->idcategoria) }} ">
                                    </a>
                                    <a class="glyphicon glyphicon-trash btn btn-danger" href=" {{ route('categorias.destroy', $categoria->idcategoria) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! Form::button('Volver', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
                </div>
                <div class="text-left">
                    {!! $categorias->render() !!}
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection


@section('js2')

@endsection
</hr>