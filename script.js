function sing(){
   
 var s1 =    document.getElementById("s1");
 var s2 =    document.getElementById("s2");

 s1.classList.toggle("d-none");
 s2.classList.toggle("d-none");
}
 
function signUp(){
    // alert("ok");
    var fname = document.getElementById("firstname").value;
    var lname = document.getElementById("lastname").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var repassword = document.getElementById("repassword").value;
    
    var gender  = document.getElementById("gender").value;

    

    // alert(fname);
    // alert(lname);
    // alert(mobile);
    // alert(email);
    // alert(password);
    // alert(repassword);
    //alert(gender);
    var f = new FormData();
    f.append("f",fname);
    f.append("l",lname);
    f.append("m",mobile);
    f.append("e",email);
    f.append("p",password);
    f.append("rp",repassword);
    f.append("g",gender);

    var r =new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState ==4){
            var t = r.responseText;
            if(t == "sucess"){
                window.location.reload();
                
            }else{
        var al =     document.getElementById("al");
        al.innerHTML = t;
        al.style.color = "red";
            }
        }
    }
    r.open("POST","signupprocess.php",true);
    r.send(f);
    
 }

 function signin(){
    
  var email =   document.getElementById("se").value;
  var password =   document.getElementById("sp").value;
  var rem = document.getElementById("ch").checked;
  

  var f = new FormData();
  f.append("e",email);
  f.append("p",password);
  f.append("c",rem);

  var r =new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState ==4){
            var t = r.responseText;
          if(t == "sucess"){
             window.location = "index.php";
          }else{
         var  al1 =    document.getElementById("al1");
         al1.innerHTML = t;
         al1.style.color = "red";
          }
        }
    }
    r.open("POST","signinprocess.php",true);
    r.send(f);
 }
 var bm;
 function frogotpassword(){
 var email =     document.getElementById("se").value;

 var r =new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState ==4){
            var t = r.responseText;
          if(t == "sucess"){
            alert("verification code is send");
         var m =    document.getElementById("forgotPasswordModal");
         bm = new bootstrap.Modal(m);
                bm.show();
          }else{
            alert(t);
          }
        }
    }
    r.open("GET","fogotpasswordprocess.php?e=" +email,true);
    r.send();
 }

 
 function showPassword1(){
  var input = document.getElementById("npi");
  var icon = document.getElementById("e1");

  if(input.type == "password"){
    input.type = "text";
    icon.className = "bi bi-eye-fill"
  }else if(input.type == "text"){
    input.type = "password";
    icon.className = "bi bi-eye-slash-fill";

  }
 }

 function showPassword2(){
  var input = document.getElementById("rnp");
  var icon = document.getElementById("e2");

  if(input.type == "password"){
    input.type = "text";
    icon.className = "bi bi-eye-fill"
  }else if(input.type == "text"){
    input.type = "password";
    icon.className = "bi bi-eye-slash-fill";

  }
 }

 function resetpw(){
  var password = document.getElementById("npi").value;
  var repassword = document.getElementById("rnp").value;
  var code = document.getElementById("vc").value;
  var email = document.getElementById("se").value

  var f = new FormData();
  f.append("p",password);  
  f.append("rp",repassword); 
  f.append("c",code); 
  f.append("e",email);

    var r =new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState ==4){
            var t = r.responseText;
            if(t == "Password update Sucessful"){
              alert(t);
              window.location.reload();
            }else{
              alert(t);
            }
           
        }
      }
    r.open("POST","newpasswordprocess.php",true);
    r.send(f);

 }

 function signout() {
  alert("ok");

  
}
function admin(){
  
  window.location = "adminsignin.php";
}


function code(){
  
  var email = document.getElementById("email").value;

  var r =new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState ==4){
            var t = r.responseText;
          
            alert(t);
          }
        }
    
    r.open("GET","codeprocess.php?e=" +email,true);
    r.send();


}

function login(){
  var vc = document.getElementById("code").value;
  var r =new XMLHttpRequest();
    r.onreadystatechange = function (){
        if(r.readyState ==4){
            var t = r.responseText;

            if(t == "sucess"){
              window.location = "adminpanel.php";
            }
          
            alert(t);
          }
        }
    
    r.open("GET","logprocess.php?c=" +vc,true);
    r.send();
}

function changeProductImage(){
  var image1 =   document.getElementById("imageuploader");
 
  image1.onchange = function (){
     var file2 = this.files[0];
     var url = URL.createObjectURL(file2);
     document.getElementById("i0").src = url;
  }
 }

 function addbook(){
  var ca  = document.getElementById("category").value;
  var bookname  = document.getElementById("bookname").value;
  var price  = document.getElementById("price").value;
  var qty = document.getElementById("qty").value;
  var wrname  = document.getElementById("wrname").value;
  var deliverycs  = document.getElementById("dcs").value;
  var dilivercoc  = document.getElementById("scoc").value;
  var language  = document.getElementById("language").value;
  var dis  = document.getElementById("dis").value;

  
  var i1 =     document.getElementById("imageuploader").files[0];
  var f = new FormData();
  f.append("e1",i1);
  f.append("c",ca);
  f.append("b",bookname);
  f.append("p",price);
  f.append("q",qty);
  f.append("w",wrname);
  f.append("dcs",deliverycs);
  f.append("dcoc",dilivercoc);
  f.append("l",language);
  f.append("dis",dis);
  var r = new XMLHttpRequest();
  
  r.onreadystatechange = function (){
      if(r.readyState == 4){
          var t = r.responseText;
          if(t == "sucess"){
            alert("Product Update");
            window.location = "adminpanel.php";
          }
          alert(t);
      }
  }
  r.open("POST","saveprocess.php",true);
  r.send(f);
 
 }

 function up(id){
     
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
      if(t == "success"){
        window.location = "up.php";
      }else{
      alert(t);
      }
    }
  }
  r.open("GET","upprocess.php?id="+id,true);
  r.send();
 }

 function upbook(){
var price = document.getElementById("price").value;
var qty = document.getElementById("qty").value;
var dcs = document.getElementById("dcs").value;
var dcoc = document.getElementById("scoc").value;

var i1 =     document.getElementById("imageuploader").files[0];

var f = new FormData();
f.append("e1",i1);
f.append("p",price);
f.append("q",qty);
f.append("ds",dcs);
f.append("do",dcoc);

var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
     
      alert(t);
      
    }
  }
  r.open("POST","updateprocess.php",true);
  r.send(f);
 }    

