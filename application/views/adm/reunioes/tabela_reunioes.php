<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
    function salvaId(id) {
        sessionStorage.setItem("id_reuniao", id);
    }
    function cancelar() {
        sessionStorage.removeItem("id_reuniao");
    }
    function confirmar(url) {
        var aUrl = url;
        var id_reuniao = sessionStorage.getItem("id_reuniao");
        cancelar();
        window.location.href = aUrl + 'gerenciar/reuniao/excluir/' + id_reuniao;
    }
</script>


<table id="tabela" class="table table-bordered">
    <thead>
        <tr>
            <th>Título</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        {reuniao}
        <tr>
            <td> {titulo} </td>
            <td> <a class="btn btn-primary" href="{url}gerenciar/reuniao/editar/{id_reuniao}"><i class="fa fa-edit"></i></a>  </td>
            <td> <a class="btn btn-danger" href="#" onclick="salvaId({id_reuniao})" data-target="#confirma" data-toggle="modal"><i class="fa fa-trash"></i></a> </td>
        </tr>
        {/reuniao}
    </tbody>
</table>

<div class="col-sm-12" style="margin-top: 2%; margin-bottom: 2%;">
    <a class="btn btn-success" href="{url}gerenciar/reuniao/adicionar"> <i class="fa fa-plus-circle"></i> Adicionar</a>
</div>

<div class="modal fade" id="confirma">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deseja excluir?</h5>
                <button onclick="cancelar();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Deseja mesmo excluir o registro? Não será possivel desfazer.
                </p>
            </div>
            <div class="modal-footer">
                <button onclick="cancelar();" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                <button onclick="confirmar('{url}');" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>