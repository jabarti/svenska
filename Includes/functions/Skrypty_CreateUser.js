/* REJESTRACJA */

/*=========================================================*/
window.onload = 											/*		REJESTRACJA FIRMA	 	*/
function (){
    document.getElementById("CreateUserForm").onsubmit = function(){
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
            czyWypelnione(this.haslo2)  &&
            
            areFieldsEqual(this.haslo, this.haslo2) &&
            
            czyWypelnione(this.PublicKey)  &&
            czyWypelnione(this.PassCrypt)  
	){
            return true;
	}else{
            return false;
	}
    }
}
//*/