function status(id){
  var x;
 

  if(document.getElementById("flexSwitchCheckChecked").checked){
    var x =  1;
  }
  else if(document.getElementById("flexSwitchCheckChecked")){
    var x = 2;
  }
  
  var f = new FormData();
  f.append("x",x);
  f.append("id",id);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;

      if(t == "deactive"){
        document.getElementById("a").innerHTML = "Dactive Selling";
      }
      else if(t == "active"){
        document.getElementById("a").innerHTML = "Active for selling";
      }else{
     
      alert(t);
      }
    }
  }
  r.open("POST","statusproduct.php",true);
  r.send(f);

}

function bdelete(id){
  let text;
  if (confirm("Delete book reday") == true) {
    var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
      if(t == "sucess"){
        alert("Book is delete sucess");
        window.location.reload();
      }else{
      
      alert(t);
      }
    }
  }
  r.open("GET","bdeleteprocess.php?id="+id,true);
  r.send();
  } else {
    
  }
  
}



function search(){
 var input =  document.getElementById("input").value;

 var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
     
     document.getElementById("vive").innerHTML = t;
      
    }
  }
  r.open("GET","searchupdateprocess.php?in="+input,true);
  r.send();
}



function userblock(email){
 alert("ok");
}


function pissa(){
 
 var product =  document.getElementById["pissu"].value;
  alert(product);
  alert("ok");
}
function addcart(id){

  if (confirm("Add to cart") == true) {
  
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
     if(t == 1){
      alert("Add to cart Aucess");
     }else{
      alert(t);
     }
     
      
      
    }
  }
  r.open("GET","cartprocess.php?id="+id,true);
  r.send();
}else{

}
}

function cartremove(id){
  if (confirm("remove to cart") == true) {
  
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
      if(r.readyState == 4){
        var t = r.responseText;
      if(t == "Sucess"){
        alert("Remove from cart");
        window.location.reload();
      }
       
        
        
      }
    }
    r.open("GET","removecartprocess.php?id="+id,true);
    r.send();
  }else{
  
  }
}

function addwatchlist(id){
  if (confirm("Add to Watch_list") == true) {
  
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
      if(r.readyState == 4){
        var t = r.responseText;
       if(t == 1){
        alert("Add to watch-list Sucess");
       }else{
        alert(t);
       }
       
        
        
      }
    }
    r.open("GET","watchlistprocess.php?id="+id,true);
    r.send();
  }else{
  
  }
}




function removewatchlist(id){
  if (confirm("Remave to Watch_list") == true) {
  
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
      if(r.readyState == 4){
        var t = r.responseText;
       if(t == 1){
        alert("Remave to watch-list Sucess");
        window.location.reload();
       }else{
        alert(t);
       }
       
        
        
      }
    }
    r.open("GET","watchlistremaveprocess.php?id="+id,true);
    r.send();
  }else{
  
  }
  
}


function  addwatchlistcart(product_id){
  if (confirm("add to cart") == true) {
  
  var r = new XMLHttpRequest();
  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
    
      alert(t);
     
     
      
      
    }
  }
  r.open("GET","watchlistcartprocess.php?id="+product_id,true);
  r.send();
}else{
  
}
}
function changeImage(){
  var image1 =   document.getElementById("profileimg");
 
  image1.onchange = function (){
     var file2 = this.files[0];
     var url = URL.createObjectURL(file2);
     document.getElementById("q").src = url;
  }
 }


function save(){
  var i1 =     document.getElementById("profileimg").files[0];
  var country = document.getElementById("country").value;
 var province =  document.getElementById("province").value;
 var distric = document.getElementById("distric").value;
 var city = document.getElementById("city").value;
 var lane_1 = document.getElementById("lane_1").value;
 var lane_2 = document.getElementById("lane_2").value;
 var code = document.getElementById("code").value;
 
 
 var f = new FormData();
 f.append("country",country);
 f.append("province",province);
 f.append("distric",distric);
 f.append("city",city);
 f.append("lane_1",lane_1);
 f.append("lane_2",lane_2);
 f.append("code",code);
 f.append("e1",i1)
 
 var r = new XMLHttpRequest();
 r.onreadystatechange = function(){
   if(r.readyState == 4){
     var t = r.responseText;
     alert(t);
    }
    }
    r.open("POST","profileupdate.php")
    r.send(f);
 
 
}

