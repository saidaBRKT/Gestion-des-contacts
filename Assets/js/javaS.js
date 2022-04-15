//sign up

const user=document.getElementById("username");
const pwd=document.getElementById("password");
const conpwd=document.getElementById("confPassword");

function validateInput(ev){
    //check name
    if(user.value.trim()===""){
    onError(user,"Username cannot be empty!")
    ev.preventDefault();
    }else{
        if(!isValidName(user.value.trim())){
            onError(user,"Username is not valid")
            ev.preventDefault();
        }else{
            onSuccess(user);
        }
    }
    //psw
    if(pwd.value.trim()===""){
        onError(pwd,"Password cannot be empty!");
        ev.preventDefault();
    }
    else{
        if(!isValidPass(pwd.value.trim())){
            onError(pwd,"Password is not valid")
            ev.preventDefault();
        }else{
            onSuccess(pwd);
        }
    }
    if(conpwd.value.trim()===""){
        onError(conpwd,"Confirm Password cannot be empty!");
        ev.preventDefault();
    }
    else{
        if(pwd.value.trim()!==conpwd.value.trim()){
        onError(conpwd,"Password and Confirm Password not matching")
        ev.preventDefault();
        }else
        onSuccess(conpwd);
    }
}
 

document.querySelector("form").addEventListener("submit",(e)=>{
    validateInput(e);
});

function onSuccess(input){
    let parent=input.parentElement;
    let messageEl=parent.querySelector("small");
    messageEl.style.visibility="hidden";
    messageEl.innerText="";
}
function onError(input,message){
    let parent=input.parentElement;
    let messageEl=parent.querySelector("small");
    messageEl.style.visibility="visible";
    messageEl.style.color="red";
    messageEl.innerText=message;
}

function isValidEmail(email){
    return /^\w+@\w+(.\w+){1,3}$/.test(email); 
}
function isValidName(name){
    return /^[a-z\d]{3,}$/.test(name); 
}
function isValidPass(pass){
    return /^[\w\W]{6,}$/.test(pass); 
}
