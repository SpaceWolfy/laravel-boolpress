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
