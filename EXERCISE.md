## Exercise:

1. installare laravel ui

2. eseguire il comando ui vue --auth

3. dividere la parte Admin dalla parte publica, quindi creando una cartella admin nei controller e nelle view
   -fare la stessa divisione anche nelle rotte, usando magari un ::group()

4. Assicuratevi che la registrazione e login funzioni
   -ricordatevi di modificare la HOME dentro il file
   app/Providers/RouteServiceProvider.php

5. aggiungere una rotta generica alla quale far rispondere Vue.js
   -spostare la configurazione di Vue.js in un file dedicato
   -aggiornare il file webpack.mix.js
   -aggiornare la config di vue creando un componente App.vue e passandolo alla funzione render: h => h(App)

<!-- Exercise completed -->

## Exercise (2):

Per ogni post, indicare l’utente che ha creato il post e la categoria a cui quel post appartiene.
creare quindi le migration necessarie

-   1 post è scritto da 1 utente,
-   1 utente può scrivere più post
-   1 post appartiene ad 1 categoria
-   1 categoria può essere usato su più post

Replicare le stesse relazioni nei model relativi

Aggiornare le pagine dei post,
edit e create - far scegliere all’utente la categoria da assegnare al post

nella select, autoselezionare la categoria scelta dall’utente all’apertura della pagina

show - mostriamo il codice della categoria scelta e mostriamo il nome dell’utente che ha scritto il post.

index - mostrare nome utente e categoria per ogni post.

<!-- Exercise completed -->

## Esercizio (3):

-   creare model e migration per una tabella “tags”

-   attraverso un seeder, popolare la tabella tags

-   mettere in relazione Many to Many i model Post e Tag

-   creare la tabella ponte per tale relazione

-   dalla view edit e create, permettere all’utente di scegliere i tag da associare ad un post, tramite checkbox

-   validate i tag inseriti assicurandovi che esistono a DB tramite la validazione apposita

-   in fase di salvataggio, usare “detach()” e “attach()” oppure “sync()”

-   nella SHOW, mostrare i tag per il post corrente.

<!-- Exercise Completed -->

## Exercise (4):

-   Formattare le date dei post mostrate nello show e nel index
-   Usare il diffForHumans se la data è più recente di 12 ore.

    <!--  BONUS -->

-   Nella tabella posts, aggiungere una colonna dove salvare l’url di un' immagine di copertina del post.
-   Mostrare l’immagine nellp show.

<!-- Exercise & Bonus completed -->

## Exercise (5):

-   Aggiungere una rotta API per l’index dei post
-   Creare il controller relativo nella cartella API/
-   Far ritornare l’elenco dei post con anche i dettagli utente, tag e categorie.
-   Lato Vue.js eseguire la chiamata api per recuperare i post
-   Stamparli tramite delle card

    <!-- BONUS -->

-   Paginare i risultati visualizzati

<!-- Exercise  & Bonus completed -->

## Exercise (6):

-   Installare vue router
-   Configurare e attivare vue router su vue (router.js e vue.js)
-   Dentro router.js, creare le seguenti rotte: home (homepage del sito) - dovrete spostare il contenuto da app.vue in home.vue
    app.vue occorre aggiungere il componente router-view
    contatti (può contenere solo un h1)
    posts.show (dettagli di un post)

-   Nella navbar, creare i relativi link usando router-link. (usate un array per stampare i vari link)

<!-- BONUS -->

-   Creare la pagina di gestione errori
-   Tramite param o query, passare a questa pagina il codice dell’errore.
-   Pagina contatti, creare un form da inviare al server tramite api
