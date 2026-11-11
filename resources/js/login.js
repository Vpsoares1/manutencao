$(document).ready(function () {

    $("#entrarBtn").click(function () {


        if ($("#cpfemail").val() === "" && $("#senha2").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha o CPF ou email e a senha!',
            });
            return;
        }

        if ($("#cpfemail").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha o CPF ou email!',
            });
            return;
        }


        if ($("#senha2").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha a senha!',
            });
            return;
        }

        var letras = $("#senha2").val().length;
        if (letras < 6) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'A senha deve ter no mínimo 6 caracteres!',
            });
            return;
        }

        $.ajax({
            url: "../api/login",
            type: "POST",
            data: {
                email: $("#cpfemail").val(),
                senha: $("#senha2").val()
            },
            success: function (response) {
                console.log(response);
                if (response.erro == 'n') {
                    $.cookie("token", response.token, { expires: 7 });
                    $.cookie("usuario_id", response.usuario_id, { expires: 7 });
                    setTimeout(function () {
                        window.location.href = "../tela_funcionario";
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