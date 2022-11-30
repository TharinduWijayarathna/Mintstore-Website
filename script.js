function showorhidepw() {
  var password = document.getElementById("pw");
  var password2 = document.getElementById("pw2");
  var label = document.getElementById("pwtxt");
  if (password.type === "password") {
    password2.type = "text";
    password.type = "text";
    label.innerHTML = "Hide Password";
  } else {
    password2.type = "password";
    password.type = "password";
    label.innerHTML = "Show Password";
  }
}

// function showorhidepw2() {
//   var password = document.getElementById("logpw");
//   var label = document.getElementById("pwtxt2");
//   if (password.type === "password") {
//     password.type = "text";
//     label.innerHTML = "Hide Password";
//   } else {
//     password.type = "password";
//     label.innerHTML = "Show Password";
//   }
// }
function savegoogle() {
  var imagepath = document.getElementById("userimg");
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");

  var form = new FormData();

  form.append("userimg", imagepath.value);
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("email", email.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == "Success") {
        imagepath.value = "";
        fname.value = "";
        lname.value = "";
        email.value = "";

        alert("Your temporary password was sent to your email.");

        window.location = "account.php";
      } else if (text == "error") {
        alert("You have been blocked");
        window.location = "Signin_and_signup.php";
      } else {
        window.location = "index.php";
      }
    }
  };
  r.open("POST", "savedata(google).php", true);
  r.send(form);
}
function signup() {
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var email = document.getElementById("em");
  var password2 = document.getElementById("pw2");
  var password = document.getElementById("pw");

  var form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("email", email.value);
  form.append("password", password.value);
  form.append("password2", password2.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == "Success") {
        alert("Verification email sent.Please check your inbox.");

        var m = document.getElementById("verify"); //modal eke id eka hoya gnnw
        k = new bootstrap.Modal(m); //bootstrap object eka haduwa
        k.show(); //modal eka pennanawa
      } else {
        document.getElementById("msg").innerHTML = text;
      }
    }
  };
  r.open("POST", "signupverify.php", true);
  r.send(form);
}
function signverify() {
  var ec = document.getElementById("ec"); //validation code received
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var email = document.getElementById("em");
  var password2 = document.getElementById("pw2");
  var password = document.getElementById("pw");

  var formData = new FormData();
  formData.append("ec", ec.value);
  formData.append("fname", fname.value);
  formData.append("lname", lname.value);
  formData.append("email", email.value);
  formData.append("password", password.value);
  formData.append("password2", password2.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "Success") {
        alert("Successfully Registered");
        k.hide();
        window.location = "Signin_and_signup.php";
      } else {
        alert(text);
        k.hide();
      }
    }
  };
  r.open("POST", "signUpProcess.php", true);
  r.send(formData);
}

function login() {
  var x = document.getElementById("login");
  var email = document.getElementById("logemail");
  var password = document.getElementById("logpw");
  var remember = document.getElementById("remember");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);
  form.append("remember", remember.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == "Success") {
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = text;

        setTimeout(function () {
          x.click();
        }, 2500);
      }
    }
  };
  r.open("POST", "signInProcess.php", true);
  r.send(form);
}

