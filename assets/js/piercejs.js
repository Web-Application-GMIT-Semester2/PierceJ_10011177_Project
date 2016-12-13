var doc = document.getElementsByClassName("btn");
for (var i=0; i<doc.length; i++){
  doc[i].addEventListener("click", addToCart, true);
}

var username = document.getElementById("username").innerHTML;

var razorObj = JSON.parse(localStorage.getItem("basket_"+ username));
if (razorObj === null) {
  razorObj = {ejQuan: 0, mkQuan: 0, wsQuan: 0, ejPrice: 0, mkPrice: 0, wsPrice: 0};
}

function addToCart() {
  if (this.getAttribute("id") === "EJ") {
    razorObj.ejQuan += 1;
    razorObj.ejName = "Edwin Jagger DE89";
    razorObj.ejPrice = 29.95;
  } else if (this.getAttribute("id") === "MK") {
    razorObj.mkQuan += 1;
    razorObj.mkName = "Merkur 34c";
    razorObj.mkPrice = 34.95;
  } else {
    razorObj.wsQuan += 1;
    razorObj.wsName = "Wilkinson Sword Classic";
    razorObj.wsPrice = 4.75;
  }

  localStorage.setItem("basket_" + username, JSON.stringify(razorObj));
}

var detailsObj = JSON.parse(localStorage.getItem("basket_"+username));
if (detailsObj === null) {
  detailsObj = {ejQuan: 0, mkQuan: 0, wsQuan: 0, ejPrice: 0, mkPrice: 0, wsPrice: 0};
}

var el = document.getElementById('nameList');
var payPage = document.getElementById('payment');
if (el === null && payPage === null) {
  console.log("Wrong Page")
} else if (payPage === null){
  el.addEventListener("load", populatePage());
} else {
  payPage.addEventListener("load", paymentPage());
}

function populatePage(){
  var wsTotal = parseFloat(detailsObj.wsPrice).toFixed(2) * detailsObj.wsQuan;
  var mkTotal = parseFloat(detailsObj.mkPrice).toFixed(2) * detailsObj.mkQuan;
  var ejTotal = parseFloat(detailsObj.ejPrice).toFixed(2) * detailsObj.ejQuan;
  var grandTotal = wsTotal + mkTotal + ejTotal;
  detailsObj.grandTotal = grandTotal;

  localStorage.setItem("basket_" + username, JSON.stringify(detailsObj));
  var divContent ="<table border='1px solid black' id='t1'><tr><td>Item</td><td>Quantity</td><td>Item Price</td><td>Total Price</td><tr>";
  if (detailsObj.wsQuan > 0) {
    divContent += "<td><img width=100 height=100 src='images/2.jpg'></td>"
    divContent += "<td><input id='wsMinus' class='quantity' type='button' value='-'></input><a>" + detailsObj.wsQuan + "</a><input id='wsPlus' class='quantity' type='button' value='+'></input></td><td>€" + detailsObj.wsPrice + "</td><td>€" + parseFloat(wsTotal).toFixed(2) +"</td></tr>"
  } else {
    divContent += "";
  }
  if (detailsObj.mkQuan > 0) {
    divContent += "<td><img width=100 height=100 src='images/3.jpg'></td>"
    divContent += "<td><input id='mkMinus' class='quantity' type='button' value='-'></input><a>" + detailsObj.mkQuan + "</a><input id='mkPlus' class='quantity' type='button' value='+'></input></td><td>€" + detailsObj.mkPrice + "</td><td>€" + parseFloat(mkTotal).toFixed(2) + "</td></tr>"
  } else {
    divContent += "";
  }
  if (detailsObj.ejQuan > 0) {
    divContent += "<td><img width=100 height=100 src=images/1.jpg></td>"
    divContent += "<td><input id='ejMinus' class='quantity' type='button' value='-'></input><a>" + detailsObj.ejQuan + "</a><input id='ejPlus' class='quantity' type='button' value='+'></input></td><td>€" + detailsObj.ejPrice + "</td><td>€" + parseFloat(ejTotal).toFixed(2) +"</td></tr>"
  } else {
    divContent += "";
  }
  divContent += "<tfoot><tr><td></td><td></td><td>Grand Total</td><td>€" + parseFloat(grandTotal).toFixed(2) + "</td><td valign='bottom' align='left'><button id='checkout'>Checkout</button></td></tr></tfoot></div>"
  var divEl =document.getElementById("nameList");
  divEl.innerHTML = divContent;

  var addSub = document.getElementsByClassName("quantity");
  for (var i=0; i<addSub.length; i++){
    addSub[i].addEventListener("click", addRemove, true);
  }
  var checkout = document.getElementById("checkout");
  checkout.addEventListener("click", toCheckoutPage, true);
}

