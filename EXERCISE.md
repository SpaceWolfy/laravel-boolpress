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