function forgetPassword() {
  var email = document.getElementById("logemail");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == "Success") {
        alert("Verification email sent.Please check your inbox.");

        var m = document.getElementById("forgetPasswordModal"); //modal eke id eka hoya gnnw
        k = new bootstrap.Modal(m); //bootstrap object eka haduwa
        k.show(); //modal eka pennanawa
      } else {
        
        var modal = document.getElementById("ermd"); //modal eke id eka hoya gnnw
        var inner = document.getElementById("txts");
        inner.innerHTML = text;
        k = new bootstrap.Modal(modal); //bootstrap object eka haduwa
        k.show(); //modal eka pennanawa
      }
    }
  };
  r.open("GET", "forgetPasswordProcess.php?e=" + email.value, true);
  r.send();
}
function showPassword1() {
  var np = document.getElementById("np");
  var npbtn1 = document.getElementById("npbtn1"); //text wheel ekai button ekai alla gannawa

  if (npbtn1.innerHTML == "Show") {
    //btn eka athule thiyana text eka equal da kiyalaa baluwa
    np.type = "text"; //text wheel eke type eka text kara
    npbtn1.innerHTML = "Hide";
  } else {
    np.type = "password";
    npbtn1.innerHTML = "Show";
  }
}
function showPassword2() {
  var rnp = document.getElementById("rnp");
  var npbtn2 = document.getElementById("npbtn2"); //text wheel ekai button ekai alla gannawa

  if (npbtn2.innerHTML == "Show") {
    //btn eka athule thiyana text eka equal da kiyalaa baluwa
    rnp.type = "text"; //text wheel eke type eka text kara
    npbtn2.innerHTML = "Hide";
  } else {
    rnp.type = "password"; //type eka password walata change kara
    npbtn2.innerHTML = "Show"; //button eke text eka show kara
  }
}
function resetPassword() {
  var e = document.getElementById("logemail"); //email eca
  var np = document.getElementById("np"); //new password
  var rnp = document.getElementById("rnp"); //re entered new password
  var vc = document.getElementById("vc"); //validation code received

  var formData = new FormData();
  formData.append("e", e.value);
  formData.append("np", np.value);
  formData.append("rnp", rnp.value);
  formData.append("vc", vc.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "Success") {
        alert("Password Reset Success");
        k.hide();
      } else {
        alert(text);
      }
    }
  };
  r.open("POST", "resetPassword.php", true);
  r.send(formData);
}

function goToAddProduct() {
  window.location = "addproduct.php";
}
function changeIMG() {
  var image = document.getElementById("imguploader");
  var view = document.getElementById("prev");

  image.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    view.src = url;
  };
}
function addProduct() {
  var category = document.getElementById("ca");
  var brand = document.getElementById("br");
  var model = document.getElementById("mo");
  var title = document.getElementById("ti");

  var condition;
  if (document.getElementById("bn").checked) {
    condition = "1";
  } else if (document.getElementById("us").checked) {
    condition = "2";
  }

  var colour;
  if (document.getElementById("clr1").checked) {
    colour = "1";
  } else if (document.getElementById("clr2").checked) {
    colour = "2";
  } else if (document.getElementById("clr3").checked) {
    colour = "3";
  } else if (document.getElementById("clr4").checked) {
    colour = "4";
  } else if (document.getElementById("clr5").checked) {
    colour = "5";
  } else if (document.getElementById("clr6").checked) {
    colour = "6";
  }

  var qty = document.getElementById("qty");
  var price = document.getElementById("cost");
  var delivery_within_colombo = document.getElementById("dwc");
  var delivery_out_of_colombo = document.getElementById("doc");
  var head = document.getElementById("head");
  var description = document.getElementById("desc");
  var image = document.getElementById("imguploader");

  var form = new FormData();

  form.append("c", category.value);
  form.append("b", brand.value);
  form.append("m", model.value);
  form.append("t", title.value);
  form.append("co", condition);
  form.append("col", colour);
  form.append("qty", qty.value);
  form.append("p", price.value);
  form.append("dwc", delivery_within_colombo.value);
  form.append("doc", delivery_out_of_colombo.value);
  form.append("head", head.value);
  form.append("desc", description.value);
  // form.append("img", image.files[0]);
  if (image.files.length > 4) {
    alert("Only 3 files can be uploaded!");
  } else {
    for (var x = 0; x < image.files.length; x++) {
      form.append("img" + x, image.files[x]);
    }
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var text = r.responseText;
        alert(text);
      }
    };
  }

  r.open("POST", "addProductProcess.php", true);
  r.send(form);

  //alert(category.value);
  //alert(brand.value);
  //alert(model.value);
  //alert(title.value);
  //alert(condition);
  //alert(colour);
  //alert(qty.value);
  //alert(price.value);
  //alert(delivery_within_colombo.value);
  //alert(delivery_out_of_colombo.value);
  //alert(description.value);
  //alert(image.value);
}
function changeImg1() {
  var image = document.getElementById("imguploader"); //file chooser
  var view = document.getElementById("prev"); //img tag
  var view1 = document.getElementById("prev1");
  var view2 = document.getElementById("prev2");
  var view3 = document.getElementById("prev3");

  image.onchange = function () {
    var file = this.files[0];
    var file1 = this.files[1];
    var file2 = this.files[2];
    var file3 = this.files[3];

    var url = window.URL.createObjectURL(file);
    var url1 = window.URL.createObjectURL(file1);
    var url2 = window.URL.createObjectURL(file2);
    var url3 = window.URL.createObjectURL(file3);

    view.src = url;
    view1.src = url1;
    view2.src = url2;
    view3.src = url3;
  };
}

