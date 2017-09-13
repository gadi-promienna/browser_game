# browser_game
 
Gra przeglądarkowa polegająca na zarządaniu okrągłymi stworkami. Nakarm, pobaw się i wyprowadź na spacer swoich ulubieńców! W panelu admienistracyjnym możesz dodawać im nowe zabawki, rzeczy do jedzenia oraz miejsca na spacery.

## Instalacja

Żeby uruchomić aplikacje należy wejść do folderu my_app i zaktualizować lub zainstalować komposera poleceniem:
curl -sS https://getcomposer.org/installer | php - instalowanie
php ../composer.phar -vvv update - aktualizacja

Dodawanie administatora aplikacji z poziomu konsoli
---------------------------------------------------
 php app/console fos:user:create nazwa_administatora mail hasło --super-admin 
 
 Obsługa
 -------
 Kiedy aplikacja jest poprawnie zainstalowana wystarczy utworzyć konto użytkownika i zalogować się. Zalogowani użytkownicy mogą dodawać stworki i się nimi opiekować. Osoby z uprawnieniami administracyjnymi mają dodyspozycji następujące narzędzia: zarządzanie uzytkownikami i stworkami
