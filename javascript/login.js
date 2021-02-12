//verificar login

const botao_login = document.getElementById('botao-login');

botao_login.onclick = function () {
   
    const nome_usuario = document.getElementById('nome_usuario').value;
    const senha_usuario = document.getElementById('senha_usuario').value;

    const body = {
        nome_usuario: nome_usuario,
        senha_usuario: senha_usuario
    }
    
    const jsonbody = JSON.stringify(body);
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr);
            const resposta = xhr.responseText.replace(/(\r\n|\n|\r)/gm, "");
            
            if (resposta == "true") {
                window.location.href = "http://localhost/controle-chaves-portaria/";
            } else {
                document.getElementById('resposta').innerHTML = "Usuario ou senha incorreto";
            }
        }
    }

    xhr.open("POST", "verificalogin.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //xhr.onload()
    xhr.send(jsonbody);

}

