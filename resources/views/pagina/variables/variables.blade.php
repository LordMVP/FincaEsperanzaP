@extends('pagina.template.principal')

@section('titulo', 'Usuarios')

@section('js1')

@endsection

@section('pagina', 'Variables')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Listado Variables
        </h3>
    </div>
</div>
<a class="btn btn-info" href=" {{ route('variables.create') }} ">
    Nueva Variable
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
                                    Variable
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Descripción
                                </th>
                                <th>
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($variables as $variable)
                            <tr class="odd gradeX">
                                <td>
                                    X<sub>{{ $variable->variable }}</sub>
                                </td>
                                <td>
                                    {{ $variable->nombre }}
                                </td>
                                <td>
                                    {{ $variable->descripcion }}
                                </td>
                                <td>
                                    <a class="glyphicon glyphicon-pencil btn btn-info" href=" {{ route('variables.edit', $variable->idvariables) }} ">
                                    </a>
                                    <a class="glyphicon glyphicon-trash btn btn-danger" href=" {{ route('variables.destroy', $variable->idvariables) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! Form::button('Volver', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
                </div>
                <div class="text-left">
                    {!! $variables->render() !!}
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