function signout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        window.location = "home.php";
      }
    }
  };
  r.open("GET", "signout.php", true);
  r.send();
}

function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var postalcode = document.getElementById("postalcode");
  var inner = document.getElementById("inner");
  var model = document.getElementById("md");

  var f = new FormData();
  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("m", mobile.value);
  f.append("a1", line1.value);
  f.append("a2", line2.value);
  f.append("p", province.value);
  f.append("d", district.value);
  f.append("c", city.value);
  f.append("pcode", postalcode.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "12") {
        inner.innerHTML = "Profile Updated Successfully";

        k = new bootstrap.Modal(model);
        k.show();
      } else if (t == "2") {
        inner.innerHTML = "User Details Updated";

        k = new bootstrap.Modal(model);
        k.show();
      } else if (t == "1") {
        inner.innerHTML = "User Details Updated";

        k = new bootstrap.Modal(model);
        k.show();
      }
    }
  };

  r.open("POST", "updateProfileProcess.php", true);
  r.send(f);

  // alert(fname.value);
  // alert(lname.value);
  // alert(mobile.value);
  // alert(line1.value);
  // alert(line2.value);
  // alert(city.value);
  // alert(img.value);
}
function refreshacc() {
  window.location = "account.php";
}
function changeStatus(id) {
  var productid = id;
  var statuslabel = document.getElementById("checklabel" + productid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "deactive") {
        statuslabel.innerHTML = "Make Your Product Active";
        statuslabel.classList = "fw-bold text-info";
      } else if (t == "active") {
        statuslabel.innerHTML = "Make Your Product Deactive";
        statuslabel.classList = "fw-bold text-danger";
      }
    }
  };
  r.open("GET", "statusChangeProcess.php?p=" + productid, true);
  r.send();
}

function deletemodel(id) {
  var dm = document.getElementById("deletemodel" + id);
  k = new bootstrap.Modal(dm);
  k.show();
}

function deleteproduct(id) {
  var card = document.getElementById("card" + id);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var t = request.responseText;
      if (t == "success") {
        k.hide();
        // window.location = "sellerProductView.php";
        card.parentNode.removeChild(card);
      }
    }
  };

  request.open("GET", "deleteproductprocess.php?id=" + id, true);
  request.send();
}
function updateProduct(id) {
  var m = document.getElementById("errorModel");
  // alert("ok");

  var id = id;
  // alert(id);

  var title = document.getElementById("u_title");
  var qty = document.getElementById("u_qty");
  var dwc = document.getElementById("u_dwc");
  var doc = document.getElementById("u_doc");
  var head = document.getElementById("u_head");
  var desc = document.getElementById("u_desc");
  var img0 = document.getElementById("imguploader0");
  var img1 = document.getElementById("imguploader1");
  var img2 = document.getElementById("imguploader2");
  var img3 = document.getElementById("imguploader3");

  var from = new FormData();
  from.append("title", title.value);
  from.append("qty", qty.value);
  from.append("dwc", dwc.value);
  from.append("doc", doc.value);
  from.append("head", head.value);
  from.append("desc", desc.value);
  from.append("img0", img0.files[0]);
  from.append("img1", img1.files[0]);
  from.append("img2", img2.files[0]);
  from.append("img3", img3.files[0]);
  from.append("id", id);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "") {
        window.location = "updateproduct.php";
      } else {
       

        k = new bootstrap.Modal(m);

        k.show();

        document.getElementById("msg").innerHTML = text;
      }
    }
  };
  r.open("POST", "updateProductProcess.php", true);
  r.send(from);
}
function searchProductHistory(x) {
  var page = x;
  var search = document.getElementById("searchtxt").value;
  var product_div = document.getElementById("product_div");
  var data = document.getElementById("data");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 1) {
        alert(t);
      } else {
        data.innerHTML = "";
        product_div.innerHTML = t;
      }
    }
  };

  r.open(
    "GET",
    "productHistorySearchProcess.php?s=" + search + "&p=" + page,
    true
  );
  r.send();
}
function addFilters(x) {
  // alert("filters");
  var page = x;
  // alert(x);

  var search = document.getElementById("s");

  var age;
  if (document.getElementById("n").checked) {
    age = 1;
  } else if (document.getElementById("o").checked) {
    age = 2;
  } else {
    age = 0;
  }

  var qty;
  if (document.getElementById("h").checked) {
    qty = 1;
  } else if (document.getElementById("l").checked) {
    qty = 2;
  } else {
    qty = 0;
  }
  var condition;
  if (document.getElementById("b").checked) {
    condition = 1;
  } else if (document.getElementById("u").checked) {
    condition = 2;
  } else {
    condition = 0;
  }

  // alert(search.value);
  // alert(age);
  // alert(qty);
  // alert(condition);
  var f = new FormData();
  f.append("s", search.value);
  f.append("a", age);
  f.append("q", qty);
  f.append("c", condition);
  f.append("p", page);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "empty") {
        window.location = "sellerproductview.php";
      } else {
        if (document.getElementById("pro_view") != undefined) {
          document.getElementById("pro_view").className = "d-none";
        }
        document.getElementById("product_view_div").innerHTML = t;
      }
    }
  };
  r.open("POST", "filterProcess.php", true);
  r.send(f);
}

