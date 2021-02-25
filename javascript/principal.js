// _____________________ MODULO CHAVES ______________________________________
// -------------------- cadastrar chave INICIO -----------------------

const btn_confirmar_cadastrar_chave = document.getElementById('btn-confirmar-cadastrar-chave');
btn_confirmar_cadastrar_chave.onclick = function () {

    var controle = "1";
    const input_cadastrar_numero_sala = document.getElementById('input-cadastrar-numero-sala').value;
    const input_cadastrar_nome_sala = document.getElementById('input-cadastrar-nome-sala').value;

    if (input_cadastrar_numero_sala == '' || input_cadastrar_numero_sala == null || input_cadastrar_nome_sala == '' || input_cadastrar_nome_sala == null) {

        var html = "";
        html += '<div class="alert alert-warning" role="alert">';
        html += 'Favor preencher todos os campos';
        html += '</div>';
        document.getElementById('confirmacao-cadastrar-chave').innerHTML = html;
        return false;

    } else {

        var body = {
            controle: controle,
            cadastrar_numero_sala: input_cadastrar_numero_sala,
            cadastrar_nome_sala: input_cadastrar_nome_sala
        }

        var jsonbody = JSON.stringify(body);
        xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {

            var html = "";
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr);
                var resposta = xhr.responseText.replace(/(\r\n|\n|\r)/gm, "");
                if (resposta == "1") {

                    html += '<div class="alert alert-success" role="alert">';
                    html += 'Chave inserida com sucesso';
                    html += '</div>';
                    document.getElementById('confirmacao-cadastrar-chave').innerHTML = html;

                } else if (resposta == "Chave já existente no sistema") {

                    html += '<div class="alert alert-danger" role="alert">';
                    html += '' + resposta + '';
                    html += '</div>';
                    document.getElementById('confirmacao-cadastrar-chave').innerHTML = html;

                } else {
                    html += '<div class="alert alert-danger" role="alert">';
                    html += 'Erro ao inserir chave.<strong> Contate o admiministrador</strong>';
                    html += '</div>';
                    document.getElementById('confirmacao-cadastrar-chave').innerHTML = html;
                }
            }
        }

        xhr.open("POST", "functions.php");
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(jsonbody);
    }

}

// -------------------- cadastrar chave FIM -------------------------

// _____________________ MODULO EMPRESTAR ______________________________________

// -------------------- Listar chaves / funcionario INICIO ------------------------

const select_chave_emprestar = document.getElementById('select-chave-emprestar');
const select_funcionario_emprestar = document.getElementById('select-funcionario-emprestar');

window.onload = function () {

    listarChavesFuncionarios();
    
}

function listarChavesFuncionarios() {
    var controle = "2";

    var body = {
        controle: controle
    }

    var jsonbody = JSON.stringify(body);

    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {
            var resposta = JSON.parse(xhr.responseText);

            var html = "";
            var html2 = "";
            html += '<option value="" selected disabled>Chave...</option>';
            html2 += '<option value="" selected disabled>Funcionario...</option>';

            console.log(resposta);
            for (var i = 0; i < resposta.length; i++) {
                for (var j = 0; j < resposta[i].length; j++) {
                    if (resposta[i][j].hasOwnProperty('numero_chave')) {

                        html += '<option value="' + resposta[i][j]['numero_chave'] + '">' + resposta[i][j]['numero_chave'] + ' – ' + resposta[i][j]['nome_sala'] + '</option>';
                    } else {
                        html2 += '<option value="' + resposta[i][j]['id'] + '">' + resposta[i][j]['nome_funcionario'] + '</option>';
                    }
                }
            }

            select_chave_emprestar.innerHTML = html;
            select_funcionario_emprestar.innerHTML = html2;
            listarChavesEmprestadas();
        }
    }

    xhr.open("POST", "functions.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(jsonbody);
}

// -------------------- Listar chaves / funcionario FIM ------------------------
// -------------------- Confirmar Empréstimo INICIO ----------------------------

const btn_emprestar_chave = document.getElementById('btn-emprestar-chave');

btn_emprestar_chave.onclick = function () {

    if (select_chave_emprestar.value == '' || select_chave_emprestar.value == null || select_funcionario_emprestar.value == '' || select_funcionario_emprestar.value == null) {

        var html = "";
        html += '<div class="alert alert-warning" role="alert">';
        html += 'Favor preencher todos os campos';
        html += '</div>';
        document.getElementById('confirmacao-emprestar-chave').innerHTML = html;
        return false;

    } else {

        var controle = "5";

        body = {
            controle: controle,
            chave: select_chave_emprestar.value,
            funcionario: select_funcionario_emprestar.value
        }

        var jsonbody = JSON.stringify(body);

        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                var resposta = xhr.responseText.replace(/(\r\n|\n|\r)/gm, "");

                if (resposta != "0") {

                    var html = "";
                    html += '<div class="alert alert-success" role="alert">';
                    html += resposta;
                    html += '</div>';
                    document.getElementById('confirmacao-emprestar-chave').innerHTML = html;
                    listarChavesEmprestadas();
                    listarChavesFuncionarios();
                    wait();

                } else {
                    var html = "";
                    html += '<div class="alert alert-danger" role="alert">';
                    html += 'Erro no empréstimo, tente novamente. Caso o erro persista contate o DTI';
                    html += '</div>';
                    document.getElementById('confirmacao-emprestar-chave').innerHTML = html;
                }
            }
        }

        xhr.open("POST", "functions.php");
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(jsonbody);
    }

}

// -------------------- Confirmar Empréstimo FIM -------------------------------

