import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function validarSenha() {
    let senha = document.getElementById('password').value;
    let confirma_senha = document.getElementById('password_confirm').value;
    // console.log(senha,confirma_senha);
    if (senha != confirma_senha) {
        document.getElementById('password').value = '';
        document.getElementById('password_confirm').value = '';
        let div = document.getElementById("mensagem_password"); 
        div.innerHTML = "Senhas não conferem";
        return false;
    }
    else {
        return true;
    }
}

function validarEmail(){
    let email = document.getElementById('email');
    let valor_email = email.value;
    let div = document.getElementById("mensagem_email"); 
    if(valor_email === ""){
        div.innerHTML = "O campo e-mail é requerido";
        email.focus();
    }
    else{
        if (!valor_email.length == 0){
            let verifica = new Array('À','à','Á','á','Â','â','Ã','ã','Ä','ä','Ç','ç','È','è','É','é','Ê','ê','Ë','ë','Ì','ì','Í','í','Î','î','Ï','ï','Ñ','ñ','Ò','ò','Ó','ó','Ô','ô','Õ','õ','Ö','ö','Ù','ù','Ú','ú','Û','û','Ỳ','ỳ','Ý','ý','Ÿ','ÿ','Ŕ','ŕ',' ',';',',');
            let cont = verifica.length;
            let erro = 0;
            let i;
            for(i = 0; i < cont; i++){
                if(valor_email.indexOf(verifica[i]) > -1){
                    erro++;
                }
            }
            let e = new String(valor_email);
            let ee = e.split("@");
            if ((valor_email.indexOf("@") == -1) || (ee[1].indexOf(".") <= 1) || (erro > 0)) {
                email.value = "";
                div.innerHTML = "E-mail inválido";
                email.focus();
                return false;
            }else{
                return true
            }
        }else{
            // return true;
        }
    }
}

window.validarSenha = validarSenha;
window.validarEmail = validarEmail;
