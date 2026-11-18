$(document).ready(function () {
    
    $('#cadastrar').click(function () {
        
        if ($('#descricao').val() === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, preencha a descrição.'
            });
            return false;
        }
        let usuario_id = $.cookie('usuario_id');
        let token = $.cookie('token');


        console.log($('#solicitanteSelect').val());

        $.ajax({
            type: 'POST',
            url: '../api/cadastro_solicitacao',
            data: {
                usuario_id_cadastro: $('#solicitanteSelect').val(),
                sala_id: $('#salaSelect').val(),
                status_manutencao_id: $('#statusSelect').val(),
                descricao: $('#descricao').val(),
                usuario_id: usuario_id,
                token: token
            },
            success: function (response) {
                console.log(response);
                if(response.erro == 'n'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text:' Solicitação cadastrada com sucesso.'
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Erro ao cadastrar solicitação.'
                    });
                }

            
            }
        });
    });
});