function sendid(id) {
  // alert(id);
  var id = id;

  var requset = new XMLHttpRequest();
  requset.onreadystatechange = function () {
    if (requset.readyState == 4) {
      var t = requset.responseText;
      if (t == "1") {
        window.location = "UpdateProduct.php";
      }
    }
  };
  requset.open("GET", "sendproductprocess.php?id=" + id, true);
  requset.send();
}

function loadmainimg(id) {
  var img = document.getElementById("pimg" + id).src;
  var mainimg = document.getElementById("mainimg");
  mainimg.src = img;
}

function qty_inc(qty) {
  var input = document.getElementById("qtyinput");
  if (input.value < qty) {
    var newval = parseInt(input.value) + 1;
    input.value = newval.toString();
  } else {
    alert("Maximum quantity count has been achieved.");
  }
}

function qty_dec() {
  var input = document.getElementById("qtyinput");

  if (input.value > 1) {
    var newval = parseInt(input.value) - 1;
    input.value = newval.toString();
  } else {
    alert("Minimum quantity count has been achieved.");
  }
}
// Basic search
function basicsearch(x) {
  var page = x;

  var searchText = document.getElementById("basic_search_txt").value;
  var searching = document.getElementById("searchdetails");

  var f = new FormData();
  f.append("t", searchText);
  f.append("p", page);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      searching.innerHTML = t;
    }
  };

  r.open("POST", "basicSearchProcess.php", true);
  r.send(f);
}
function addToWatchlist(id) {
  var modal = document.getElementById("wd");
  var inner = document.getElementById("inner2");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        inner.innerHTML = "Item added to Wishlist successfully";
        k = new bootstrap.Modal(modal);
        k.show();
      } else {
        inner.innerHTML = t;

        k = new bootstrap.Modal(modal);
        k.show();
      }
    }
  };
  r.open("GET", "addToWishlistProcess.php?pid=" + id, true);
  r.send();
}

function deleteformwatchlist(id) {
  var wid = id;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      if (text == "success") {
        window.location = "wishlist.php";
      }
    }
  };

  request.open("GET", "removeWishlistItemProcess.php?id=" + wid, true);
  request.send();
}

function addtocart(id) {
  var modal = document.getElementById("modalAddcart" + id);
  var qtytxt = document.getElementById("qtyinput" + id).value;
  var inner = document.getElementById("inner");
  var pid = id;

  // alert(pid);
  // alert(qtytxt);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "success") {
        // alert("successfully Added to cart");
        k = new bootstrap.Modal(modal);
        k.show();
      } else {
        inner.innerHTML = text;
        var noses = document.getElementById("md");
        k = new bootstrap.Modal(noses);
        k.show();
      }
    }
  };
  r.open("GET", "addTocartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
  r.send();
}

