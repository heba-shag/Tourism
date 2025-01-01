


document.querySelectorAll(".star-widget label").forEach(function(star) {

    star.addEventListener('click', function() {
      console.log("djd")
      if(star.classList.contains("selectedddd")){
        star.classList.remove("selectedddd")
      }else{
        star.classList.add("selectedddd")
      }

    });
});