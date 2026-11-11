$(document).ready(function () {

    $("#btnEntrar").click(function () {


        if ($("#cpfemail2").val() === "" && $("#senha3").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha o CPF ou email e a senha!',
            });
            return;
        }

        if ($("#cpfemail2").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha o CPF ou email!',
            });
            return;
        }


        if ($("#senha3").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha a senha!',
            });
            return;
        }

        var letras = $("#senha3").val().length;
        if (letras < 6) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'A senha deve ter no mínimo 6 caracteres!',
            });
            return;
        }

        $.ajax({
            url: "../api/login_funcionario",
            type: "POST",
            data: {
                email: $("#cpfemail2").val(),
                senha: $("#senha3").val(),
                cpf: $("#cpfemail2").val()
                
            },
            success: function (response) {
                console.log(response);
                console.log(response.funcionario_id, response.token);
                if (response.erro == 'n') {
                    $.cookie("token", response.token, { expires: 7, path: '/' });
                    $.cookie("funcionario_id", response.funcionario_id, { expires: 7, path: '/' });
                    setTimeout(function () {
                        window.location.href = "../manutencao";
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.erro,
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ocorreu um erro na requisição. Por favor, tente novamente.',
                });
            }
        });

    });
});