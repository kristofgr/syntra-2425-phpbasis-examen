# Examen PHP Basis 10/12/2024

Je werkt verder aan een bestaande CRUD voor Geocache locaties. Een geocache heeft een naam, een beschrijving, een moeilijkheidsgraad (level), een tip (hint) en een geo-locatie (latitude + longitude).
Momenteel kan je een reeds een overzicht raadplegen en een informatieve detail-pagina bekijken.

Importeer de database lokaal en zorg ervoor dat je op index.php de geocaches te zien krijgt, de credentials staan in db.inc.php.
Je hoeft tijdens dit examen niets aan te passen aan de database-structuur.

## todo's

- Overzichtspagina:

  - [1 punt] Zorg dat _level_ in de tabel weergegeven wordt als Bootstrap's Badge Pill (https://getbootstrap.com/docs/5.0/components/badge/#pill-badges) waarbij:
    - Easy: groen
    - Medium: geel
    - Hard: rood
    - Impossible: zwart
    - default: grijs (_secondary_). (Er kunnen in de toekomst extra levels bijkomen of van naam wijzigen, dit mag niet tot foutmeldingen leiden).
  - [2 punten] Zorg ervoor dat de overzichtspagina gefilterd wordt na klik op één van de _badge pills_. Klik ik dus bijvoorbeeld ergens in de tabel op waarde _Medium_, dan moet ik index.php opnieuw te zien krijgen met in het overzicht enkel geocaches met level _Medium_. Maak hiervoor gebruik van een GET-parameter en let opnieuw op: Er kunnen in de toekomst extra levels bijkomen of bestaande levels van naam wijzigen, dit mag niet resulteren in foutmeldingen.

- Detail-pagina:

  - [2 punten] Momenteel wordt steeds de geocache met naam _Castle Quest (ID #1)_ getoond. Dat is nog niet het gewenste gedrag. Zorg ervoor dat de correcte geocache getoond wordt (die waar je in het overzicht op geklikt hebt dus).
  - [2 puntent] _Level_ wordt momenteel getoond als ID (mogelijke waardes: 1,2,3,4). De getoonde waarde klopt wel volgens het record in de database, maar in plaats van de ID zou het bijhorende label _name_ getoond moeten worden zoals aanwezig in de sql table _geoloevels_ (Easy, Medium, Hard, Impossible). Wees vooruitziend, er kunnen in de toekomst levels aangepast/toegevoegd worden.

- Add-pagina:

  - Het formulier bestaat reeds en de data wordt weggeschreven in de database. Validatie en een goede UX ontbreken echter nog.
  - [5 punten] Zorg voor validatie:
    - _Name_:
      - is verplicht
      - mag max. 255 characters lang zijn
      - moet alfanumeriek zijn
    - _Description_:
      - is optioneel
    - _Hint_:
      - is optioneel
      - mag max. 255 characters lang zijn
      - moet alfanumeriek zijn
    - _Level_:
      - is verplicht
      - moet een valid level ID zijn zoals aanwezig in de table _geolevels_
    - _Latitude_ en _Longitude_:
      - zijn beide verplicht
      - zijn een numerieke waarde mét komma (punt). Baseer je voor de validatie op volgende uitleg:
        - _Latitude and longitude are a pair of numbers (coordinates) used to describe a position on the plane of a geographic coordinate system. The numbers are in decimal degrees format and range from -90 to 90 for latitude and -180 to 180 for longitude. For example, Washington DC has a latitude 38.8951 and longitude -77.0364._
  - [2 puntent] Pas het formulier aan zodat ingevulde waardes in het formulier behouden blijven indien minstens 1 veld nog een foutboodschap oplevert (UX)
  - [2 punten] Zorg ervoor dat de _Levels_ opties overeenkomen met de aanwezige levels in de _geolevels_ table. Momenteel zijn deze hard gecodeerd in HTML. Hou er rekening mee dat er extra levels in de databank toegevoegd kunnen worden + toon de levels gesorteerd op _weight_ (ook aanwezig in dezelfde table)
  - [1 punt] Zorg voor duidelijke foutmeldingen boven het formulier, maak daarbij gebuik van de reeds voorziene HTML (div.alert-danger).
  - [3 punten] Indien de data correct werd ingevuld en de geocache toegevoegd werd in de database, moet:
    - De gebruiker opnieuw de overzichtspagina te zien krijgen
    - Moet bovenaan die pagina een boodschap getoond worden inclusief titel van de toegevoegde geocache (reeds aanwezig als HTML placeholder div#custom-message). Maak hiervoor gebruik van een SESSION!
    - Deze message mag slechts 1x getoond worden na succesvol toevoegen van een geocache
