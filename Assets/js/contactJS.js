function displayADD(){
    document.getElementById("add").style.display="block"
}

function displayNone(){
    document.getElementById("add").style.display="none"
}


//validation

const contactName=document.getElementById("name");
const contPhone=document.getElementById("phone");
const contEmail=document.getElementById("email");
const contAddr=document.getElementById("addr");

function validateInput(ev){
    //check name
    if(contactName.value.trim()===""){
        onError(contactName,"name cannot be empty!")
        ev.preventDefault();
        }else{
            if(!isValidName(contactName.value.trim())){
                onError(contactName,"name is not valid")
                ev.preventDefault();
            }else{
                onSuccess(contactName);
            }
        }
    //email
    if(contEmail.value.trim()===""){
    onError(contEmail,"Email cannot be empty!")
    ev.preventDefault();
    }else{
        if(!isValidEmail(contEmail.value.trim())){
            onError(contEmail,"Email is not valid")
            ev.preventDefault();
        }else{
            onSuccess(contEmail);
        }
    }
    //tel address
    if(contPhone.value.trim()===""){
        onError(contPhone,"")
        ev.preventDefault();
        }else{
            if(!isValidTel(contPhone.value.trim())){
                onError(contPhone,"Phone is not valid")
                ev.preventDefault();
            }else{
                onSuccess(contPhone);
            }
        }
        //
        if(contAddr.value.trim()===""){
        onError(contAddr,"")
        ev.preventDefault();
        }else{
            if(!isValidAddr(contAddr.value.trim())){
                onError(contAddr,"Address is not valid")
                ev.preventDefault();
            }else{
                onSuccess(contAddr);
            }
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

function isValidName(name){
    return /^[a-z\d]{2,}$/.test(name); 
}
function isValidTel(tel){
    return /^(\(\+\d{1,3}\)\s[0]?|[0])[56]([\s-]\d{2}){4}$/.test(tel) 
}
function isValidEmail(email){
    return /^\w+@\w+(.\w+){1,3}$/.test(email); 
}
function isValidAddr(address){
    return /^[A-Za-z0-9'\.\-\s\,]{0,50}$/.test(address); 
}
