@extends('fuse.template.master')

@section('content')
<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">add_circle</i> Cadastros</a></li>
        <li class="active"><i class="material-icons">account_circle</i> Clientes</li>
    </ol>
</div>
@if ($message = Session::get('success'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    CLIENTES
                </h2>
            </div>

            <br/>

            <div class="col-md-12">
	            <div class="pull-left">
	                <a class="btn btn-success waves-effect" href="{{ route('clientes.create') }}">CADASTRAR</a>
	            </div>
        	</div>

            <div class="body table-responsive">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CLIENTE</th>
                            <th>CPF</th>
                            <th>CELULAR</th>
                            <th width="28%"></th>
                        </tr>
                    </thead>
                    @foreach ($clientes as $cliente)
	                    <tbody>
	                        <tr>
	                            <th scope="row">{{ ++$i }}</th>
	                            <td>{{ $cliente->nome }}</td>
	                            <td>{{ $cliente->cpf }}</td>
	                            <td>{{ $cliente->telefone1 }}</td>
	                            <td class="text-center">
	                            	<a class="btn btn-info waves-effect" href="{{ route('clientes.show', $cliente) }}">DETALHAR</a>
	                            	<a class="btn btn-primary waves-effect" href="{{ route('clientes.edit', $cliente) }}">EDITAR</a>
                                    <form style="display: inline;" action="{{ route('clientes.destroy', $cliente->id) }}" 
                                        method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger waves-effect" value="DELETAR" name="deletar">
                                    </form>
	                        	</td>
	                        </tr>
	                    </tbody>
                    @endforeach
                </table>

                {!! $clientes->links() !!}
            	
            </div>
        </div>
    </div>
</div>
@endsection