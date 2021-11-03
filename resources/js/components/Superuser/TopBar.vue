<template>
  <nav class="navbar justify-content-between px-5 w-100 ">
        <div>
          <a  class="navbar-brand"><img src="/img/logo.png" alt="" srcset="" class="w-50 ml-4 "></a>
          <span class="font-weight-bold">EPASC</span>
        </div>
    <div>
       <span class="mr-4">Logged in as:  {{role}}</span>
      </div>    
    <div class="dropdown show">
        <a class="btn border-0 dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-3">{{auth}}</span>
        </a>
      <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item font-weight-bold" href="/logout">Logout</a>
      </div>
  </div>

</nav>
</template>

<script>
export default {
 props:['auth','role']
}
</script>

<style scoped>
  .navbar-brand{
    width: 5rem;
  }
</style>