let eye_mdp = document.getElementById("eye-mdp");
let mdp = document.getElementById("mdp");
let eye_cmdp = document.getElementById("eye-cmdp");
let confirm_mdp = document.getElementById("confirm-mdp");

eye_mdp.onclick = function(){
    if (mdp.type == "password") {
        mdp.type = "text";
        eye_mdp.src = "../../public/images/eye-close.png";
    }else {
        mdp.type="password";
        eye_mdp.src = "../../public/images/eye-open.png";
    }
}

eye_cmdp.onclick = function(){
    if (confirm_mdp.type == "password") {
        confirm_mdp.type = "text";
        eye_cmdp.src = "../../public/images/eye-close.png";
    }else {
        confirm_mdp.type="password";
        eye_cmdp.src = "../../public/images/eye-open.png";
    }
}

