 let btnLogin = document.getElementById("login");
 let btnSignUp = document.getElementById("signup");

 let signIn = document.querySelector(".signup");
 let signUp = document.querySelector(".signin");

 btnLogin.onclick = function(){
     signIn.classList.add("inActive");
     signUp.classList.add("active");
 }

 btnSignUp.onclick = function(){
    signIn.classList.remove("inActive");
    signUp.classList.remove("active");
}

