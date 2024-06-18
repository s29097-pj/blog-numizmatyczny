# blog-numizmatyczny

## Założenia projektowe - Blog
Blog oferuje możliwość:
- dodawania, usuwania oraz edycji wpisów.
    - Każdy wpis składa się z tytułu, treści i opcjonalnego obrazka, który wyświetli się pod wpisem oraz daty opublikowania.
    - Strona posiada możliwość dodawania komentarzy do wpisów, które również mają datę dodania.
    - Wpisy powinny być pogrupowane po datach, a strona pozwala dodatkowo przechodzić do poprzedniego i następnego wpisu.
    - Data wstawienia wpisu dodaje się automatycznie.
    - Użytkownicy mogą, ale nie muszą, być zalogowani przy dodawaniu komentarzy
        - jeśli użytkownik nie jest zarejestrowany, to autorem komentarza jest "Gość", w przeciwnym razie podajemy jego login.
    - Dodatkowo istnieje zakładka przeznaczona do kontaktu z autorem bloga.
    - Na stronie dostępny jest panel administracyjny.
    ```
    Username: admin
    Password: pass
    ```
    - Istnieją różne typy konta: administrator (może wszystko - dodawać, usuwać, edytować wpisy, sprawdzać ewentualne logi),
    - autor bloga (może dodawać, usuwać i edytować wpisy, może zresetować swoje hasło), użytkownik (dodaje komentarze i może zresetować swoje hasło).
- Wpisy, komentarze i informacje o użytkownikach powinny być przechowywane w bazie danych, a obrazki powinny być przechowywane jako pliki.

## Wymagania funkcjonalne:
1. Użycie formularzy i ich funkcjonalności - odbieranie i przetwarzanie danych.
2. Zapisywanie do pliku danych - np. zrzut bazy danych, zapis danych z formularza itp.
3. Zapisywanie do bazy danych.
4. Odczytywanie z bazy danych.
5. Update i usuwanie z bazy danych.
6. System logowania.
7. Użycie sesji w projekcie, nie sztuczne, tylko takie by pozwalało realnie zobrazować ich funkcjonalność.
8. Użycie ciasteczek - utworzenie oraz realne skorzystanie z nich.
9. Użycie pętli, instrukcje warunkowe, tablice, funkcji.
10. Projekt realizujemy w oparciu o programowanie obiektowe.
11. Użycie czegoś z PHP, co nie było pokazywane na zajęciach - biblioteka, narzędzie, konstrukcja, temat (wymagane omówienie) (dodatkowe).
12. Hostowanie strony na serwerze zewnętrznym (dodatkowe).

## Wymagania niefunkcjonalne:
1. Przejrzysty kod - np. rozbicie na pliki, klasy, metody, stosowanie pętli zamiast printowania na sztywno.
2. Brak widocznych błędów komunikowanych przez język.
3. Projekt się “kompiluje” - brak problemów przy oddawaniu projektu.
4. “Ładny”/przejrzysty projekt - np. ładnie sformatowany formularz, jednolity; widok strony bez zbędnych elementów, czy rozjeżdżających się komponentów.