function paymentPage(){
  var detailsObj = JSON.parse(localStorage.getItem("basket_" + username));
  var orderNo=detailsObj.orderNo;
  var paymentCont = "Items for Order no: <b name='orderNo'>" + detailsObj.orderNo + "</b></p>";
  var $orderNoTxt = $('#orderNo');
  var $item1Txt = $('#itemName1');
  var $item2Txt = $('#itemName2');
  var $item3Txt = $('#itemName3');
  $orderNoTxt.val(detailsObj.orderNo);
  var $totalTxt = $('#total');
  if (detailsObj.wsQuan > 0) {
    paymentCont += "<p name='details'>'" + detailsObj.wsName + "' x " + detailsObj.wsQuan + " @ €" + detailsObj.wsPrice + ". <b>Sub</b> Total = €" + (detailsObj.wsQuan*detailsObj.wsPrice).toFixed(2) + "</p>"
    $item1Txt.val(detailsObj.wsName);
  } else {
    paymentCont += "";
    $item1Txt.val("NULL");
  }
  if (detailsObj.mkQuan > 0) {
    paymentCont += "<p name=details2>'" + detailsObj.mkName + "' x " + detailsObj.mkQuan + " @ €" + detailsObj.mkPrice + ". <b>Sub</b> Total = €" + (detailsObj.mkQuan*detailsObj.mkPrice).toFixed(2) + "</p>"
    $item2Txt.val(detailsObj.mkName);
  } else {
    paymentCont += "";
    $item2Txt.val("NULL");
  }
  if (detailsObj.ejQuan > 0) {
    paymentCont += "<p name=details3>'" + detailsObj.ejName + "' x " + detailsObj.ejQuan + " @ €" + detailsObj.ejPrice + ". <b>Sub</b> Total = €" + (detailsObj.ejQuan*detailsObj.ejPrice).toFixed(2) + "</p>"
    $item3Txt.val(detailsObj.ejName);
  } else {
    paymentCont += "";
    $item3Txt.val("NULL");
  }
  paymentCont += "<p><b>Grand</b> Total = €" + (detailsObj.grandTotal).toFixed(2) + "</p></form>";
  $totalTxt.val(detailsObj.grandTotal);
  var divPl =document.getElementById("payment");
  divPl.innerHTML = paymentCont;

  $(function(){

  	$isValid=false; //global variable for validator result

  	//credit card validator
  	$('#cc_number').validateCreditCard(function(result){
  		result.valid ? $isValid=true : $isValid=false;
  	});

  	//Confirm button
  	$('.confirm').on('click', function(){
      if ($isValid) {
        $(".ccSuccess").show();
        document.getElementById("ccSuccess").removeAttribute("hidden");
        var x = document.getElementById("timeout");
        $(".confirm").hide();
        $("#cc_number").hide();
        setTimeout(function(){ x.innerHTML="2" }, 1000);
        setTimeout(function(){ x.innerHTML="1" }, 2000);
        setTimeout(function(){ x.innerHTML="0" }, 3000);
        setTimeout(function(){ x.innerHTML="0"; $('#orders').click(); localStorage.removeItem("basket_"+username)}, 4000);
      } else {
        alert("Not valid cc");
      }
  	});

  });

}

function toCheckoutPage(){
  if (detailsObj.ejQuan === 0 && detailsObj.mkQuan === 0 && detailsObj.wsQuan === 0){
    alert("Please Add Items to your Cart");
    document.location.href = "home.php";
  } else {
    // var username = document.getElementById('username').innerHTML;
    detailsObj.orderNo = orderNo(username);
    localStorage.setItem("basket_"+username, JSON.stringify(detailsObj));
    var confirmPay = confirm("Go To Payment Page ");
    if (confirmPay) {
      document.location.href = "payment.php";
    }
  }
}
function addRemove () {
  switch(this.getAttribute("id")) {
    case "ejMinus":
    detailsObj.ejQuan--;
    populatePage();
    break;
    case "ejPlus":
    detailsObj.ejQuan++;
    populatePage();
    break;
    case "mkMinus":
    detailsObj.mkQuan--;
    populatePage();
    break;
    case "mkPlus":
    detailsObj.mkQuan++;
    populatePage();
    break;
    case "wsPlus":
    detailsObj.wsQuan++;
    populatePage();
    break;
    case "wsMinus":
    detailsObj.wsQuan--;
    populatePage();
    break;
    default:
    console.log("No Value");
  }
  localStorage.setItem("basket_" +username, JSON.stringify(detailsObj));
}

function orderNo(username) {
  var date = new Date();
  var components = [
    date.getYear(),
    date.getMonth(),
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    date.getMilliseconds()
  ];

  var id = "RB" + username.toUpperCase() + components.join("") ;
  return id;
}
