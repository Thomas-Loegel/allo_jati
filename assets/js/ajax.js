var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function(){
   console.log(this);

   if (this.readyState == 4 && this.status == 200){
      testAjax.innerHTML = this.response;
   }else if (this.readyState == 4 && this.status == 404){
      alert("Erreur 404 !");
   }
}

xhr.open(GET,);
xhr.responseType = "json";
xhr.send;
