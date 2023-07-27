<template>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <!-- <a class="nav-link active" aria-current="page" href="/">Home</a> -->
                <router-link to="/" class="nav-link active">Home</router-link> 
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="/about">About</a> -->
                <router-link to="/about" class="nav-link">About</router-link> 
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="/contact">Contact</a> -->
                <router-link to="/contact" class="nav-link">Conteact</router-link> 
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="/multiply">Multiply × </a> -->
                <router-link to="/multiply" class="nav-link">Multiply × </router-link> 
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="/star">Star ✩★ </a> -->
                <router-link to="/star" class="nav-link">Star ✩★ </router-link>
              </li>
              <li class="nav-item">
                <!-- <a class="nav-link" href="/member">Member</a> -->
                <router-link to="/member" class="nav-link">Member</router-link>
              </li>
            </ul>
          </div>
        </div>
    </nav>
 
  <router-view/>

  

</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}


h1 {
  color: #9a1562;
}

body{
  background-image: url(https://img.freepik.com/free-vector/flat-abstract-doodle-background_23-2149340464.jpg?w=2000);
  background-repeat: no-repeat;
  background-size: 100%;
}

.card{
    padding: 12px;
    background: none;
    background: #f0e4d8;
}
.card-header{
  background: #0a4d2e;
}

button {
  background-color: #f27de7; 
  border: none;
  color: white;
  padding: 10px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  transition: 0.5s;
}

button:hover{
    font-size: 18px;
    background-color: #7daaf2; 
    border-radius: 25px;
}


input {
  border: none;
  padding: 10px 30px;
  border-radius: 25px;
}

.show{
  padding-top: 20px;
  padding-left: 41%;
  font-size: 150%;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  font-size: 20px;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #34b4c0;
}
</style>
