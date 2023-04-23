// function ajouterFiche(id){
//   $.ajax({
//       type:'POST',
//       url:'../../C/controlfiche.php?idCli='+id,
//       data: $('#formfiche').serialize(),
//       success:function(serveur){
//         if (serveur==true) {
//           recherchefiche(id,'');
//           actualiseform(id);
//           $('#resultat').css('color','green').text("L'enregistrement réussi !");
//           $('#resultat').show();
//           $('#resultat').fadeOut(3000);
//           console.log(serveur);
//         }else{
//           $('#resultat').css('color','red').text("L'enregistrement echoué !");
//           $('#resultat').show();
//           $('#resultat').fadeOut(20000);
//           console.log(serveur);

//         }
//       } 
//     });
// }

  function enregistretaux(taux){
  alert(taux);
}
