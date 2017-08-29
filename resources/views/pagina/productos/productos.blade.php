@extends('pagina.template.principal')

@section('titulo', 'Productos')

@section('js1')

@endsection

@section('pagina', 'Productos')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Listado Productos
        </h3>
    </div>
</div>
<a class="btn btn-info" href=" {{ route('productos.create') }} ">
    Nuevo Producto
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
                                    Producto
                                </th>
                                <th>
                                    Categoria
                                </th>
                                <th>
                                    Precio
                                </th>
                                <th>
                                    Precio en stock
                                </th>
                                <th>
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($productos); $i++)
                            <tr class="odd gradeX">
                                <td>
                                    {{ $productos[$i]->name }}
                                </td>
                                <td>
                                    {{ $productos[$i]->nombre }}
                                </td>
                                <td>
                                    {{ $productos[$i]->price }}
                                </td>
                                <td>
                                    {{ $productos[$i]->wholesale_price }}
                                </td>
                                <td>
                                    <a class="glyphicon glyphicon-pencil btn btn-info" href=" {{ route('productos.edit', $productos[$i]->id_product) }} ">
                                    </a>
                                    <a class="glyphicon glyphicon-trash btn btn-danger" href=" {{ route('productos.destroy', $productos[$i]->id_product) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')">
                                    </a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    {!! Form::button('Volver', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
                </div>
                <div class="text-left">

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