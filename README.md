# Awesome Drink

**Awesome Drink** è un tema WordPress sviluppato per un'esercitazione Front-End


## Struttura

Il tema è un modello pronto all'uso, di facile intuizione: permette anche all'utente meno esperto di avere la possibilità di personalizzare il layout del proprio sito Wordpress senza dover accedere al codice, svolgendo tutto dal pannello Admin.

Tramite l'introduzione di Templates, Post Formats, Searchform, Sidebar e Widgets, il tema si presenta in modo chiaro, modellabile e ben strutturato.

La pagina Home è gestita come una front-page statica, mentre la sezione Blog è in una pagina separata, sempre accessibile dal menu principale. 
Sarà qui possibile visualizzare i post pubblicati dall'admin, filtrarli per tag o categorie, cercarli tramite l'apposita Search Bar e lasciare un commento.

L'utilizzo di alcuni Shortocodes permette di popolare qualsiasi pagina e/o post tramite delle chiamate api verso https://www.thecocktaildb.com/api.php 

### Shortcodes

Per visaulizzare una lista di card, con relativi dettagli, dei Cocktail più popolari (con una massimo di 25 risultati), basta inserire nella pagina o nel post desiderato lo shortocode

```
[PopularDrink app_token="" limit=""]
```

app_token = API key; limit = numero massimo di risultati desiderati.

Per ottenere invece una lista degli ingredienti più utilizzati lo shortocode è 

```
[Ingredients]
```


## MapQuality - Plugin

**MapQuality** è un plugin creato per dare la possibilità all'admin di inserire una mappa dinamica nel proprio sito tramite delle chiamate API a https://developer.tomtom.com

### Utilizzo

Per integrare la mappa di una qualsiasi pagina e/o post, basta inserire lo shortcode

```
[map_quality token="" city="" cap="" via=""]
```

dove il token è l'API key e il resto dei campi vengono utilizzati per ricavare Latitudine e Longitudine del luogo desiderato


## Struttura Responsive e Sicurezza

La struttura grafica del tema è stata ideata rispettando le regole del Mobile First tramite l'implementazione di Bootstrap e la stesura di alcune Media Queries.

Per quanto riguarda la sicurezza, alcune misure adottate sono:

* eliminazione della possibilità di editare codice sorgente di plugin e tema tramite la dashboard Admin; 
* fix per non permettere a Wordpress di specificare il genere di errore in caso di errato login nella pagina Admin; 
* nascosta, nell'head, la versione Wordpress utilizzata dal sito; 
* l'utilizzo del plugin Aksimet per il blocco dei commenti Spam; 
 

## Built With

* [jQuery](https://jquery.com/) © jQuery Foundation, licenza MIT
* [Bootstrap 4](https://getbootstrap.com/) © Twitter, Inc., licenza MIT


## 3rd Party APIs

* [TheCocktailDB](https://www.thecocktaildb.com/api.php)
* [TomTomDeveloper](https://developer.tomtom.com)



## Autore

* **Pierluigi Barocci** - [PierluigiBarocci](https://github.com/PierluigiBarocci)



