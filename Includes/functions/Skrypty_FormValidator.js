/* REJESTRACJA */

/*=========================================================*/
//window.onload = 											/*		REJESTRACJA FIRMA	 	*/
function t1(){
    obj = "CreateUserForm";
    if(document.getElementById(obj)){
    document.getElementById(obj).onsubmit = function(){
//        alert("Skrypty_rej_fi.js")
	if(	
            czyWypelnione(this.imie)   &&
            isMinLength (this.imie, 2) &&
            
            czyWypelnione(this.nazwisko)    &&
            isMinLength (this.nazwisko, 2)  &&
            
            czyWypelnione(this.login)   &&
            isMinLength (this.login, 8) &&
            
            czyWypelnione(this.email)   &&
            isValidEmail(this.email)    &&
            
            czyWypelnione(this.haslo)   &&
            isMinLength (this.haslo, 8)  &&
            czyWypelnione(this.haslo2)  &&
            
            areFieldsEqual(this.haslo, this.haslo2) 
//            &&
//            
//            czyWypelnione(this.PublicKey)  &&
//            isMinLength (this.PublicKey, 25) &&
//            
//            czyWypelnione(this.PassCrypt)  &&
//            isMinLength (this.PassCrypt, 25)
	){
            return true;
	}else{
            return false;
	}
    }
    }
}

function t2(){
    obj = "EditUserForm";
    if(document.getElementById(obj)){
    document.getElementById(obj).onsubmit = function(){
//        alert("Skrypty_EditUserForm.js")
	if(	
            czyWypelnione(this.imie)   &&
            isMinLength (this.imie, 2) 
            &&
            
            czyWypelnione(this.nazwisko)    &&
            isMinLength (this.nazwisko, 2)  
            &&
//            
            czyWypelnione(this.email)   &&
            isValidEmail(this.email)    
	){
            if(czyWypelnione(this.pass_old)){
                if(isMinLength (this.pass_new_1, 8)  &&
                    czyWypelnione(this.pass_new_1)  &&
                    czyWypelnione(this.pass_new_1)  &&
                    areFieldsEqual(this.pass_new_1, this.pass_new_1) )
                {
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
	}else{
            return false;
	}
    }
}
}

function tx() {
    alert("DONE!");
}

function start(){
    t1();
    t2();
//    tx();
}

window.onload = start;
//*/