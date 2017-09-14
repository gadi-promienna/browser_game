# browser_game
 
Gra przeglądarkowa polegająca na zarządaniu okrągłymi stworkami. Nakarm, pobaw się i wyprowadź na spacer swoich ulubieńców! W panelu admienistracyjnym możesz dodawać im nowe zabawki, rzeczy do jedzenia oraz miejsca na spacery.

## Instalacja

Żeby uruchomić aplikacje należy wejść do folderu my_app i zaktualizować lub zainstalować komposera poleceniem:
curl -sS https://getcomposer.org/installer | php - instalowanie
php ../composer.phar -vvv update - aktualizacja
Następnie w celu uruchomienia lokalnie aplikacji należy w katalogu projektu wywołać polecenie - php app/console server:run i wejść pod wskazany adres.

Dodawanie administatora aplikacji z poziomu konsoli
---------------------------------------------------
 php app/console fos:user:create nazwa_administatora mail hasło --super-admin 
 
Obsługa
 -------
Kiedy aplikacja jest poprawnie zainstalowana wystarczy utworzyć konto użytkownika i zalogować się. Zalogowani użytkownicy mogą dodawać stworki i się nimi opiekować. Żeby zajmować się wcześniej utworzonym stworkiem trzeba wpisać jego imię i hasło.
Osoby z uprawnieniami administracyjnymi otrzymują narzędzia do dodowania zabawek, miejsc na spacery oraz rzeczy do jedzenia dla stworków. Posiadają oni także pełny dostęp do edycji użytkowników i nadzorowania logów gry.