function addtoshopcart(id) {
  var modal = document.getElementById("md");
  var qtytxt = document.getElementById("qtyinput" + id).value;
  var inner = document.getElementById("inner");
  var pid = id;

  // alert(pid);
  // alert(qtytxt);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "success") {
        // alert("successfully Added to cart");
        inner.innerHTML = "Item added to cart successfully";
        k = new bootstrap.Modal(modal);
        k.show();
      } else {
        inner.innerHTML = text;

        k = new bootstrap.Modal(modal);
        k.show();
      }
    }
  };
  r.open("GET", "addTocartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
  r.send();
}

function deletefromCart(id) {
  var cid = id;

  var rq = new XMLHttpRequest();

  rq.onreadystatechange = function () {
    if (rq.readyState == 4) {
      var tx = rq.responseText;

      if (tx == "success") {
        // window.location = "cart.php";

        window.location.reload();
      }
    }
  };

  rq.open("GET", "deleteFromCartProcess.php?id=" + cid, true);
  rq.send();
}

//payments

function paynow(id) {

  var modal = document.getElementById("wd");
  var inner = document.getElementById("inner2");
  var qty = document.getElementById("qtyinput" + id).value;
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      var obj = JSON.parse(t);

      var mail = obj["email"];
      var amount = obj["amount"];
      var avqty = obj["qty"];

      if (t == "1") {
        inner.innerHTML = "Please Sign In First";
        k = new bootstrap.Modal(modal);
        k.show();
        // window.location = "Signin_and_signup.php";
      } else if (t == "2") {
        alert("Please Update your Profile First");
        window.location = "account.php";
      } else if (t == "3") {
        alert("Please enter a valid quantity");
      } else if (t == "4") {
        alert("Please enter a valid quantity");
      } else {
        // Called when user completed the payment. It can be a successful payment or failure
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          saveInvoice(orderId, id, mail, amount, qty);
          //Note: validate the payment and show success or failure page to the customer
        };

        // Called when user closes the payment without completing
        payhere.onDismissed = function onDismissed() {
          //Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Called when error happens when initializing payment such as invalid parameters
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1219168", // Replace your Merchant ID
          return_url: "http://localhost/eshop/singleproductview.php?id=" + id, // Important
          cancel_url: "http://localhost/eshop/singleproductview.php?id=" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: obj["amount"] + ".00",
          currency: "LKR",
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById("payhere-payment").onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };
  r.open("GET", "buynowprocess.php?id=" + id + "&qty=" + qty, true);
  r.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {
  var orderid = orderId;
  var pid = id;
  var email = mail;
  var total = amount;
  var pqty = qty;

  var f = new FormData();
  f.append("oid", orderid);
  f.append("pid", pid);
  f.append("email", email);
  f.append("total", total);
  f.append("pqty", pqty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "1") {
        window.location = "invoice.php?id=" + orderid;
      }
    }
  };

  r.open("POST", "saveinvoice.php", true);
  r.send(f);
}

function deleteproductFromhistory(id) {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "purchasehistory.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deleteproductfromhistory.php?id=" + id, true);
  r.send();
}

function deleteallproductFromhistory() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      window.location = "purchasehistory.php";
    }
  };

  r.open("GET", "deleteallproductfromhistory.php", true);
  r.send();
}

function detailsmode(id) {
  alert(id);
}

function printDiv() {
  var restorepage = document.body.innerHTML;
  var page = document.getElementById("invoice").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorepage;
}

//savepdf

function pdfdonw() {
  document.getElementById("download").addEventListener("click", () => {
    const invoice = this.document.getElementById("invoice");
    console.log(invoice);
    console.log(window);
    var opt = {
      margin: 0.5,
      filename: "MintStoreLK_invoice.pdf",
      image: { type: "jpeg", quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };
    html2pdf().from(invoice).set(opt).save();
  });
}

function addFeedback(id) {
  var feedmodal = document.getElementById("feedbackModal" + id);

  k = new bootstrap.Modal(feedmodal);

  k.show();
}

function saveFeedback(id) {
  var pid = id;
  var feedtxt = document.getElementById("feedtxt" + pid).value;

  var f = new FormData();
  f.append("i", pid);
  f.append("ft", feedtxt);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "1") {
        document.getElementById("feedtxt" + pid).value = "";
        k.hide();
      }
    }
  };
  r.open("POST", "saveFeedbackProcess.php", true);
  r.send(f);
}

