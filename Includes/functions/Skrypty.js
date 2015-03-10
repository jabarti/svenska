/* MENU */

function goBack()
	{
	window.history.back()
	}
  
function goForward()
	{
	window.history.forward()
	}
/*============================*/
/* REJESTRACJE */

function isMinLength (pole, mindlugosc)
{
	var wartoscpola = pole.value;
	if(wartoscpola.length < mindlugosc && (pole.value !=""))
	{
                text1 = "Pole musi miec min ";
                text2 = mindlugosc;
                text3 = " znaków!";
                
                textFIN = text1 + text2 + text3;
                try{
                    this.getTrans(textFIN, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }

//		document.getElementById("error"+pole.id).innerHTML = textFIN;
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}

function hasLength (pole, dlugosc)
{
	var wartoscpola = pole.value;
	if(wartoscpola.length != dlugosc && (pole.value !=""))
	{
                text1 = "Pole musi miec ";
                text2 = dlugosc;
                text3 = " znaków!";
                
                textFIN = text1 + text2 + text3;
                try{
                    this.getTrans(textFIN, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole.id).innerHTML = "Pole musi miec " + dlugosc + " znakow!";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}

function czyWypelnione(pole)
{
	if(pole.value == "")
	{
                text1 = "To pole jest wymagane!";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole.id).innerHTML = "To pole jest wymagane!";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

 function isValidEmail(pole)
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;   // tzw. WYRA�ENIE REGULARNE!! 
																										// tzn 12$_dsds-bubaaAAAA@wp.pl lub jabarti@23_&&&.com.pl.
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy adres e-mail w formacie x@x.x lub x@x.x.x";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy adres e-mail w formacie x@x.x lub x@x.x.x";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

function isValidPESEL(pole)
{
	var reg = /^([0-9]{11})$/;   // tzw. WYRA�ENIE REGULARNE!! 
	
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy PESEL";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy PESEL";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

function isValidDowOs(pole)
{
	var reg = /^([A-Za-z]{3})+([0-9]{6})$/;   // tzw. WYRA�ENIE REGULARNE!! 
																										// tzn 12$_dsds-bubaaAAAA@wp.pl lub jabarti@23_&&&.com.pl.
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy nr Dowodu osobistego";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy nr Dowodu osobistego";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

function isValidKod(pole)
{
	var reg = /^([0-9]{2})+\-([0-9]{3})$/;   // tzw. WYRA�ENIE REGULARNE!! 
																										// tzn 12$_dsds-bubaaAAAA@wp.pl lub jabarti@23_&&&.com.pl.
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy Kod pocztowy w formacie xx-xxx";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy Kod pocztowy w formacie xx-xxx";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}

function isValidNIP(pole)
{
	var reg = /^([0-9]{10})$/;   // tzw. WYRA�ENIE REGULARNE!! 
	
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy NIP w formacie np.: 1111111111";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy NIP w formacie np.: 1111111111";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

function isValidREGON(pole)
{
	var reg = /^([0-9]{9})$/;   // tzw. WYRA�ENIE REGULARNE!! 
	
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy REGON w formacie np.: 111111111";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy REGON w formacie np.: 111111111";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

function isValidKRS(pole)
{
	var reg = /^([0-9]{10})$/;   // tzw. WYRA�ENIE REGULARNE!! 
	
	if((reg.test(pole.value)==false) && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy KRS w formacie np.: 1111111111";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy KRS w formacie np.: 1111111111";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/
function isValidYear(pole)
{
	var reg = /^([0-9]{4})$/;   // tzw. WYRA�ENIE REGULARNE!! 
		
	if((reg.test(pole.value)==false)  && (pole.value !=""))
	{
                text1 = "Musisz podac prawidlowy ROK";

                try{
                    this.getTrans(text1, pole);
                }catch(err){
                    alert("ERROR: "+err);
                }
//		document.getElementById("error"+pole.id).innerHTML = "Musisz podac prawidlowy ROK";
		return false;
	}
	else
	{
		document.getElementById("error"+pole.id).innerHTML = "";
		return true;
	}
}
//*/

function areFieldsEqual (pole1, pole2)
{
	if (pole1.value != pole2.value)
	{
                text1 = "Hasla musza byc takie same!";

                try{
                    this.getTrans(text1, pole2);
                }catch(err){
                    alert("ERROR: "+err);
                }
                
//		document.getElementById("error"+pole2.id).innerHTML = "Hasla musza byc takie same!";
		return false;
	}
	else
	{
		document.getElementById("error"+pole2.id).innerHTML = "";
		return true;
	}
}

/*		EDIT		*/
function AddAllFun()
	{
	parent.window.location.reload();
	//window.history.back()
	}
	
function _onSubmit_ed_os()
{
	//new_win = window.open('http://localhost/005PHPs/001Simple/MySimple4_Proto_Inzynierska/views/edit/edit_osoba.php');
	//top.window.close();
	//parent.window.location = 'http://localhost/005PHPs/001Simple/MySimple4_Proto_Inzynierska/views/edit/edit_osoba.php';
	//new_win.onload = self.close();
	//parent.window.location.reload();
	
	/*var newwindow;
	var oldwindow = ("edit_osoba.php");;
	if(!oldwindow.closed)oldwindow.close()
	newwindow=window.open("unset_os.php");*/
	
//	parent.window.location.href=('http://localhost/005PHPs/001Simple/MySimple4_Proto_Inzynierska/index.php');
}


