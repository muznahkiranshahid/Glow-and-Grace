/////////////Login Code 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <h1 class="d-flex justify-content-center">Login</h1>

                <form action="" id="form" >
                    <input type="text" id="txtname" class="my-3 form-control" placeholder="Enter Your Username" >
                    <input type="password" id="txtpass" class="my-3 form-control" placeholder="Enter Your password" >
                    <label for=""> Show hide Password</label>
                    <input type="checkbox"  id="toggler">
                     <input type="submit" class="w-100 btn btn-outline-success">
                </form>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>


    <script>
 
        document.addEventListener("DOMContentLoaded",()=>{
            if(localStorage.length == 0){
                
            }else{
                alert("Please Logout Manuaaly")
                window.location.href="welcome.html"
            }
        })

        var abc = document.getElementById("toggler")
 abc.addEventListener("click",()=>{
   var password = document.getElementById("txtpass")

   if(password.type=="password"){
    password.type = "text"
   }else{
    password.type = "password"
   }
 })

 var form = document.getElementById("form")

form.addEventListener("submit",(e)=>{
    e.preventDefault()
   var name = document.getElementById("txtname").value
var password = document.getElementById("txtpass").value
   localStorage.setItem("UserName",name)
   localStorage.setItem("password",password)

   window.location.href="Welcome.html"
})

     
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>



/////////////Welcome Code 



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
<style>
    .MyNav{
        width: 100%;

        height: 40px;
        background-color: aquamarine;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    .links{
        display: flex;
        gap: 10px;
    }

    .links a{
        text-decoration: none;
        color: purple;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="MyNav">
        <div class="links">
            
       <a href="">Home</a>
       <a href="">About</a>
       <a href="">Contact</a>
       <a href="">Services</a>
       <a href="" onclick="logout()">Logout</a>
        </div>

            <div class="welcomemsg">
                <span id="welcome">Welcome Mr.</span>
            </div>
    </div>


<script>
        var currentUser = localStorage.getItem("UserName")
        var currentPass = localStorage.getItem("password")
     if(currentUser == null && currentPass == null){
        alert("Please Login First")
        window.location.href ="login.html"
     }else{
        
     }
    var welcome = document.getElementById("welcome")
    welcome.textContent += currentUser

   function logout(){
    localStorage.removeItem("UserName")
    localStorage.removeItem("password")
   }
   

    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>