function adminverification() {
  var e = document.getElementById("e").value;

  var f = new FormData();
  f.append("e", e);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        var verficationModal = document.getElementById("verficationmodal");
        k = new bootstrap.Modal(verficationModal);
        k.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "adminverficationprocess.php", true);
  r.send(f);
}

function verify() {
  var verficationcode = document.getElementById("v").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        k.hide();
        window.location = "adminpanel.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "verifyprocess.php?v=" + verficationcode, true);
  r.send();
}
function blockuser(email) {
  var mail = email;

  var blockbtn = document.getElementById("blockbtn" + mail);

  var f = new FormData();
  f.append("e", mail);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success2") {
        blockbtn.className = "btn btn-danger";
        blockbtn.innerHTML = "Block";
      } else if (t == "success1") {
        blockbtn.className = "btn btn-success";
        blockbtn.innerHTML = "Unblock";
      }

      // alert(t);
    }
  };

  r.open("POST", "userBlockProcess.php", true);
  r.send(f);
}
function searchUser() {
  var text = document.getElementById("searchtxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      if (t == "success") {
        window.location = "manageusers.php";
      }
    }
  };

  r.open("GET", "searchuser.php?s=" + text, true);
  r.send();
}

function dailyselling() {
  var from = document.getElementById("fromdate").value;
  var to = document.getElementById("todate").value;

  // alert(from);
  // alert(to);

  var link = document.getElementById("historylink");

  link.href = "sellinghistory.php?f=" + from + "&t=" + to;
}
function sendmessage(mail) {
  var email = mail;
  var msgtxt = document.getElementById("msgtxt").value;

  var f = new FormData();
  f.append("e", email);
  f.append("t", msgtxt);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        alert("Message Sent Successfully");
      } else {
        alert("t");
      }
    }
  };

  r.open("POST", "sendmessageprocess.php", true);
  r.send(f);
}

// refresher

function refresher() {
  setInterval(refreshmsgare, 500);
  setInterval(refreshrecentarea, 500);
}

// refres msg view area
var chatrow;

function refreshmsgare(mail) {
  chatrow = document.getElementById("chatrow");

  var f = new FormData();
  f.append("e", mail);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      chatrow.innerHTML = t;
    }
  };

  r.open("POST", "refreshmsgareaprocess.php", true);
  r.send(f);
}

// refreshrecentarea

function refreshrecentarea() {
  var rcv = document.getElementById("rcv");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      rcv.innerHTML = t;
    }
  };

  r.open("POST", "refreshrecentareaprocess.php", true);
  r.send();
}

function newmsgmodal() {
  var pop = document.getElementById("msgmodal");

  k = new bootstrap.Modal(pop);

  k.show();
}

//////////viewmsgmodal/////

function viewmsgmodal() {
  var pop = document.getElementById("msgmodal");

  k = new bootstrap.Modal(pop);
  k.show();
}

//////////addnewmodal/////

function addnewmodal() {
  var pop = document.getElementById("addnewmodal");

  k = new bootstrap.Modal(pop);
  k.show();
}

////////savecategory//////

function savecategory() {
  var txt = document.getElementById("categorytxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        k.hide();
        alert("Category saved successfully.");
        window.location = "manageproducts.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addnewCategoryprocess.php?t=" + txt, true);
  r.send();
}

////////////singleviewmoda//////

function singleviewmodal(id) {
  var pop = document.getElementById("singleproductview" + id);

  k = new bootstrap.Modal(pop);
  k.show();
}

//////////addnewmodalbr/////

function addnewmodalbr() {
  var pop = document.getElementById("addnewmodalbr");

  k = new bootstrap.Modal(pop);
  k.show();
}

////////saverbrand//////

function savebrand() {
  var txt = document.getElementById("brandtxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        k.hide();
        alert("Brand saved successfully.");
        window.location = "manageproducts.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addnewBrandprocess.php?t=" + txt, true);
  r.send();
}

//////////addnewmodalmd/////

function addnewmodalmd() {
  var pop = document.getElementById("addnewmodalmd");

  k = new bootstrap.Modal(pop);
  k.show();
}

