$.fn.select2.defaults.set('language', 'pt-BR');

$('.sector').select2({
    placeholder: "Selecione uma seção",
    allowClear: true
});
$('.type').select2({
    placeholder: "Selecione o tipo",
    allowClear: true
});
$('.status').select2({
    placeholder: "Selecione o status",
    allowClear: true
});
$('.sys_op_architecture').select2({
    placeholder: "Selecione a arquitetura",
    allowClear: true
});
$("#computer-sector-show").select2({
    disabled : true
});
$("#computer-type-show").select2({
    disabled : true
});
$("#computer-status-show").select2({
    disabled : true
});
$("#computer-sys_op_architecture-show").select2({
    disabled : true
});
$("#printer-sector-show").select2({
    disabled : true
});
$("#printer-type-show").select2({
    disabled : true
});
$("#printer-status-show").select2({
    disabled : true
});
$("#printer-sys_op_architecture-show").select2({
    disabled : true
});
$("#monitor-status-show").select2({
    disabled : true
});
$("#monitor-sector-show").select2({
    disabled : true
});


// $(document).ready(function () {
//     $('#computer-list').DataTable({
//         info: false,
//         "language": {
//             search: "Pesquisa na tabela:",
//             sZeroRecords: "Não há registro que corresponda a pesquisa",
//             sInfo: "Mostrando _START_ to _END_ of _TOTAL_ registros",
//             sLengthMenu: "Mostrando _MENU_ registros",
//             oPaginate: {
//                 "sFirst": "Primero",
//                 "sLast": "Último",
//                 "sNext": "Seguinte",
//                 "sPrevious": "Anterior"
//             },
//         }
//     });
// });

$(document).ready(function () {
    var t = $('#computer-list').DataTable({
        info: false,
        "language": {
            search: "Pesquisa na tabela:",
            sZeroRecords: "Não há registro que corresponda a pesquisa",
            sInfo: "Mostrando _START_ to _END_ of _TOTAL_ registros",
            sLengthMenu: "Mostrando _MENU_ registros",
            oPaginate: {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Seguinte",
                "sPrevious": "Anterior"
            },
        },
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[1, 'asc']]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    setTimeout(function() {
        $('#msg').fadeOut('fast');
    }, 3000);


});

$(document).ready(function () {
    var t = $('#printer-list').DataTable({
        info: false,
        "language": {
            search: "Pesquisa na tabela:",
            sZeroRecords: "Não há registro que corresponda a pesquisa",
            sInfo: "Mostrando _START_ to _END_ of _TOTAL_ registros",
            sLengthMenu: "Mostrando _MENU_ registros",
            oPaginate: {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Seguinte",
                "sPrevious": "Anterior"
            },
        },
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[1, 'asc']]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    setTimeout(function() {
        $('#msg').fadeOut('fast');
    }, 3000);


});

$(document).ready(function () {
    var t = $('#monitor-list').DataTable({
        info: false,
        "language": {
            search: "Pesquisa na tabela:",
            sZeroRecords: "Não há registro que corresponda a pesquisa",
            sInfo: "Mostrando _START_ to _END_ of _TOTAL_ registros",
            sLengthMenu: "Mostrando _MENU_ registros",
            oPaginate: {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Seguinte",
                "sPrevious": "Anterior"
            },
        },
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[1, 'asc']]
    });

    t.on('order.dt search.dt', function () {
        t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    setTimeout(function() {
        $('#msg').fadeOut('fast');
    }, 3000);


});