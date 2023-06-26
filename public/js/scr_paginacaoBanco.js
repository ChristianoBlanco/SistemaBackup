function getNextItem(data) {
    i = data.current_page + 1;
    if (data.current_page >= data.last_page)
        s = '<li class="page-item disabled">';
    else
        s = '<li class="page-item">';
    s += '<a class="btn btn-primary btn-block" ' + 'pagina="' + i + '" ' + ' href="javascript:void(0);" disabled >Próximo</a></li>';
    return s;
}
function getPreviousItem(data) {
    i = data.current_page - 1;
    if (data.current_page == 1)
        s = '<li class="page-item disabled">';
    else
        s = '<li class="page-item">';
    s += '<a class="btn btn-primary btn-block" ' + 'pagina="' + i + '" ' + ' href="javascript:void(0);">Anterior</a></li>';
    return s;
}
function getItem(data, i) {
    if (data.current_page == i)
        s = '<li class="page-item active">';
    else
        s = '<li class="page-item">';
    s += '<a class="btn btn-primary btn-block" ' + 'pagina="' + i + '" ' + ' href="javascript:void(0);">' + i + '</a></li>';
    return s;
}
function montarPaginator(data) {
    $("#paginationNav>ul>li").remove();
    $("#paginationNav>ul").append(
        getPreviousItem(data)
    );
    // for (i=1;i<=data.last_page;i++) {
    //     $("#paginationNav>ul").append(
    //         getItem(data,i)
    //     );
    // }
    n = data.last_page;
    if (data.current_page - n / 2 <= 1)
        inicio = 1;
    else if (data.last_page - data.current_page < n)
        inicio = data.last_page - n + 1;
    else
        inicio = data.current_page - n / 2;
    fim = inicio + n - 1;
    for (i = inicio; i <= fim; i++) {
        $("#paginationNav>ul").append(
            getItem(data, i)
        );
    }
    $("#paginationNav>ul").append(
        getNextItem(data)
    );
}

function montarLinha(banco) {
    
    
    if(banco.tipo_bd == 1){
        tipoBd = 'MySQL';

    }else{
        tipoBd = 'SQL';
    }

    return '<tr>' +
        '  <th scope="row">' + banco.id + '</th>' +
        '  <td>' + banco.name + '</td>' +
        '  <td>' + tipoBd + '</td>' +
        '  <td>' + banco.hostname + '</td>' +
        '  <td>' + banco.descricao + '</td>' +
        '  <td><a href="/ediBanco-edt/' + banco.id +
        ' "><i class="fa fa-edit" style="font-size: 23px; color:#1E90FF; margin-left:8px;" title="Editar"></i></a>  ' + 
        ' <a href="/delBanco-hard/' + banco.id +
        ' "><i class="far fa-trash-alt" style="font-size: 23px; color:#B22222; margin-left:8px;" title="Excluir"></i></a></td>' +
        '</tr>';
}

function montarTabela(data) {
    $("#tabelaGravacoes>tbody>tr").remove();
    for (i = 0; i < data.data.length; i++) {
        $("#tabelaGravacoes>tbody").append(
            montarLinha(data.data[i])
        );
    }
}
function carregarClientes(pagina) { //Função que pega do JSON as informações para montar a tabela
    $.get('/jsonBanco', {
        page: pagina
    }, function (resp) {
        console.log(
            resp
        ); //Console lof IMPORTANTE! para verificar pelo browser os campos via json p chamar no jscript. !!!!!
        console.log(resp.data.length);
        montarTabela(resp);
        montarPaginator(resp);
        $("#paginationNav>ul>li>a").click(function () {
            //console.log($(this).attr('pagina') );
            carregarClientes($(this).attr('pagina'));
        })
        $("#cardtitle").html("Exibindo " + resp.per_page +
            " clientes de " + resp.total +
            " (" + resp.from + " a " + resp.to + ")");
    });
}
$(function () {
    carregarClientes(1);
});
function Delete() {

  confirm("Confirmar Exclusão ?");

} 