/////newmodal/////
function savemodel() {
  var txt = document.getElementById("modeltxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        k.hide();
        alert("Modal saved successfully.");
        window.location = "manageproducts.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addnewModalprocess.php?t=" + txt, true);
  r.send();
}
function checkout() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      var obj = JSON.parse(text);

      var mail = obj["email"];
      var amount = obj["amount"];

      if (text == "1") {
        alert("Please Sign In First");
        window.location = "Signin_and_signup.php";
      } else if (text == "2") {
        alert("Please Update your Profile First");
        window.location = "account.php";
      } else {
        // Called when user completed the payment. It can be a successful payment or failure
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);

          savefullInvoice(orderId);
          //Note: validate the payment and show success or failure page to the customer
        };

        // Called when user closes the payment without completing
        payhere.onDismissed = function onDismissed() {
          //Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Called when error happens when initializing payment such as invalid parameters
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1219168", // Replace your Merchant ID
          return_url: "http://localhost/mintstore/cart.php", // Important
          cancel_url: "http://localhost/mintstore/cart.php", // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: obj["amount"] + ".00",
          currency: "LKR",
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById("payhere-payment").onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };
  r.open("GET", "checkout.php", true);
  r.send();
}

function savefullInvoice(orderId) {
  var orderid = orderId;

  var f = new FormData();
  f.append("oid", orderid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "1") {
        window.location = "invoice.php?id=" + orderid;
      }
    }
  };

  r.open("POST", "checkoutinvoiceprocess.php", true);
  r.send(f);
}
function deleteuseraccount() {
  var email = document.getElementById("email").value;

  // alert(email);

  var form = new FormData();
  form.append("e", email);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "1") {
        var m = document.getElementById("deleteacc");
        k = new bootstrap.Modal(m);
        k.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "deleteverifyprocess.php", true);
  r.send(form);
}

function deleteaccount() {
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "1") {
        k.hide();
        window.location = "index.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "deleteaccount.php", true);
  r.send();
}

function categorysearch(id) {
  var searching = document.getElementById("searchdetails");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
    }
  };

  r.open("GET", "categorysearch.php?id=" + id, true);
  r.send();
}

function sortby(id) {
  var page = id;
  var sort = document.getElementById("sort").value;
  var searching = document.getElementById("searchdetails");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
    }
  };

  r.open("GET", "sortshop.php?id=" + sort + "&page=" + page, true);
  r.send();
}

function headsearch(x) {
  var page = x;

  var searchText = document.getElementById("headtext").value;
  var searching = document.getElementById("load");

  var f = new FormData();
  f.append("t", searchText);
  f.append("p", page);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
      searchText.innerHTML = " ";
      document.getElementById("close").click();
    }
  };

  r.open("POST", "headsearch.php", true);
  r.send(f);
}
function headsearch2(x) {
  var page = x;

  var searchText = document.getElementById("headtext2").value;
  var searching = document.getElementById("load");

  var f = new FormData();
  f.append("t", searchText);
  f.append("p", page);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
    }
  };

  r.open("POST", "headsearch.php", true);
  r.send(f);
}
function cartupdate(id) {
  var qty = document.getElementById("qtyup" + id).value;

  var f = new FormData();
  f.append("id", id);
  f.append("qty", qty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "n") {
        alert("Enter a valid quantity");
        window.location = "cart.php";
      } else if (t == "cf") {
        alert("Cart is full");
      }
    }
  };

  r.open("POST", "cartqtyupdate.php", true);
  r.send(f);
}
function autoprice(id) {
  var price = document.getElementById("price" + id);
  var tag = document.getElementById("sub");
  var total = document.getElementById("tot");

  var f = new FormData();
  f.append("id", id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {

     
      var t = r.responseText;

      var obj = JSON.parse(t);

      price.innerHTML = "Rs." + obj["total"] + ".00";
      tag.innerHTML = "Rs." + obj["sub"] + ".00";
      total.innerHTML = "Rs." + obj["totupdate"] + ".00";
    }
  };

  r.open("POST", "autocartpriceupdate.php", true);
  r.send(f);
}

// function autosubtotal() {
//   var tag = document.getElementById("sub");

//   var r = new XMLHttpRequest();

//   r.onreadystatechange = function () {
//     if (r.readyState == 4) {
//       var t = r.responseText;
//       tag.innerHTML = t;
//     }
//   };

//   r.open("GET", "autosubtotalload.php", true);
//   r.send();
// }
// function autototal() {
//   var tag = document.getElementById("tot");

