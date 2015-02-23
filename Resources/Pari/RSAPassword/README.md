Wymagana instalacja kalkulatora Pari-2-7-2 lub wyższej. 

Aplikacja jest dostępna pod adresem:
http://pari.math.u-bordeaux.fr/download.html

Pliki poniższe muszą zostać wypakowane do głównego katalogu w którym jest plik gp.exe.

Pakiet jest przeznaczony do zaszyfrowania hasła do aplikacji do nauki języka szwedzkiego "Svenska". Inne uzycie tych plików nie jest przewidziane. 
Użytkownik ponosi pełną odpowiedzialnośc za sposób w jaki użyje pakietu, jak również za bezpieczeństwo i sposób przechowywania wasnych kluczy.

Pakiet zawiera:

1) RSA_MakeFiles.gp - plik przeznaczony do wygenerowania plików podstawowych

read("RSA_MakeFiles.gp");

tworzy 4 pliki: 

RSA_01_public_key 				- będzie tu klucz publiczny.
RSA_02_private_key 				- będzie tu klucz prywatny.
RSA_03_Message.txt 				- stąd jest pobierana wiadomość, która będzie szyfrowana kluczem publicznym.
RSA_09_public_key_created_LIST	- tu jest tworzona lista kluczy publicznych, nowo utworzone klcze bedą na pewno różne od tych z listy (wada pseudolosowości Pari)


2) RSA_CreateParKeys.gp - tworzy dwa klucze - prywatny i publiczny.

read("RRSA_CreateParKeys.gp");

RSA_01_public_key - 	do pliku zapisuje wygenerowany klucz publiczny, może być udostępniony publicznie, posłuży do zaszyfrowania danych, 
						które będą odczytane przy pomocy klucza prywatnego.
RSA_02_private_key - 	do pliku zapisuje wygenerowany klucz prywatny, powinien być ukryty i nie powinien być nigdy udostępniony. Służy do dekryptażu wiadomości.


3) RSA_Encode.gp - tworzy kryptogram wiadomości.

W pliku RSA_03_Message.txt proszę wpisać hasło do aplikacji "Svenska" (wewnątrz znaków "", np."hasło123"), 

read("RSA_Encode.gp");

Zostanie utworzony plik RSA_05_Secret_Message.txt. W nim jest przechowywane zaszyfrowane hasło do aplikacji "Svenska".


4) RSA_Decode.gp

read("RSA_Decode.gp");
