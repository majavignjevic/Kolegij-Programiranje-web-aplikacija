$().ready(function(){
  $("form[name='clanak']").validate({
    rules: {
      title: {
        minlength: 5,
        maxlenght: 30, 
        required: true,
      },
      about:{
          minlength: 10,
          maxlenght: 100,
          required: true,
      },
      content: "required",
      picToUpload: "required",
      category: "required",
    },
    messages: {
      title: {
        minlength: "Naslov mora sadržavati između 5 i 30 znakova",
        maxlenght: "Naslov mora sadržavati između 5 i 30 znakova", 
        required: "Naslov je obavezan",
      },
      about:{
          minlength: "Kratki sadržaj mora sadržavati između 10 i 100 znakova",
          maxlenght: "Kratki sadržaj mora sadržavati između 10 i 100 znakova",
          required: "Kratki sadržaj je obavezan!",
      },
      content: "Sadržaj je obavezan",
      picToUpload: "Slika je obavezna",
      category: "Kategorija je obavezna",
    }
  });
  $("form[name='login']").validate({
    rules:{
      username: "required",
      password: "required",
    },
    messages: {
      username: "Korisničko ime je obavezno!",
      password: "Lozinka je obavezna!",
    },
  });
  $("form[name='loginNovi']").validate({
      rules:{
        name: "required",
        surname: "required",
        username: "required",
        password: "required",
        password1:{
          required: true,
          equalto: password,
        },
      },
      messages: {
        name: "Ime je obavezno",
        surname: "Prezime je obavezno",
        username: "Korisničko ime je obavezno",
        password: "Loznka je obavezna",
        password1:{
          required: "Loznka je obavezna",
          equalto: "Lozinke se ne podudaraju!",
        },
      },
    });
});