//   var r = new XMLHttpRequest();

//   r.onreadystatechange = function () {
//     if (r.readyState == 4) {
//       var t = r.responseText;
//       tag.innerHTML = t;
//     }
//   };

//   r.open("GET", "carttotalupdate.php", true);
//   r.send();
// }
function linkItems() {
  var brn = document.getElementById("brnselect");
  var mod = document.getElementById("modSelect");

  var form = new FormData();

  form.append("brn", brn.value);
  form.append("mod", mod.value);

  var r = new XMLHttpRequest();

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "success") {
        window.location = "manageproducts.php";
      } else {
        alert(text);
      }
    }
  };

  r.open("POST", "linkItem.php", true);
  r.send(form);
}
function fullfilter(id) {
  var brand = id;
  var price = document.getElementById("amount").value;
  var conid;
  if (document.getElementById("cond1").checked) {
    conid = 1;
  } else if (document.getElementById("cond2").checked) {
    conid = 2;
  }
  if (typeof brand == "undefined") {
    var b = "bnone";
  } else {
    var b = "brun";
  }

  if (typeof conid == "undefined") {
    var c = "cnone";
  } else {
    var c = "crun";
  }

  if (price != "25000 - 75000" && b == "bnone" && c == "cnone") {
    filterprice();
  } else if (b == "brun" && price == "25000 - 75000" && c == "cnone") {
    brandfilter(id);
  } else if (c == "crun" && price == "25000 - 75000") {
    confil();
  } else if (b == "brun" && price != "25000 - 75000" && c == "cnone") {
    priceandbrandfil(brand);
  } else if (price != "25000 - 75000" && c == "crun") {
    // priceandcondfil(conid);
    allfilteronce();
  } else {
    alert("Error");
  }
}

function filterprice() {
  var amount = document.getElementById("amount").value;
  var searching = document.getElementById("searchdetails");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      searching.innerHTML = t;
    }
  };

  r.open("GET", "filterprice.php?amount=" + amount, true);
  r.send();
}

function brandfilter(id) {
  var brandid = document.getElementById("brand" + id).value;
  var searching = document.getElementById("searchdetails");

  // alert(brandid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      searching.innerHTML = t;
    }
  };

  r.open("GET", "brandfilter.php?bid=" + brandid, true);
  r.send();
}
function confil() {
  var conid;
  if (document.getElementById("cond1").checked) {
    conid = 1;
  } else if (document.getElementById("cond2").checked) {
    conid = 2;
  }
  var searching = document.getElementById("searchdetails");
  page = "1";

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      searching.innerHTML = t;
    }
  };

  r.open("GET", "confilter.php?cid=" + conid + "&page=" + page, true);
  r.send();
}

function priceandbrandfil(brand) {
  var brandid = brand;
  var amount = document.getElementById("amount").value;
  var searching = document.getElementById("searchdetails");

  var form = new FormData();
  form.append("bid", brandid);
  form.append("amount", amount);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
    }
  };

  r.open("POST", "priceandbrandfil.php", true);
  r.send(form);
}

function priceandcondfil(conid) {
  var cid = conid;
  var amount = document.getElementById("amount").value;
  var searching = document.getElementById("searchdetails");

  var form = new FormData();
  form.append("cond", cid);
  form.append("amount", amount);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
    }
  };

  r.open("POST", "priceandcondfil.php", true);
  r.send(form);
}
function allfilteronce(id) {
  var searching = document.getElementById("searchdetails");
  var conid;
  if (document.getElementById("cond1").checked) {
    conid = 1;
  } else if (document.getElementById("cond2").checked) {
    conid = 2;
  }

  var amount = document.getElementById("amount").value;

  var bid;

  if (id === undefined) {
    bid = "0";
  } else {
    bid = id;
  }
  var form = new FormData();
  form.append("cond", conid);
  form.append("amount", amount);
  form.append("bid", bid);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      searching.innerHTML = t;
    }
  };

  r.open("POST", "allfilteronce.php", true);
  r.send(form);
}

function changetc(id){

  var tag = document.getElementById("tc").value;
  

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
      if(t == "success"){
        // alert("Done");
      }else{
        alert(t);
      }
    }
  };
  r.open("GET","trackidchange.php?tag="+ tag + "&tid=" + id ,true);
  r.send();
}