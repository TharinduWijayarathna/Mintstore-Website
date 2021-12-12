function wish() {
    var wish = document.getElementById("wish");
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        wish.innerHTML = t;
      }
    };
  
    r.open("GET", "wishauto.php", true);
    r.send();
  }
  setInterval(wish, 100);
  
  function cartauto() {
    var cart = document.getElementById("cartauto");
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        cart.innerHTML = t;
      }
    };
  
    r.open("GET", "cartauto.php", true);
    r.send();
  }
  setInterval(cartauto, 100);
  
  function purchauto() {
    var purch = document.getElementById("purchauto");
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        purch.innerHTML = t;
      }
    };
  
    r.open("GET", "purchauto.php", true);
    r.send();
  }
  setInterval(purchauto, 100);