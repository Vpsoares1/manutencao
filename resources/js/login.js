$(document).ready(function () {

    $("#Entrar").click(function () {


        if ($("#email").val() === "" && $("#senha").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha o email e a senha!',
            });
            return;
        }

        if ($("#email").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha o email!',
            });
            return;
        }


        if ($("#senha").val() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Preencha a senha!',
            });
            return;
        }

        var letras = $("#senha").val().length;
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
                email: $("#email").val(),
                senha: $("#senha").val()
            },
            success: function (response) {
                console.log(response);
                if (response.erro == 'n') {
                    alert(response.token);
                    $.cookie("token", response.token, { expires: 7 });
                    $.cookie("usuario_id", response.usuario_id, { expires: 7 });
                    SetTimeout(function () {
                        window.location.href = "../home";
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