// -------------------- Listar Chaves Emprestadas INICIO -----------------------

function listarChavesEmprestadas() {

    var controle = "6";
    var html = "";

    body = {
        controle: controle
    }

    var jsonbody = JSON.stringify(body);

    xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            var resposta = JSON.parse(xhr.responseText);
            console.log(resposta);
            if (resposta == "vazio") {
                html += '<tr>';
                html += '<td colspan="12"><p>Não há chaves empretadas</p></td>';
                html += '</tr>';

            } else {
                
                for (var i = 0; i < resposta.length; i++) {

                    html += '<tr>';
                    html += '<td>' + resposta[i]['numero_chave'] + '</td>';
                    html += '<td>' + resposta[i]['nome_funcionario'] + '</td>';
                    html += '<td>' + resposta[i]['nome_setor'] + '</td>';
                    html += '<td><button class="btn btn-danger btn-sm devolver-chave" num-chave="' + resposta[i]['numero_chave'] + '">Devolver</button></td>';
                    html += '</tr>';
                }
            }

            document.getElementById('chaves-emprestadas').innerHTML = html;

        }
    }

    xhr.open("POST", "functions.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(jsonbody);
}

// -------------------- Listar Chaves Emprestadas FIM --------------------------

// -------------------- Devolver Chaves INICIO ---------------------------------

const array_btn_devolver_chave = document.getElementsByClassName('devolver-chave');

wait();

function wait() {
    
    setTimeout(() => {

        document.getElementById('table-chaves-emprestadas').style.display = "table";
        botao_devolver();
    }, 500);

}

function botao_devolver() {

    console.log(array_btn_devolver_chave.length);
    for (let i = 0; i < array_btn_devolver_chave.length; i++) {
        var element = array_btn_devolver_chave[i];

        element.onclick = function () {
            var numero_chave = this.getAttribute("num-chave");
            console.log(numero_chave);
            var controle = "7";
            var numero_chave = this.getAttribute("num-chave");

            body = {
                controle: controle,
                numero_chave: numero_chave
            }

            jsonbody = JSON.stringify(body);


            xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {

                if (xhr.readyState == 4 && xhr.status == 200) {

                    var resposta = xhr.responseText.replace(/(\r\n|\n|\r)/gm, "");

                    if (resposta != "0") {
                        wait();
                        listarChavesEmprestadas();
                        listarChavesFuncionarios();          
                        
                    } else {
                        alert(resposta);
                    }
                }
            }

            xhr.open("POST", "functions.php");
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(jsonbody);

        }
    }
}

// -------------------- Devolver Chaves FIM ------------------------------------

// _____________________ MODULO FUNCIONARIO ______________________________________

// -------------------- Listar setores Inicio ------------------------

const select_cadastrar_setor_funcionario = document.getElementById('select-cadastrar-setor-funcionario');
const btn_cadastrar_funcionario = document.getElementById('btn-cadastrar-funcionario');

btn_cadastrar_funcionario.onclick = function () {

    var controle = "3";

    var body = {
        controle: controle
    }

    var jsonbody = JSON.stringify(body);

    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {

            var resposta = JSON.parse(xhr.responseText);
            var html = "";
            html += '<option value="" selected disabled>Setor...</option>';

            for (var i = 0; i < resposta.length; i++) {

                html += '<option value="' + resposta[i]['id'] + '">' + resposta[i]['nome_setor'] + '</option>';
            }

            console.log(resposta);
            select_cadastrar_setor_funcionario.innerHTML = html;
        }
    }

    xhr.open("POST", "functions.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(jsonbody);
}

// -------------------- Listar setores Fim ------------------------

// -------------------- Cadastrar funcionario INICIO -----------------------

const btn_confirmar_cadastrar_funcionario = document.getElementById('btn-confirmar-cadastrar-funcionario');

btn_confirmar_cadastrar_funcionario.onclick = function () {

    var controle = "4";
    const input_cadastrar_nome_funcionario = document.getElementById('input-cadastrar-nome-funcionario').value;
    const select_cadastrar_setor_funcionario = document.getElementById('select-cadastrar-setor-funcionario').value;

    if (input_cadastrar_nome_funcionario == '' || input_cadastrar_nome_funcionario == null || select_cadastrar_setor_funcionario == '' || select_cadastrar_setor_funcionario == null) {

        var html = "";
        html += '<div class="alert alert-warning" role="alert">';
        html += 'Favor preencher todos os campos';
        html += '</div>';
        document.getElementById('confirmacao-cadastrar-funcionario').innerHTML = html;
        return false;

    } else {

        body = {

            controle: controle,
            nome_funcionario: input_cadastrar_nome_funcionario,
            setor_funcionario: select_cadastrar_setor_funcionario
        }

        jsonbody = JSON.stringify(body);

        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {

                var resposta = xhr.responseText.replace(/(\r\n|\n|\r)/gm, "");
                var html = "";
                if (resposta == "1") {

                    html += '<div class="alert alert-success" role="alert">';
                    html += 'Funcionário inserido com sucesso';
                    html += '</div>';
                    document.getElementById('confirmacao-cadastrar-funcionario').innerHTML = html;

                } else {
                    html += '<div class="alert alert-danger" role="alert">';
                    html += 'Erro ao inserir funcionário';
                    html += '</div>';
                    document.getElementById('confirmacao-cadastrar-funcionario').innerHTML = html;
                }
            }
        }

        xhr.open("POST", "functions.php");
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(jsonbody);
    }

}

// -------------------- Cadastrar funcionario FIM -----------------------
