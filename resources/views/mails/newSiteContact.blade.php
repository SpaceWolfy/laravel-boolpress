<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nuovo Contatto</title>
</head>
<body>
  <h1>Un utente ti ha appena contattato!</h1>

    {{-- Lo style funziona solo se inserito all'interno dell'html --}}
    <div class="testing-style"  style="background-color:powderblue;">
      L'utente: 
      <strong>{{$newContactInfo->name}}</strong>
      ti ha appena scritto il seguente messaggio: {{$newContactInfo->message}} - 
      Ricontattalo alla seguente mail:
      <strong>{{$newContactInfo->email}}</strong> 
    </div>


    {{-- Le immagini provenienti dal server non vengono visualizzate in quanto non pubbliche --}}
    @if($newContactInfo->uploadedFile)
    <img src="{{$newContactInfo->uploadedFile}}" alt="Image">
    @endif

    {{-- è possibile inserire immagini dal web --}}
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrKHPsvNDJHY9tWpkHrfkfo8Dkf0LvZU3Hdg&usqp=CAU" alt="">

</body>
</html>