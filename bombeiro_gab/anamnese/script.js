function mostrarCaixaTexto(idOpcao, idCaixaTexto) {
    var opcao = document.getElementById(idOpcao);
    var caixaTexto = document.getElementById(idCaixaTexto);

    if (opcao.checked) {
        caixaTexto.style.display = "block";
    } else {
        caixaTexto.style.display = "none";
    }
}